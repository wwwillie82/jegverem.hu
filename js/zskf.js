$(document).ready(function(){
	$("#container #middle .content .main .cover .item:first").fadeIn(500);
	$("#container #middle .content .sidebar .statistic .block:first").show();
	$("#container #middle .content .sidebar .categories .data:first").show();
	
	Cufon.replace("#container #menu .small a", {
		fontFamily: "font-1",
		hover: true,
    	hover: { color: '#ffffff' }
	});
	
	Cufon.replace("#container #menu .big a", {
		fontFamily: "font-2",
		hover: true,
    	hover: { color: '#ffffff' }
	});
	
	Cufon.replace(".search-row h3 a,#container #middle .content .main .box_two .item .data h3 a,#container #middle .content .main .subpage .data .video h3 a,#container #middle .content .main .subpage .data .about h3 a, #container #middle .content .sidebar .data h3 a, #container #middle .content .main .subpage .data .txt h3 a", {
		fontFamily: "font-1",
		hover: true,
    	hover: { color: '#444' }
	});
	
	Cufon.replace("a.btn_miert,a.btn_jelentkezes,a.btn_tamogass,a.btn_facebook", {
		fontFamily: "font-2",
		hover: true,
    	hover: { color: '#000' }
	});
	
	Cufon.replace("#container #middle .content .time", {fontFamily:'font-1'});
	Cufon.replace("#footer h4", {fontFamily:'font-1'});
	Cufon.replace("#container #middle .content .main .cover .item .data h3", {fontFamily:'font-2'});
	Cufon.replace("#container #middle .content .main .cover .item .num", {fontFamily:'font-2'});
	Cufon.replace("#container #middle .content .head h2", {fontFamily:'font-1'});
	Cufon.replace("#container #middle .content .sidebar .statistic .block span", {fontFamily:'font-2'});
	Cufon.replace("#container #middle .content .cover_full .data h2", {fontFamily:'font-2'});
	Cufon.replace("#container #middle .content .main .subpage .headline span.title h2", {fontFamily:'font-2'});
	Cufon.replace("#container #middle .content .main .subpage .read h1,#container #middle .content .main .subpage .read h2,#container #middle .content .main .subpage .read h3,#container #middle .content .main .subpage .read h4,#container #middle .content .main .subpage .read h5,#container #middle .content .main .subpage .read h6", {fontFamily:'font-1'});
	
	$("select[name='education']").uniform();
	$("select[name='calendar']").uniform();
	
	var current_block = 1;
	var max_block = 3;
	$("a.btn_right_2").click(function(e){
		$("#block_" + current_block).hide();
		if(max_block == current_block) current_block = 0;
		current_block++;

		$("#block_" + current_block).show();
		e.preventDefault();
	});
	
	$("a.btn_left_2").click(function(e){
		$("#block_" + current_block).hide();
		if(current_block == 1) current_block = max_block + 1;
		current_block--;

		$("#block_" + current_block).show();
		e.preventDefault();
	});
});

var current_tab = 1;
function switchTab(i) {
	if(current_tab == i) return;
	$("#tab_" + current_tab).hide();
	$("#tab_" + i).show();
	
	$("#tabs_0" + current_tab + "_on").attr("id", "tabs_0" + current_tab);
	$("#tabs_0" + i).attr("id", "tabs_0" + i + "_on");
	current_tab = i;
}

function GoToURL(obj, link) {
	var selection = obj.options[obj.selectedIndex].value;
	window.location = "http://" + document.domain + "/" + link + selection;
}

VOOV.SlideShow.Construct({
  paused:false, 
  button_activeclass:"imagelink_active", 
  animate_interval: 5000, 
  animatable: true, 
  enable_friendlyuri: false
  });
  
VOOV.SlideShow.PauseCallback = function(paused) {
  if (paused == true) {
    $("#pause_on").show();
  	$("#pause_off").hide();
} else {
  	$("#pause_on").hide();
  	$("#pause_off").show();
  }
}

VOOV.SlideShow.OnSwitchCallback = function(index) {
  $("a.SlideShowControlId").each(function() {
    if($(this).attr("rel") == index) {
      $(this).html("<img src=\"http://" + document.domain + "/images/bubble_on.gif\" alt=\"\" />");
    } else {
      $(this).html("<img src=\"http://" + document.domain + "/images/bubble.gif\" alt=\"\" />");
    }
  });
}