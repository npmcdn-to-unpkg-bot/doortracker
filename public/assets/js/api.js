/**
 * Api
 */
var api = {};

/**
 * Basic path of api
 */
api.path = '';

api.getPath = function(){
	return api.path;
}

api.issue = function(){
	var params = {};
	call.get(api.getPath()+"/issues",params,function(response){
		
		if(response.status == 'Success'){
			var rows = '';

			data = response.data;

			$.map(response.data,function(row){
				rows += tmpl.get('issue-row',row);
			});



			tmpl.setByHtml(rows,'issue-row');


		}

		if(response.status == 'error'){
			// Some error here
		}

	});


};

$(document).ready(function(){

	

});