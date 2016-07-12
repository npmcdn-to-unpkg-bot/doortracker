
<div class="page-header">
  <h1>Issue List</h1>
</div>


<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
                <th>Priority</th>
				<th>Name</th>
				<th>Description</th>
				<th>status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
                <td><a href="/detail/{{issue.id}}"  class="state critical">CRITICAL{{issue.status}}</a></td>
				<td>{{issue.name}}</td>
                <td>{{issue.description}}</td>
                	<td>{{issue.status}}</td>
				<td>

						<a href="/detail/{{issue.id}}" class="btn btn-default">View</a>
						<button type="button" class="btn btn-default"  ng-click="list.editIssue(issue.id)">Edit</button>
						<button type="button" class="btn btn-default"  ng-click="list.deleteIssue(issue.id)">Delete</button>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Issue</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">

						<!-- Edit issue form -->
						<form role="form" name="list.issueForm" novalidate>

							<!-- name -->
							<div class="form-group"
								ng-class="{'has-error' : list.issueForm.issueName.$invalid &&
								!list.issueForm.issueName.$pristine &&
								list.submitted}">
								<label for="">Name</label>
								<input type="text"
								name="issueName"
								class="form-control"
								placeholder=""
								ng-model="list.issue.name"
								required>
								<p ng-show="list.issueForm.issueName.$invalid &&
								 !list.issueForm.issueName.$pristine &&
								 list.submitted"
								 class="help-block">Enter a valid email.</p>
							</div>

							<!-- description -->
							<div class="form-group"
								ng-class="{'has-error' : list.issueForm.issueDescription.$invalid &&
								!list.issueForm.issueDescription.$pristine &&
								list.submitted}">
								<label for="">Description</label>
								<input type="text"
								name="issueDescription"
								class="form-control"
								placeholder=""
								ng-model="list.issue.description"
								ng-minlength="10"
								ng-maxlength="50"
								required>
								<p ng-show="list.issueForm.issueDescription.$invalid &&
								 !list.issueForm.issueDescription.$pristine &&
								 list.submitted"
								 class="help-block">Enter a valid description.</p>
								 <p ng-show="list.issueForm.issueDescription.$invalid &&
								 !list.issueForm.issueDescription.$pristine &&
								 list.issueForm.issueDescription.$error.minlength &&
								 list.submitted"
								 class="help-block">Enter a longer description.</p>
								 <p ng-show="list.issueForm.issueDescription.$invalid &&
								 !list.issueForm.issueDescription.$pristine &&
								 list.issueForm.issueDescription.$error.maxlength &&
								 list.submitted"
								 class="help-block">Enter a shorter description.</p>
							</div>

							<!-- status -->
							<div class="form-group"
								ng-class="{'has-error' : list.issueForm.issueStatus.$invalid &&
								!list.issueForm.issueStatus.$pristine &&
								list.submitted}">
								<label for="">Status</label>
								<input type="text"
								name="issueStatus"
								class="form-control"
								placeholder=""
								ng-model="list.issue.status"
								ng-minlength="4"
								required>
								<p ng-show="list.issueForm.issueStatus.$invalid &&
								 !list.issueForm.issueStatus.$pristine &&
								 list.submitted"
								 class="help-block">Enter a valid status.</p>
								 <p ng-show="list.issueForm.issueStatus.$invalid &&
								 !list.issueForm.issueStatus.$pristine &&
								 list.issueForm.issueStatus.$error.minlength &&
								 list.submitted"
								 class="help-block">Enter a longer status.</p>
							</div>


							<!-- priority -->
							<div class="form-group"
								ng-class="{'has-error' : list.issueForm.issuePriority.$invalid &&
								list.submitted}">
								<label for="">Priority</label>
								<!--
								<select name="issuePriority"
								class="form-control"
						      	ng-options="option.name for option in list.issueType.types track by list.issueType.id"
						      	ng-model="list.issue.priority.id"></select> -->
						      	<select name="issuePriority"
								class="form-control"
								required
						      	ng-model="list.issue.priority">
						      		<option value="1">Blocker</option>
						      		<option value="2">Must fix before Release</option>
						      		<option value="3" selected="true">Important</option>
						      	</select>
						      	<p ng-show="list.issueForm.issuePriority.$invalid &&
								 list.submitted"
								 class="help-block">Select an status.</p>
							</div>

						</form>


					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" ng-click='list.saveIssueChanges(list.issueForm.$valid, list.currentIssue.id)' >Save changes</button>
			</div>
		</div>
	</div>
</div>
