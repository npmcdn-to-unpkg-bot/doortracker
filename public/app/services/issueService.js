
/**
 * IssueService.js
 */
(function() {

	'use strict';

	angular.module('IssueService', [])
	.factory('Issue', function($http) {
		return {

			// Get
			get: function(url){
				return $http.get(url);
			}, 

			// Save
			save: function(url, msg){
				
				return $http({
					method: 	'POST',
					url: 		url,
					headers: 	{ 'Content-Type' : 'application/json' },
					data: 		msg
					
				});
			},

			// Update
			patch: function(url, msg){
				
				return $http({
					method: 	'PATCH',
					url: 		url,
					headers: 	{ 'Content-Type' : 'application/json' },
					data: 		msg
					
				});
			},
			

			// Delete
			destroy: function(url, id){
				return $http.delete(url + id);
			}
		}

	});
})();

