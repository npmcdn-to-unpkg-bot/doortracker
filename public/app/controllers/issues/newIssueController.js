/**
 * NewIssueController 
 *
 */
var NewIssueController = angular.module('NewIssueController', ['ngResource', 'IssueService']);

NewIssueController
.controller('NewIssueController', function($scope, $http, Issue, API_URL, USER_ID) {


	var API_ISSUE_URL = API_URL + '/issues/';
	$scope.error = {};
	
	$scope.showMessageFlag = false;
	$scope.setAlert = setAlert;

	$scope.issueType = {
    	types: [
	      	{id: '1', name: 'Blocker'},
	      	{id: '2', name: 'Must fix before Release'},
	      	{id: '3', name: 'Important'}
    	],
    	type: {id: '1', name: 'Blocker'} //default
    };


	/**
	 * Create an issue.
	 *
	 * @return boolean
	 */
	$scope.createIssue = function(isValid) {

		$scope.submitted = true; 

		if (!isValid) {
			showErrorMessage($scope, 'Invalid input provided',
				'Please provide valid values for the issue.');

			return false;
		}

		// get the author id.
		$scope.newIssue.author_id = USER_ID; // temporary solution
		//$scope.newIssue.priority = $scope.issueType.type.id; 

		// Construct the issue.
		var issue = constructIssue($scope.newIssue);


		// Validate user's input.
		if (!validateInput($scope.newIssue)) {
			showErrorMessage($scope, 'Invalid input provided',
				'Please provide valid values for the issue.');
			
			return false;
		}
		

		// Save the issue.
		Issue.save(API_ISSUE_URL, issue)
			.success(function(data, status, headers, config) {
				
				if (debug) {
					console.log("Issue created!");
				}

				$scope.newIssue = {}; // clean up the fields
				$scope.error = {}; // clean up errors
				$scope.submitted = false; 
				

				// Show success message
				
				showSuccessMessage($scope, 'Issue created!','The issue has been created successfully.');

				// Redirect here.

				return true;
			})
			.error(function(data, status, headers, config) {

				if (debug) {
					console.log("Error: " + status);
					console.log(data);
				}

				//$scope.error = ; // define error
				$scope.submitted = false;

				// Show error message
				showErrorMessage($scope, 'Can\'t create issue.',
					'An error occurred while creating the issue. ' 
					+ 'Please check your internet connection.');
				
				return false;
			});


			//$scope.$watch('showMessageFlag', messageWatcher);

	};

	// hide alert msg
	$scope.hideAlert = function() {
		$scope.showMessageFlag = false;
	};


}); /** End of newIssueController **/


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
 * @param Object $scope
 * @param String type [Bootstrap alert-type]
 * @param String title
 * @param String message
 * @return Array alert
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
					console.log('$scope.alert: ' + $scope.alert);
					console.log('$scope.alert.type: ' + $scope.alert.type);
					console.log('showMessage: ' + $scope.showMessage);
					//console.log('newValue: ' + newValue);
					console.log('------');
					//$scope.alert = newValue;
					*/
				}
}


/**
 * Construct an issue.
 *
 * @return Array
 */
function constructIssue(newIssue) {

	if (!newIssue.priority) {
		newIssue.priority.id = "1"; 
	}
	
	console.log(newIssue);
	console.log(newIssue.priority);
	var issue = {
			name: newIssue.name,
			description: newIssue.description,
			status: newIssue.status,
			priority: newIssue.priority.id, // handled by number
			//author_id: getUserId()
			//author_id: USER_ID
			author_id: newIssue.author_id
		};

	return issue;
}


// Operation result messages.

function showSuccessMessage($scope, title, description) {
	showMessage($scope, 'success', title, description);
}

function showErrorMessage($scope, title, description) {
	showMessage($scope, 'danger', title, description);
}

/** 
 * Show message.
 *
 * @param String type
 * @param String title
 * @param String description
 */
function showMessage($scope, type, title, description) {

	if (debug) {
		console.log('showMessage.type: ' + type);
		console.log('showMessageFlag: ' + $scope.showMessageFlag);
	}
	
	var alert = setAlert(
				type,
				title,
				description
				);

	$scope.alert = alert;
	$scope.showMessageFlag = true;	
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
				