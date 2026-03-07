var ua = navigator.userAgent.toLowerCase();
var client = {
    isStrict:   document.compatMode == 'CSS1Compat',
    isOpera:    ua.indexOf('opera') > -1,
    isIE:       ua.indexOf('msie') > -1,
    isIE7:      ua.indexOf('msie 7') > -1,
    isSafari:   /webkit|khtml/.test(ua),
    isWindows:  ua.indexOf('windows') != -1 || ua.indexOf('win32') != -1,
    isMac:      ua.indexOf('macintosh') != -1 || ua.indexOf('mac os x') != -1,
    isLinux:    ua.indexOf('linux') != -1
};
client.isBorderBox = client.isIE && !client.isStrict;
client.isSafari3 = client.isSafari && !!(document.evaluate);
client.isGecko = ua.indexOf('gecko') != -1 && !client.isSafari;

var ltIE7 = client.isIE && !client.isIE7;

if(ltIE7){
  addLoadEvent(display_warning);
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      func();
      if (oldonload) {
        oldonload();
      }
    }
  }
}
  
function display_warning(){
  var oldHtml = document.body.innerHTML;
  var css_a = 'text-decoration: underline; color: black; font-weight:bold;';
  var warningHtml = "";
  warningHtml += '<style>';
  warningHtml += 'html, body { ';
  warningHtml += 'overflow-y: hidden!important; ';
  warningHtml += 'height: 100%;';
  warningHtml += 'padding: 0px;';
  warningHtml += 'margin: 0px;';
  warningHtml += '</style>';
  warningHtml += "<div style='position: absolute; top:0px; bottom:auto; left:0px; right:0px; margin: 0px; height:17px; padding: 3px; font-family: Verdana, Helvetica, Geneva, Arial, sans-serif; font-size:10px; background-color:#FFFFE1; color:black; border-top: 1px solid #FFFFE1; border-bottom: 1px solid #cccccc; padding-left:15px; margin-left: -15px;'>";
  warningHtml += "<div style='float:right; text-align:right; width:60px; margin: auto 5px;'>";
  warningHtml += "<a style='text-decoration: none; color: black;' href='#close' onclick='this.parentNode.parentNode.style.display=\"none\"; this.parentNode.parentNode.parentNode.childNodes[0].childNodes[0].style.display=\"none\"; return false;'>[ bezárás ]</a>";
  warningHtml += "</div>";
  warningHtml += "<div style='text-align:left; margin:auto 10px;'>";
  warningHtml += "Ön egy régi verziószámú Internet Explorer böngészőt használ, <a style='"+css_a+"' target='_blank' href='http://windows.microsoft.com/hu-HU/internet-explorer/products/ie/home'>kattintson ide</a> az újabb verzió letöltéséhez! Ajánlott böngészők <a style='"+css_a+"' target='_blank' href='http://www.mozilla.com/firefox/'>Firefox</a>, <a style='"+css_a+"' target='_blank' href='http://www.google.com/chrome?hl=hu'>Google Chrome</a> vagy <a style='"+css_a+"' target='_blank' href='http://www.opera.com/download/'>Opera</a>.";
  warningHtml += "</div>";
  warningHtml += "</div>";
  var spacerHTML = "";
  spacerHTML += "<div style='height:25px; line-height:25px; font-size:10px; display:block; margin:0px; padding:0px;'>";
  spacerHTML += "</div>";
  var oldHTMLWrap = "";
  oldHTMLWrap += "<div style='width:100%; margin:0px; padding:0px; height:100%; overflow-y: scroll; position:relative;'>";
  oldHTMLWrap += spacerHTML;
  oldHTMLWrap += oldHtml;
  oldHTMLWrap += "</div>";
  document.body.innerHTML = oldHTMLWrap + warningHtml;
}