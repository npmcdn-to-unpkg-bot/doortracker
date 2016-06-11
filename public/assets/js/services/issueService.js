angular.module('IssueService', [])
				.factory('Issue', function($http) {
					return {

						// get all messages
						get: function(url){
							return $http.get(url);
						}, 

						// save a message
						save: function(url, msg){
							
							return $http({
								method: 	'POST',
								url: 		url,
								headers: 	{ 'Content-Type' : 'application/json' },
								data: 		msg
								
							});
						},

						// update an Item
						
						patch: function(url, msg){
							
							return $http({
								method: 	'PATCH',
								url: 		url,
								headers: 	{ 'Content-Type' : 'application/json' },
								data: 		msg
								
							});
						},
						

						// destroy a message
						destroy: function(url, id){
							return $http.delete(url + id);
						}
					}



				});