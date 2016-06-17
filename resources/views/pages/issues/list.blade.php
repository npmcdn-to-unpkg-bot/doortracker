
<div class="page-header">
  <h2>Issue List</h2>
</div>

<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Status</th>
				<th>Priority</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr ng-repeat='issue in issues | filter: search'>
				<td>{{issue.name}}</td>
				<td>{{issue.description}}</td>
				<td>{{issue.status}}</td>
				<td>{{issue.priority}}</td>
				<td><a href="/detail/{{issue.id}}">View</a></td>
			</tr>
		</tbody>
	</table>
</div>
