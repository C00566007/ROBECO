// JavaScript Document

var currname = '#first-wrapper';
function display(theone){
	if(currname != theone){
	$(currname).fadeOut(200, function(){$(theone).fadeIn(200);});
	currname = theone;
	}
} 