
/**
 * DoorTrack App
 *
 */
var DoorTrack = 
angular.module('DoorTrack', [
	'MainController', 
	'NewIssueController', 
	'DetailIssueController',
	'AuthController', 
	'ngRoute', 
	'ngResource',
	'ui.router', 
	'satellizer', 
	'IssueService', 
	'UserService'
	]);

DoorTrack
.constant('API_URL', "/api/v1")
.constant('USER_ID', "4") // resolve this!
.config(function($routeProvider, $locationProvider, $stateProvider, $urlRouterProvider, $authProvider) {

		$locationProvider.html5Mode(true);

		$urlRouterProvider.otherwise('/auth/login');

		$stateProvider
			.state('home', {
				url: '/',
				controller: 'MainController as list',
				templateUrl: 'pages/issues/list'
			})
			.state('compose', {
				url: '/compose',
				controller: 'NewIssueController as new',
				templateUrl: 'pages/issues/new'
			})
			.state('detail', {
				url: '/detail/:id',
				controller: 'DetailIssueController as detail',
				templateUrl: 'pages/issues/detail/:id'
			})
			.state('auth', {
				url: '/auth/login',
				//url: '/api/v1/auth/',
				controller: 'AuthController as auth',
				templateUrl: 'auth/login'
			});

});