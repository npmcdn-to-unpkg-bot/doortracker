/**
 * Call
 */
var call = {};

/**
 * Display call in console
 */
call.debug = true;

/**
 * Make ajax call
 *
 * @param {string} type
 * @param {string} url
 * @param {object} params
 * @param {function} callback
 */
call.ajax = function(type,url,params = {},callback){

	if(call.debug){
		console.log('Call to: '+url+'');
		console.log(params);
	}

	$.ajax({
		type: type,
		url: url, 
		data : params,
		contentType: "application/x-www-form-urlencoded; charsetBySource=UTF-8",
		success: function(data) {
			callback(data);
		},
		error: function(jqXHR, textStatus, errorThrown) {

			if(call.debug){
				console.log('Error during call: '+url);
				console.log(errorThrown);
				console.log(jqXHR);
			}
			
		},
		dataType:'json'
	});
};

/**
 * Make get call
 *
 * @param {string} url
 * @param {object} params
 * @param {function} callback
 */
call.get = function(url,params,callback){
	call.ajax('GET',url,params,callback);
};

/**
 * Make post call
 *
 * @param {string} url
 * @param {object} params
 * @param {function} callback
 */
call.post = function(url,params,callback){
	call.ajax('POST',url,params,callback);
};

/**
 * Make put call
 *
 * @param {string} url
 * @param {object} params
 * @param {function} callback
 */
call.put = function(url,params,callback){
	call.ajax('PUT',url,params,callback);
};

/**
 * Make delete call
 *
 * @param {string} url
 * @param {object} params
 * @param {function} callback
 */
call.delete = function(url,params,callback){
	call.ajax('DELETE',url,params,callback);
};