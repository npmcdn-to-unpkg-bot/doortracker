

function newIssueController($scope, $routeParams, $http, Issue) {
	
	var API_URL = path.api.issues;
	// Sent a message
	$scope.error = {};


	$scope.createIssue = function() {
		


		
		var issue = {
			name: $scope.newIssue.name,
			description: $scope.newIssue.description,
			status: $scope.newIssue.status,
			priority: $scope.newIssue.priority
		};


		// do some validation here
		if (!validateInput($scope.newIssue)) {
			$scope.error.inputError = {
				title: 'Invalid values',
				description: 'The values introduced are not valid. Please, ...'

			};

			return false;
		}


		console.log	("createIssue() ");
		console.log($scope.newIssue);


		Issue.save(API_URL, issue)
			.success(function(data, status, headers, config) {
				
				console.log("Issue created!");
				// Redirect here.
			})
			.error(function(data, status, headers, config) {
				console.log("Error: " + data);
			});

	};
	



}

/* 
 * Validate new issue input.
 */
function validateInput(newItem) {
	if ((newItem.description == null) ||
		(newItem.status == null) ||
		(newItem.name == null) ||
		(newItem.priority == null)) {
		return false;
	}

	// TODO: Add more validation.

	return true;
}