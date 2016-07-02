


<p>
	<h1 class="text-title">Detailed info about the issue</h1>
</p>
<hr>
<p>Issue posted by <a href="">{{detail.author.name}}</a>, on <small> {{detail.issue.created_at | date:'short'}}</small> </p>
<p></p>
<pre>
Name: {{detail.issue.name}}
Description: {{detail.issue.description}}
Status: {{detail.issue.status}}
Priority: {{detail.issue.priority}}


In Project: 
Project owner: 
[...]	
</pre>

<hr>
<p>Actions </p>
<p><a href="mailto:{{detail.author.email}}">Contact the author of this issue (internal mailing)</a></p>
<p><a href="">Follow/Unfollow this issue</a></p>
