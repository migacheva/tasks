var AjaxContent = function(){
    var container_div = ''; 
	var content_div = ''; 
	return {
		getContent : function(url){
var el = document.getElementById("lodor"); el.style.cssText="display:block;";
			$(container_div).animate({opacity:0},
					function(){ // the callback, loads the content with ajax
						$(container_div).load(url+" "+content_div, //only loads the selected portion
						function(){		
var el = document.getElementById("lodor"); el.style.cssText="display:none;";
						   $(container_div).animate({opacity:1}); 
					}
				);        
			});
		},
		ajaxify_links: function(elements){
			$(elements).click(function(){
				AjaxContent.getContent(this.href);
				return false; //prevents the link from beign followed
			});
		},
		init: function(params){ //sets the initial parameters
			container_div = params.containerDiv; 
			content_div = params.contentDiv;
			return this; //returns the object in order to make it chainable
		}
	}
}();