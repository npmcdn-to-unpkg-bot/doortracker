
/** 
 * DetailIssueController
 *
 */
var DetailIssueController = angular.module('DetailIssueController', ['ngResource', 'ngRoute', 'IssueService', 'UserService']);

DetailIssueController
.controller('DetailIssueController', 
	function($rootScope, $scope, $http, $routeParams, Issue, User, API_URL, USER_ID, $q) {
	
	
	var id = $routeParams.id;
	var API_ISSUE_URL = API_URL + '/issues/' + id;
	var API_AUTHOR_URL = API_ISSUE_URL + '/users/';
	

	//$scope.author = {};

	getIssues($scope, Issue, API_ISSUE_URL); // retrieve issue list
	getUserInfo($scope, User, API_AUTHOR_URL); // retrieve author
	
	

	
	/*
	$scope.$watch('rootScope.author_id', function(event, data) {
		console.log('----');
		console.log('Watch');
		console.log('detailIssueController, author_id: ' + $rootScope.author_id);
	});
	*/


});


	/**
	 * Get details about an issue.
	 *
	 * @param $scope
	 * @param module Issue
	 * @param String url
	 */
function getIssues($scope, Issue, url) {
	
	 Issue.get(url)
	 	.success(function (data, status, headers, config) {
	 		
	 		$scope.issue = data.data;
	 		//var delay = $q.defer();
	 		//delay.resolve(data);

	 	})
	 	.error(function (data, status, headers, config) {
	 		if (debug) {
	 			console.log("Error: " + status);
	 		}
	 	});
		
}

	/**
	 * Get details about the author.
	 *
	 * @param $scope
	 * @param module User
	 * @param String url
	 */
function getUserInfo($scope, User, url) {

	 User.get(url)
	 	.success(function (data, status, headers, config) {
	 		$scope.author = data.data;

	 	})
	 	.error(function (data, status, headers, config) {

	 		if (debug) {
	 			console.log("Error: " + status);
	 		}

	 	});
}

