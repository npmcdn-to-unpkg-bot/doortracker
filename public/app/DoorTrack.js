var DoorTrack = angular.module('DoorTrack', ['ngRoute', 'ngResource', 'IssueService']);


DoorTrack.config(function($routeProvider, $locationProvider){

	$routeProvider

		// List of issues
		.when('/', {
			controller: MainController,
			templateUrl: 'app/pages/issues/list.html'
		})
		
		// Create a issue
		.when ('/compose', {
			controller: newIssueController,
			templateUrl: 'app/pages/issues/new.html'
		})

		.otherwise({
			redirectTo: '/'
		});

});












