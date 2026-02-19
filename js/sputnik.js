$(document).ready(function(){
	Cufon.replace("#container #position #header h1", { fontFamily: 'breuer-headline' });
	Cufon.replace("#container #position #header_login h1", { fontFamily: 'breuer-headline' });
	Cufon.replace("#container #position #middle .top h2", { fontFamily: 'breuer-text' });
	Cufon.replace("#container #position #login h2", { fontFamily: 'breuer-text' });
	
	$("select, input[type='radio'], input[type='checkbox'], input[type='file']").not(".not_uniform").uniform();
	
	$(".image_list .images .box .pic a").mouseover(function(){
		$(this).parent().find(".zoom").fadeIn(200);
	});
	
	$(".image_list .images .box .pic a").mouseout(function(){
		$(this).parent().find(".zoom").fadeOut(200);
	});
});

function GoToURL(obj, link) {
	var selection = obj.options[obj.selectedIndex].value;
	window.location = "http://" + document.domain + "/" + link + selection;
}