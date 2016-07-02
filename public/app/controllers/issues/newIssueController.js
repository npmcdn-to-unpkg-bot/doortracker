/**
 * NewIssueController.js
 *  
 * Handles the issue creation.

 */
(function(){

	'use strict';

	var NewIssueController = angular.module('NewIssueController', ['ngResource', 'IssueService']);

	NewIssueController
	.controller('NewIssueController', function($scope, $http, Issue, API_URL, USER_ID) {

		var vm = this;

		vm.API_ISSUE_URL = API_URL + '/issues/';
		vm.error = {};

		// alert message
		vm.showMessageFlag = false;
		vm.setAlert = setAlert;
		vm.hideAlert = hideAlert;

		// Issue type list. To be gathered dynamically.
		vm.issueType = {
	    	types: [
		      	{id: '1', name: 'Blocker'},
		      	{id: '2', name: 'Must fix before Release'},
		      	{id: '3', name: 'Important'}
	    	],
	    	selected: {id: '1', name: 'Blocker'} 
	    };

	    vm.createIssue = function(isValid) {
	    	createIssue(vm, isValid, Issue);
	    }

	}); 

})();




/** 
 * Validate new issue input.
 *
 * @param Array newItem
 * @return boolean
 */
function validateInput(newItem) {
	if ((newItem.description == null) ||
		(newItem.status == null) ||
		(newItem.name == null) ||
		(newItem.priority == null)) {
		
		return false;
	}

	// TODO: Add more validation. Use a dedicated library.

	return true;
}


/** 
 * Set alert fields.
 *
 * @param String type [Bootstrap alert-type]
 * @param String title
 * @param String message
 * @return Object alert
 */
function setAlert(type, title, message) {
	var alert = {};

	alert.type = type;
	alert.title = title;
	alert.message = message;

	return alert;
}



/**
 * Keep an eye on showMessageFlag.
 *
 */
//...when we need to show a message.
function messageWatcher(newValue) {
	// upgrade state where needed. The message view is intended to be generic.
			

				if (debug) {
					/*
					console.log('------');
					console.log('Watch: ');
					console.log('vm.alert: ' + vm.alert);
					console.log('vm.alert.type: ' + vm.alert.type);
					console.log('showMessage: ' + vm.showMessage);
					//console.log('newValue: ' + newValue);
					console.log('------');
					//vm.alert = newValue;
					*/
				}
}


/**
 * Construct an issue.
 *
 * @return Array
 */
function constructIssue(issue) {

	var issue = {
			name: issue.name,
			description: issue.description,
			status: issue.status,
			priority: issue.priority, // handled by number
			//author_id: getUserId()
			//author_id: USER_ID
			author_id: issue.author_id
		};

	return issue;
}


// Operation result messages.

function showSuccessMessage(vm, title, description) {
	showMessage(vm, 'success', title, description);
}

function showErrorMessage(vm, title, description) {
	showMessage(vm, 'danger', title, description);
}

/** 
 * Show alert message.
 *
 * @param Object vm
 * @param String type
 * @param String title
 * @param String description
 * @return null
 */
function showMessage(vm, type, title, description) {

	if (debug) {
		console.log('showMessage.type: ' + type);
		console.log('showMessageFlag: ' + vm.showMessageFlag);
	}
	
	var alert = setAlert(
				type,
				title,
				description
				);

	vm.alert = alert;
	vm.showMessageFlag = true;	
}

// hide alert msg
	function hideAlert(vm) {
		vm.showMessageFlag = false;
	}


	/**
	 * Create an issue.
	 *
	 * @param boolean isValid
	 * @param Service Issue
	 * @return boolean
	 */
	 function createIssue(vm, isValid, Issue) {

		vm.submitted = true; 

		if (!isValid) {
			showErrorMessage(vm, 'Invalid input provided',
				'Please provide valid values for the issue.');

			return false;
		}

		// get the author id.
		vm.issue.author_id = vm.USER_ID; // temporary solution
		vm.issue.priority = vm.issueType.selected.id;


		// Construct the issue.
		var issue = constructIssue(vm.issue);


		// Validate user's input.
		if (!validateInput(vm.issue)) {
			showErrorMessage(vm, 'Invalid input provided',
				'Please provide valid values for the issue.');
			
			return false;
		}
		

		// Save the issue.
		Issue.save(vm.API_ISSUE_URL, issue)
			.success(function(data, status, headers, config) {
				
				if (debug) {
					console.log("Issue created!");
				}

				vm.issue = {}; // clean up the fields
				vm.error = {}; // clean up errors
				vm.submitted = false; 
				

				// Show success message
				showSuccessMessage(vm, 'Issue created!','The issue has been created successfully.');

				// Redirect here.  --state setting

				return true;
			})
			.error(function(data, status, headers, config) {

				if (debug) {
					console.log("Error: " + status);
					console.log(data);
				}

				//vm.error = ; // define error
				vm.submitted = false;

				// Show error message
				showErrorMessage(vm, 'Can\'t create issue.',
					'An error occurred while creating the issue. ' 
					+ 'Please check your internet connection.');
				
				return false;
			});

	}


/*****************************************************************
 	TODO: 
 		- get the user's id from the Session/Login system
 			Using 4 (Guest) by default.

 		-
 ******************************************************************/

// Warning:
				// This will change. Please, do not touch my shit
				// until it's finished! :p
				