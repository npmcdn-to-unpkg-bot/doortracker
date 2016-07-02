/**
 * MainController.js
 * 
 * @param Service Issue
 * @param constant String API_URL
 */

(function() {

	'use strict';

	var MainController = angular.module('MainController', ['ngResource', 'IssueService']);

	MainController
	.controller('MainController', function($rootScope, $scope, $http, Issue, API_URL, USER_ID) {

		var vm = this;

		var API_ISSUE_URL = API_URL + '/issues/';
		var debug = null; // local overriding

		// Issue type list. To be gathered dynamically.
		vm.issueType = {
	    	types: [
		      	{id: '1', name: 'Blocker'},
		      	{id: '2', name: 'Must fix before Release'},
		      	{id: '3', name: 'Important'}
	    	],
	    	selected: {id: '1', name: 'Blocker'} 
	    };

		// helpers
		vm.error = {};
		vm.error.loading = false;
		vm.error.inputError = {}; // No error yet.
		vm.edit = {};
		vm.currentIssue = {};



		/**
		 * CRUD operations definition.	
		 *
		 */
		vm.updateIssue = function(id, index) {
			updateIssue(vm, API_ISSUE_URL + id, index, Issue);
		};

		//deleteIssue(vm, uri, id, Issue)
		vm.deleteIssue = function(id) {
			deleteIssue(vm, API_ISSUE_URL, id, Issue);
		};

		//vm.editIssue = editIssue;
		vm.editIssue = function(id) {
			editIssue(vm, id);
		};

		//vm.saveIssueChanges = saveIssueChanges;
		vm.saveIssueChanges = function(isValid, id) {
			vm.submitted = true;

			if (!isValid) {
				console.log("Invalid data.");

				return false;
			}

			saveIssueChanges(vm, API_ISSUE_URL, id, Issue);
		};

		//vm.removeIssueFromView = removeIssueFromView;
		vm.removeIssueFromView = function(id) {
			removeIssueFromView(vm, id);
		};

		//vm.getIssueIndex = getIssueIndex;
		vm.getIssueIndex = function(id) {
			return getIssueIndex(vm, id);
		};


		// retrieve issue list
		getIssueList(vm, API_ISSUE_URL, Issue);

	});

	/**
	 * Remove an issue from the view.
	 *
	 * @param int id
	 * @return boolean
	 */
	function removeIssueFromView(scope, id) {
		var indexIssueInArray = scope.getIssueIndex(id);

		if (debug) {
			console.log("removing index: " + indexIssueInArray);
		}
		
		scope.issues.splice(indexIssueInArray, 1);

		return true;
	}

	/**
	* Edit an issue.
	*
	* @param Object
	* @param 
	*/
	function editIssue(vm, id) {
		vm.currentIssue.id = id; // Make the id visible 

		// modal
		showEditModal(id);

		if (debug) {
			console.log(vm.currentIssue.id);
		}

	}

	/**
	 * Retrieve Issue list.
	 *
	 * @param Object vm
	 * @param String url
	 * @param Service Issue
	 * @return boolean
	 */	
	function getIssueList(vm, url, Issue) {
		 
		Issue.get(url)
			.success(function(data, status, headers, config) {

				if (debug) {
					console.log(data.data);
					console.log(data.status);
				}
				vm.issues = data.data;
				return true;

			})
			.error(function(data, status, headers, config) {
				vm.error.loading = true;
				// define a more accurate error description

				return false;

			});
	}

	/** 
	 * Update a single issue view.
	 *
	 * @param int id
	 * @param int issueIndex 
	 */
	function updateIssue(vm, url, issueIndex, Issue) {
		Issue.get(url)
			.success(function(data, status, headers, config) {
				vm.issues[issueIndex] = data.data;
				
				if (debug) {
					console.log('Issue updated.');
					console.log('vm.issues[' + issueIndex);
					console.log(data.data);
					console.log(vm.issues[issueIndex]);
				}
			})
			.error(function(data, status, headers, config) {
				//vm.issues[issueIndex] = data;
				
				if (debug) {
					console.log('updateIssue(): ' + data.data);
				}
			});
			// no error handling in here
	}


	/**
	 * Update an issue.
	 *
	 * @param int id
	 * @param String uri
	 * @return null
	 */
	function saveIssueChanges(vm, uri, id, Issue){

		if (debug) {
			console.log("Saving: " + vm.issue);
		}

		// set priority manually since it's nested
		//vm.issue.priority = vm.issueType.selected.id;
		//vm.issue.priority = vm.issue.priority.id;
		console.log("priority: " + vm.issue.priority);

		vm.issue.author_id = vm.USER_ID; // temporary solution

		//Issue.patch(uri + id, vm.edit)
		Issue.save(uri + id, vm.issue)
			.success(function(data, status, headers, config) {
				if (debug) {
					//console.log("Issue Index: " + vm.getIssueIndex(id));
					console.log("Issue saved");
				}		

				// update the view element
				vm.updateIssue(id, vm.getIssueIndex(id));
				//vm.issue = {};
				vm.submitted = false;
			})
			.error(function(data, status, headers, config) {
				if (debug) {
					console.log("Shit");
				}

				vm.submitted = false;
			});

	}

	/** 
	 * Remove an issue.
	 * 
	 * @param int id
	 * @return boolean
	 */	
	function deleteIssue(vm, uri, id, Issue) {

		if (debug) {
			console.log("Deleting item with id: " + id);
		}
		

		Issue.destroy(uri, id)
			.success(function(data, status, headers, config) {

				if (debug) {
					console.log("Success: Item removed from list.");
					console.log(data);
				}

				vm.removeIssueFromView(id);

				return true;
			})
			.error(function(data, status, headers, config) {
				// handle it property. 

				if (debug) {
					console.log("Can't remove item from list.");
					console.log(data);
				}
				
				return false;
			});
	}

	/**
	 * Get the view's issue index.
	 *
	 * @param int id
	 * @return int
	 */
	function getIssueIndex(vm, id) {
		var indexIssueInArray = 0;

		
		// Search for the item.
		for (var i = 0; i < vm.issues.length; i++) {
			if (vm.issues[i].id == id) {
				indexIssueInArray = i;

				console.log("index found: " + indexIssueInArray);
				break;

			} else {
				console.log("can't find index");
			}
		}

		return indexIssueInArray;

	}

})();

