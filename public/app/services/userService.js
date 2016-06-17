// This is somehow redundant.
// No worries, I'll rewrite the whole thing in a more compact, simpler way.
angular.module('UserService', [])
	.factory('User', function($http) {
		return {

			// Get
			get: function(url){
				return $http.get(url);
			}, 

			// Save
			save: function(url, params){
				
				return $http({
					method: 	'POST',
					url: 		url,
					headers: 	{ 'Content-Type' : 'application/json' },
					data: 		params
					
				});
			},

			// Update
			patch: function(url, params){
				
				return $http({
					method: 	'PATCH',
					url: 		url,
					headers: 	{ 'Content-Type' : 'application/json' },
					data: 		params
					
				});
			},
			
			// destroy 
			destroy: function(url){
				return $http.delete(url);
			}
		}


	});