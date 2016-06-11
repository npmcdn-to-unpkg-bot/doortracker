var tmpl = {};

/**
 * Set html of a section given a source html
 *
 * @param {string} html
 * @param {string} destination
 * @param {function} callback
 */
tmpl.setByHtml = function(html,destination,callback){

	
	var destination = $('[data-tmpl-container='+destination+']');
	destination.html('');
	destination.append(html);

	setTimeout(function(){
		$('.tmpl-new').removeClass('tmpl-new');
   	},50);

}

/**
 * Set html of a section given a source
 *
 * @param {string} source
 * @param {string} destination
 * @param {array} vars
 * @param {function} callback
 */
tmpl.setBySource = function(source,destination,vars,callback){

	var source = tmpl.getSourceBytmpl(source);
	var html = tmpl.filterVar(source.html(),vars);

	tmpl.setByHtml(html,destination,callback);

}

/**
 * Get html of a source parsed with vars
 *
 * @param {string} source
 * @param {array} vars
 * @param {function} callback
 *
 * @return {string}
 */
tmpl.get = function(source,vars,callback){

	var source = tmpl.getSourceBytmpl(source);

	var html = source.html();

	html = tmpl.filterVar(html,vars);

	return html;

}

/**
 * Get html source
 *
 * @param {string} source
 *
 * @return {string}
 */
tmpl.getSourceBytmpl = function(source){

	var source = $('[data-tmpl='+source+']').first().clone();
	source.children().addClass('tmpl-new');

	return source;
};

/**
 * Parse source with vars
 *
 * @param {string} html
 * @param {array} vars
 *
 * @return {string}
 */
tmpl.filterVar = function(html,vars){
	for(col in vars){
		html = html.replace(new RegExp('{'+col+'}', 'g'),vars[col]);
	};
	return html;
};