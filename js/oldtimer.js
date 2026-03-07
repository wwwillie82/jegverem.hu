$(document).ready(function(){
	$("#container #cover .item:first").fadeIn(500);
	$("#container #subpage .read .slideshow .item:first").fadeIn(500);
	
	Cufon.replace("#container #menu a", {
		fontFamily: "font-1",
		textShadow: '#5a5a5a 2px 2px',
    	hover: true,
    	hover: { color: '#fff' }
    });
    
    Cufon.replace("#container #middle .main .head h3", { 
    	fontFamily: "font-2",
    	textShadow: '#fff 2px 2px'
    });
    Cufon.replace("#container #cover .item .headline h2", { fontFamily: "font-2" });
    Cufon.replace("#container .sidebar .head h3", { 
    	fontFamily: "font-2",
    	textShadow: '#fff 2px 2px'
    });
    Cufon.replace("#container .sidebar .box_felujitas h3, #container .sidebar .box_felujitas_2 h3, #container .sidebar .box_kulonleges h3", { 
    	fontFamily: "font-1",
    	textShadow: '#caa431 2px 2px'
    });
    Cufon.replace("a.btn_kerjen, a.btn_szeretnem", { 
    	fontFamily: "font-2",
    	textShadow: '#fff 2px 2px'
    });
    Cufon.replace("#container #middle .main .promo .headline", { 
    	fontFamily: "font-2",
    	textShadow: '#caa431 2px 2px'
    });
    Cufon.replace("#container #subpage .read .headline h2", { 
    	fontFamily: "font-2",
    	textShadow: '#caa431 2px 2px'
    });
    Cufon.replace("#container #subpage .read .text h3", { fontFamily: "font-2" });
    Cufon.replace("#container #subpage .read .list h3", { fontFamily: "font-2" });
    Cufon.replace("a.btn_left, a.btn_right", { 
    	fontFamily: "font-1",
    	textShadow: '#b5b4b4 1px 1px'
    });
    Cufon.replace("#container #subpage .read h2.sub", { fontFamily: "font-2" });
    Cufon.replace("#container #subpage .read .card .txt span", { fontFamily: "font-2" });
    Cufon.replace("#container #subpage .read .times span", { fontFamily: "font-2" });
    Cufon.replace("#container #subpage .read .references .item h3", { fontFamily: "font-2" });
    
    $("#container #middle .main .promo").mouseover(function(){
    	$(this).css("cursor","pointer");
    });
});

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

