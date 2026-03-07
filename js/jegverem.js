$(document).ready(function(){
    $("#container #middle .box_two .covers .item:first").show();
    $("#container #middle .main .content .covers .item").show();
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

VOOV.SlideShow.OnSwitchCallback = function(index) {
    $("a.SlideShowControlId").each(function() {
        if($(this).attr("rel") == index) {
            $(this).html("<img src=\"http://" + document.domain + "/images/bubble_on.png\" alt=\"\" />");
        } else {
            $(this).html("<img src=\"http://" + document.domain + "/images/bubble.png\" alt=\"\" />");
        }
    });
}