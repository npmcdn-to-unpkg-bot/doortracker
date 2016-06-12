function MainController($scope, $http, Issue) {

	var API_ISSUE_SINGLE = path.api.issues;
	//var API_ISSUE_ALL = '/api/v1/issues';
	var API_ISSUE_ALL = path.api.issues;

	$scope.error = {};
	$scope.error.loading = false;

	$scope.edit = {};
	$scope.currentIssue = {};
	$scope.error.inputError = {}; // No error yet.


	// TEST DATA
	$scope.issues = {
		name: 'some',
		description: 'desc',
		status: 'working',
		priority: '1'
	};

	$scope.editIssue = function (id) {
		$scope.currentIssue.id = id; // Make the id visible 
		console.log($scope.currentIssue.id);

		

		//showEditModal(id);

		//console.log($scope.edit);

		// check whather it was all good or not

	};


	// This should work with an ID parameter instead.
	// --Done.
	$scope.saveIssueChanges = function(id){

		console.log("Saving: " + $scope.edit);
		var url = API_ISSUE_SINGLE + id;

		Issue.patch(url, $scope.edit)
			.success(function(data, status, headers, config) {
				console.log("Issue saved");

				$scope.updateIssue(id, $scope.getIssueIndex(id));
				console.log("Issue Index: " + $scope.getIssueIndex(id));
			})
			.error(function(data, status, headers, config) {
				console.log("Shit");
			});

	};
	
	
	/*
	 * Retrieve Issue list.
	 */
	 
	Issue.get(API_ISSUE_ALL)
		.success(function(data, status, headers, config) {
			console.log(data.data);
			console.log(data.status);
			
			$scope.issues = data.data;


		})
		.error(function(data, status, headers, config) {
			$scope.error.loading = true;
			// define a more accurate error description

		});
		


	// list
	


	/*
	 * Remove an issue from the list held locally (view).
	 *
	 * This works only if the Items are sequential.
	 */
	$scope.removeIssueFromScope = function(id) {
		// determinate the position respect to the first id
		var indexFirstIssue = 0;
		var indexIssueInArray = 0;

		if ($scope.issues[0].id) {
			indexFirstIssue = $scope.issues[0].id;
			indexIssueInArray = id - indexFirstIssue;


			//console.log("items[i]: " + indexItemInArray);
			$scope.issues.splice(indexIssueInArray, 1);
		} else {
			// We shouldn't get to this point if the id didn't exist. 
			//
		}

	};


	/* 
	 * Remove an Item from the list.
	 */	
	$scope.deleteIssue = function(id) {
		console.log("Deleting item with id: " + id);

		Issue.destroy(API_ISSUE_SINGLE, id)
			.success(function(data, status, headers, config) {
				console.log("Success: Item removed from list.");
				//console.log(data);
				$scope.removeIssueFromScope(id);

			})
			.error(function(data, status, headers, config) {
				// handle it property. For now, just add some basic stuff.
				//displayErrorMessage("Can't remove item from list.");
				console.log("Can't remove item from list.");
				console.log(data);



			});
	};

	
	/*
	 * Determinate the position respect to the first id.
	 */
	$scope.getIssueIndex = function(id) {
		
		var indexFirstIssue = 0;
		var indexIssueInArray = 0;

		

		// Search for the item.
		for (var i = indexFirstIssue; i < $scope.issues.length; i++) {
			if ($scope.issues[i].id == id) {
				indexIssueInArray = i;
			}
		}

		return indexIssueInArray;

	};


	/* 
	 * Update single item view after changes. 
	 */
	$scope.updateIssue = function(id, itemIndex) {
		Issue.get(API_ISSUE_ALL + id)
			.success(function(data, status, headers, config) {
				$scope.issues[issueIndex] = data;
				
			});
			// no error handling here
	}

	

};

