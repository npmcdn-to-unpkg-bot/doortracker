
var DoorTrack = angular.module('DoorTrack', ['ngRoute', 'ngResource', 'IssueService']);


DoorTrack.config(function($routeProvider, $locationProvider) {
	$routeProvider
		.when('/', {
			controller: MainController,
			templateUrl: 'pages/list.html'
		})
		
		// Create a new Issue
		.when ('/compose', {
			controller: newIssueController,
			templateUrl: 'pages/newIssueForm.html'
		})
		.otherwise({
			redirectTo: '/'
		});

});












