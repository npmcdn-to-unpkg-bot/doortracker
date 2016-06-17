
/**
 * DoorTrack App
 *
 */
var DoorTrack = 
angular.module('DoorTrack', [
	'MainController', 
	'NewIssueController', 
	'DetailIssueController',  
	'ngRoute', 
	'ngResource',
	'IssueService', 
	'UserService'
	]);

DoorTrack
.constant('API_URL', "/api/v1")
.constant('USER_ID', "4") // resolve this!
.config(function($routeProvider, $locationProvider) {

		$locationProvider.html5Mode(true);

		$routeProvider
			.when('/', {
				controller: 'MainController',
				templateUrl: 'pages/issues/list'
			})
			.when ('/compose', {
				controller: 'NewIssueController',
				templateUrl: 'pages/issues/new'
			})
			.when ('/detail/:id', {
				controller: 'DetailIssueController',
				templateUrl: 'pages/issues/detail/:id'
			})
			.otherwise({
				redirectTo: '/'
			});
})
/*
.controller('MainController', MainController)
.controller('newIssueController', newIssueController)
.controller('detailIssueController', ['$rootScope', '$scope', detailIssueController]);

*/