
<!-- Error/Success alert -->
<div class="alert alert-{{alert.type}}" ng-show='showMessageFlag'>
	<button type="button" class="close" aria-hidden="true" ng-click="hideAlert()">&times;</button>
	<strong>{{alert.title}}</strong> {{alert.message}} 
</div>

<!-- Input form -->
<form role="form" ng-submit="createIssue(issueForm.$valid)" name="issueForm" novalidate>
		
	

	<div class="form-group"
		ng-class="{'has-error' : issueForm.issueName.$invalid && 
		!issueForm.issueName.$pristine &&
		submitted}">
		<label for="">Name</label>
		<input type="text" 
		name="issueName" 
		class="form-control" 
		placeholder="From"
		ng-model="newIssue.name" 
		required>
		<p ng-show="issueForm.issueName.$invalid &&
		 !issueForm.issueName.$pristine &&
		 submitted" 
		 class="help-block">Enter a valid email.</p>
	</div>
	
	<div class="form-group"
		ng-class="{'has-error' : issueForm.issueDescription.$invalid && 
		!issueForm.issueDescription.$pristine &&
		submitted}">
		<label for="">Description</label>
		<input type="text" 
		name="issueDescription" 
		class="form-control" 
		placeholder=""
		ng-model="newIssue.description"
		ng-minlength="10"
		ng-maxlength="50" 
		required>
		<p ng-show="issueForm.issueDescription.$invalid &&
		 !issueForm.issueDescription.$pristine &&
		 submitted" 
		 class="help-block">Enter a valid description.</p>
		 <p ng-show="issueForm.issueDescription.$invalid &&
		 !issueForm.issueDescription.$pristine &&
		 issueForm.issueDescription.$error.minlength &&
		 submitted"
		 class="help-block">Enter a longer description.</p>
		 <p ng-show="issueForm.issueDescription.$invalid &&
		 !issueForm.issueDescription.$pristine &&
		 issueForm.issueDescription.$error.maxlength &&
		 submitted"
		 class="help-block">Enter a shorter description.</p>
	</div>
	
	<!-- status -->
	<div class="form-group"
		ng-class="{'has-error' : issueForm.issueStatus.$invalid && 
		!issueForm.issueStatus.$pristine &&
		submitted}">
		<label for="">Status</label>
		<input type="text" 
		name="issueStatus" 
		class="form-control" 
		placeholder=""
		ng-model="newIssue.status" 
		ng-minlength="4"
		required>
		<p ng-show="issueForm.issueStatus.$invalid &&
		 !issueForm.issueStatus.$pristine &&
		 submitted" 
		 class="help-block">Enter a valid status.</p>
		 <p ng-show="issueForm.issueStatus.$invalid &&
		 !issueForm.issueStatus.$pristine && 
		 issueForm.issueStatus.$error.minlength &&
		 submitted" 
		 class="help-block">Enter a longer status.</p>
	</div>


	<!-- Priority -->
	<div class="form-group"
		ng-class="{'has-error' : issueForm.issuePriority.$invalid && 
		!issueForm.issuePriority.$pristine &&
		submitted}">
		<label for="">Priority</label>
		<select name="issuePriority" 
		class="form-control" 
      	ng-options="option.name for option in issueType.types track by issueType.id"
      	ng-model="newIssue.priority"></select>

	</div>



	<button type="submit" 
	class="btn btn-primary">Send</button>

	
</form>