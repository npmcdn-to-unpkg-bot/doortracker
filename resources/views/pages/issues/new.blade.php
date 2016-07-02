
<!-- Error/Success alert -->
<div class="alert alert-{{new.alert.type}}" ng-show='new.showMessageFlag'>
	<button type="button" class="close" aria-hidden="true" ng-click="new.hideAlert(new)">&times;</button>
	<strong>{{new.alert.title}}</strong> {{new.alert.message}} 
</div>

<!-- New Issue Form -->
<form role="form" ng-submit="new.createIssue(new.issueForm.$valid)" name="new.issueForm" novalidate>

	<!-- name -->
	<div class="form-group"
		ng-class="{'has-error' : new.issueForm.issueName.$invalid && 
		!new.issueForm.issueName.$pristine &&
		new.submitted}">
		<label for="">Name</label>
		<input type="text" 
		name="issueName" 
		class="form-control" 
		placeholder=""
		ng-model="new.issue.name" 
		required>
		<p ng-show="new.issueForm.issueName.$invalid &&
		 !new.issueForm.issueName.$pristine &&
		 new.submitted" 
		 class="help-block">Enter a valid email.</p>
	</div>
	
	<!-- description -->
	<div class="form-group"
		ng-class="{'has-error' : new.issueForm.issueDescription.$invalid && 
		!new.issueForm.issueDescription.$pristine &&
		new.submitted}">
		<label for="">Description</label>
		<input type="text" 
		name="issueDescription" 
		class="form-control" 
		placeholder=""
		ng-model="new.issue.description"
		ng-minlength="10"
		ng-maxlength="50" 
		required>
		<p ng-show="new.issueForm.issueDescription.$invalid &&
		 !new.issueForm.issueDescription.$pristine &&
		 new.submitted" 
		 class="help-block">Enter a valid description.</p>
		 <p ng-show="new.issueForm.issueDescription.$invalid &&
		 !new.issueForm.issueDescription.$pristine &&
		 new.issueForm.issueDescription.$error.minlength &&
		 new.submitted"
		 class="help-block">Enter a longer description.</p>
		 <p ng-show="new.issueForm.issueDescription.$invalid &&
		 !new.issueForm.issueDescription.$pristine &&
		 new.issueForm.issueDescription.$error.maxlength &&
		 new.submitted"
		 class="help-block">Enter a shorter description.</p>
	</div>
	
	<!-- status -->
	<div class="form-group"
		ng-class="{'has-error' : new.issueForm.issueStatus.$invalid && 
		!new.issueForm.issueStatus.$pristine &&
		new.submitted}">
		<label for="">Status</label>
		<input type="text" 
		name="issueStatus" 
		class="form-control" 
		placeholder=""
		ng-model="new.issue.status" 
		ng-minlength="4"
		required>
		<p ng-show="new.issueForm.issueStatus.$invalid &&
		 !new.issueForm.issueStatus.$pristine &&
		 new.submitted" 
		 class="help-block">Enter a valid status.</p>
		 <p ng-show="new.issueForm.issueStatus.$invalid &&
		 !new.issueForm.issueStatus.$pristine && 
		 new.issueForm.issueStatus.$error.minlength &&
		 new.submitted" 
		 class="help-block">Enter a longer status.</p>
	</div>


	<!-- priority -->
	<div class="form-group"
		ng-class="{'has-error' : new.issueForm.issuePriority.$invalid && 
		!new.issueForm.issuePriority.$pristine &&
		new.submitted}">
		<label for="">Priority</label>
		<select name="issuePriority" 
		class="form-control" 
      	ng-options="option.name for option in new.issueType.types track by new.issueType.id"
      	ng-model="new.issue.priority"></select>
	</div>

	<button type="submit" 
	class="btn btn-primary">Send</button>
	
</form>