/**
 * VOOV.SlideShow Javascript Library
 * Uses: jQuery 1.3
 * 
 * @author VOOV Ltd. - Daniel Fekete
 * @copyright 2009-2010 VOOV Ltd.
 * @license Creative Commons 3.0 BY-SA hu
 * @version 0.1 
 */

var VOOV = function() {
	// private functions and variables
	var Library_Version = "0.1";
	var SlideShow_Paused = false;
	var SlideShow_ItemCount = -1;
	var SlideShow_CurrentIndex = -1;
	var SlideShow_ButtonClass = "";
	var SlideShow_ButtonActiveClass = "";
	var SlideShow_CanLoop = true;
	var SlideShow_Interval = 0;
	var SlideShow_DisableURIHandler = false;
	var SlideShow_EnableFriendlyURI = false;
	
	
	// public functions and variables
	return {
		SlideShow : function(){
			var Library_Version = "0.1";
			var m_objects = new Array();
			var m_linkobjects = new Array();
			
			function GetSlideShowItems() {
				$(".SlideShow").each(function() {
					m_objects.push(this);
				});
				$(".SlideShowControlId").each(function() {
					m_linkobjects.push(this);
				});
				SlideShow_ItemCount = m_objects.length;
				SlideShow_CurrentIndex = 1;
			}
			return {
				Construct: function(options_obj) {
					// paused, interval, buttonclass, buttonactiveclass
					
					SlideShow_ButtonActiveClass = options_obj.button_activeclass;
					SlideShow_ButtonClass = options_obj.button_class;
					SlideShow_Paused = options_obj.paused;
					SlideShow_Interval = options_obj.animate_interval;
					if (options_obj.disable_urihandler) {
						SlideShow_DisableURIHandler = options_obj.disable_urihandler;
					}
					
					if (options_obj.enable_friendlyuri) SlideShow_EnableFriendlyURI = options_obj.enable_friendlyuri;
					
					//alert(SlideShow_ButtonActiveClass);
					$(document).ready(function() {
						GetSlideShowItems(); // Get all slide show items
						//alert(options_obj);
						for(var i=1; i<SlideShow_ItemCount;i++) {
							$(m_objects[i]).hide();
						}
						// add links to swith to
						$(".SlideShowControlId").each(function() {
							this.onclick = function(){
								
								slide_id = $(this).attr("rel");
								VOOV.SlideShow.SetPause(true);
								VOOV.SlideShow.SwitchTo(slide_id);
								return false;
							}
						});
						// build prev and next links
						$(".SlideShowControlPrev").each(function() {
							this.onclick = function(){
								VOOV.SlideShow.SetPause(true);
								VOOV.SlideShow.SwitchPrev();
								return false;
							}
						});
						$(".SlideShowControlNext").each(function() {
							this.onclick = function(){
								VOOV.SlideShow.SetPause(true);
								VOOV.SlideShow.SwitchNext();
								return false;
							}
						});
						
						// Switch to if found in URL
						if (SlideShow_DisableURIHandler == false) {
							var url_regexp = /#switchto-([0-9]+)/;
							var match = url_regexp.exec(window.location.href);
							if (match != null) {
								var result = parseInt(match[1]);
								VOOV.SlideShow.SetPause(true);
								VOOV.SlideShow.SwitchTo(result);
							}
						}
						
						// Animate if needed
						if (options_obj.animatable == true) {
							setTimeout(VOOV.SlideShow.Animate, SlideShow_Interval);
						}
						
						
					});
				},
				
				Pause: function() {
					if (SlideShow_Paused == true)
						VOOV.SlideShow.SetPause(false);
					else
						VOOV.SlideShow.SetPause(true);
				},
				
				SetPause: function(pause) {
					if (SlideShow_Paused == pause) return;
					SlideShow_Paused = pause;
					VOOV.SlideShow.PauseCallback(pause);
				},
				
				PauseCallback: function(paused) {},
				
				OnSwitchCallback: function(index) {},
				
				Animate: function() {
					
					if (SlideShow_Paused == false) VOOV.SlideShow.SwitchNext();
					setTimeout(VOOV.SlideShow.Animate, SlideShow_Interval);
				},
				
				SwitchTo: function(index) {
					if (SlideShow_EnableFriendlyURI) VOOV.SlideShow.RewriteURI(index);
					VOOV.SlideShow.OnSwitchCallback(index);
					var correct_index = index - 1;
					var correct_current_index = SlideShow_CurrentIndex - 1;
					if (correct_current_index == correct_index) return;
					
					if (SlideShow_ButtonActiveClass != "" && SlideShow_ButtonActiveClass != undefined) {
						//$(".SlideShowControlId:eq(" + correct_index + ")").addClass(SlideShow_ButtonActiveClass);
						//$(".SlideShowControlId:eq(" + correct_current_index + ")").removeClass(SlideShow_ButtonActiveClass);
						//alert(correct_current_index + " " + correct_index);
						$(m_linkobjects[correct_current_index]).removeClass("imagelink_active");
						$(m_linkobjects[correct_index]).addClass("imagelink_active");
					}
					
					if (SlideShow_ButtonClass && SlideShow_ButtonClass != undefined) {
						$(m_linkobjects[correct_current_index]).addClass(SlideShow_ButtonClass);
						$(m_linkobjects[correct_index]).removeClass(SlideShow_ButtonClass);
					}
					
					$(m_objects[correct_current_index]).fadeOut(1000);
					$(m_objects[correct_index]).fadeIn(1000);
					SlideShow_CurrentIndex = index;
				},
				
				RewriteURI: function(index) {
					if(!window.location.href.match(/#switchto-([0-9]+)/)) {
						window.location.href += "#switchto-" + index;
					}
					window.location.href = window.location.href.replace(/#switchto-([0-9]+)/g, "#switchto-" + index);
				},
				
				SwitchNext: function() {
					if(SlideShow_CurrentIndex == SlideShow_ItemCount) {
						if (SlideShow_CanLoop) VOOV.SlideShow.SwitchTo(1);
						return;						
					}
					current_index = parseInt(SlideShow_CurrentIndex);
					VOOV.SlideShow.SwitchTo(current_index+1);
				},
				
				SwitchPrev: function()  {
					if(SlideShow_CurrentIndex == 1) {
						if (SlideShow_CanLoop) VOOV.SlideShow.SwitchTo(SlideShow_ItemCount);
						return;						
					}
					current_index = parseInt(SlideShow_CurrentIndex);
					VOOV.SlideShow.SwitchTo(current_index-1);
				}
				
				
			}
		}()
		
		
	};
}();
