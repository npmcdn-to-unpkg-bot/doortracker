
/** 
 * DetailIssueController.js
 *
 * Handles the single issue details view.
 */
(function() {

	'use strict';

	var DetailIssueController = angular.module('DetailIssueController', ['ngResource', 'ngRoute', 'IssueService', 'UserService']);

	DetailIssueController
	.controller('DetailIssueController', 
		function($rootScope, $scope, $http, $routeParams, Issue, User, API_URL, USER_ID, $q) {
		
		var vm = this;

		var id = $routeParams.id;
		var API_ISSUE_URL = API_URL + '/issues/' + id;
		var API_AUTHOR_URL = API_ISSUE_URL + '/users/';
		

		//$scope.author = {};

		getIssues(vm, API_ISSUE_URL, Issue); // retrieve issue list
		getUserInfo(vm, API_AUTHOR_URL, User); // retrieve author info
		

	});


		/**
		 * Get details about an issue.
		 *
		 * @param Object vm
		 * @param module Issue
		 * @param String url
		 */
	function getIssues(vm, url, Issue) {
		
		 Issue.get(url)
		 	.success(function (data, status, headers, config) {
		 		
		 		vm.issue = data.data;

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
		 * @param vm
		 * @param module User
		 * @param String url
		 */
	function getUserInfo(vm, url, User) {

		 User.get(url)
		 	.success(function (data, status, headers, config) {
		 		vm.author = data.data;

		 	})
		 	.error(function (data, status, headers, config) {

		 		if (debug) {
		 			console.log("Error: " + status);
		 		}

		 	});
	}

})();
