/**
 * AuthController.js
 *
 * Handles user login.
 */
(function() {

	'use strict';

	var AuthController = angular.module('AuthController', ['ui.router', 'satellizer']);

	AuthController
	.controller('AuthController',  
		function AuthController($auth, $state) {

		var vm = this;

		vm.login = function() {

			var credentials = {
				email: vm.email,
				password: vm.password
			}

			// Attempt login.
			$auth.login(credentials).then(function(data) {
				console.log('You\'re logged');
				$state.go('home');

			}, function(error) {
				console.log(error);
				//document.write(error);
			});
		}

	});

})();