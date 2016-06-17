/**
 * MainController.js
 * 
 * @param service Issue
 * @param constant String API_URL
 */ 
var MainController = angular.module('MainController', ['ngResource', 'IssueService']);

MainController
.controller('MainController', function($rootScope, $scope, $http, Issue, API_URL, USER_ID) {


	var API_ISSUE_URL = API_URL + '/issues/';
	var debug = null;

	$scope.error = {};
	$scope.error.loading = false;
	$scope.error.inputError = {}; // No error yet.
	$scope.edit = {};
	$scope.currentIssue = {};

	//$rootScope.author_id = '';

	//console.log('MainController: ' + $rootScope.author_id);

	
	/**
	* TODO
	* 
	* API
	* 	.issue
	*	.notifications
	*	[...]
	*
	* Use $log.
	*/

	/* TODO
	 	Get the user ID 
	 	Default value: 4 (Guest).
	 	*/


	
	


	/**
	* Edit an issue.
	*
	*/
	$scope.editIssue = function (id) {
		$scope.currentIssue.id = id; // Make the id visible 
		console.log($scope.currentIssue.id);

	};


	/**
	 * Update an issue.
	 *
	 * @param int id
	 * @return null
	 */
	$scope.saveIssueChanges = function(id){

		if (debug) {
			console.log("Saving: " + $scope.edit);
		}

		Issue.patch(API_ISSUE_URL + id, $scope.edit)
			.success(function(data, status, headers, config) {
				if (debug) {
					console.log("Issue Index: " + $scope.getIssueIndex(id));
					console.log("Issue saved");
				}		

				// update the view element
				$scope.updateIssue(id, $scope.getIssueIndex(id));
			})
			.error(function(data, status, headers, config) {
				if (debug) {
					console.log("Shit");
				}
			});

	};
	
	
	/**
	 * Retrieve Issue list.
	 *
	 */	 
	Issue.get(API_ISSUE_URL)
		.success(function(data, status, headers, config) {

			if (debug) {
				console.log(data.data);
				console.log(data.status);
			}
				
			$scope.issues = data.data;
		})
		.error(function(data, status, headers, config) {
			$scope.error.loading = true;
			// define a more accurate error description

		});
		

	/**
	 * Remove an issue from the view.
	 *
	 * @param int id
	 * @return boolean
	 */
	$scope.removeIssueFromView = function(id) {
		var indexIssueInArray = 0;

		if (indexIssueInArray = $scope.getIssueIndex(id)) {
			$scope.issues.splice(indexIssueInArray, 1);
		} else {
			// We encountered some problem retrieving the index.
			// Write some more invasive function

			return false;
		}

		return true;

	};


	/** 
	 * Remove an issue.
	 * 
	 * @param int id
	 * @return boolean
	 */	
	$scope.deleteIssue = function(id) {

		if (debug) {
			console.log("Deleting item with id: " + id);
		}
		

		Issue.destroy(API_ISSUE_URL, id)
			.success(function(data, status, headers, config) {

				if (debug) {
					console.log("Success: Item removed from list.");
					console.log(data);
				}
					
				$scope.removeIssueFromView(id);
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
	};

	
	/**
	 * Get the view issue index.
	 *
	 * @param int id
	 * @return int
	 */
	$scope.getIssueIndex = function(id) {
		var indexFirstIssue = 0;
		var indexIssueInArray = 0;

		
		// Search for the item.
		for (var i = indexFirstIssue; i < $scope.issues.length; i++) {
			if ($scope.issues[i].id == id) {
				indexIssueInArray = i;
			}
		}

		return indexIssueInArray;

	};


	/** 
	 * Update a single issue view.
	 *
	 * @param int id
	 * @param int issueIndex 
	 */
	$scope.updateIssue = function(id, issueIndex) {
		Issue.get(API_ISSUE_URL + id)
			.success(function(data, status, headers, config) {
				$scope.issues[issueIndex] = data;
				
			});
			// no error handling in here
	}

});

