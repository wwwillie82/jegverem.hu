<div id="header">
    <div class="holder">
        <h1><a href="/en/index">Jégverem Fogadó</a></h1>
		
		<div class="booking"><a href="https://nethotelbooking.net/hotels/jegverem/lang=en">ONLINE BOOKING</a></div>
		<div class="EFRA"><a href="http://jegverem.hu/projektek"><img src="../images/infoblokk_kedv_final_felso_cmyk_ERFA.jpg"></a></div>

        <div id="menu">
            <span><a href="/en/index" <? if($_SERVER["REQUEST_URI"] == "/en/index" || $_SERVER["REQUEST_URI"] == "/en"): ?>class="on"<? endif; ?>>Home</a></span>
            <span><a href="/en/heti_menu" <? if($_SERVER["REQUEST_URI"] == "/en/heti_menu"): ?>class="on"<? endif; ?>>Weekly menu</a></span>
            <span><a href="/en/ettermunk_kinalata" <? if($_SERVER["REQUEST_URI"] == "/en/ettermunk_kinalata"): ?>class="on"<? endif; ?>>Restaurant menu</a></span>
            <span><a href="/en/galeria" <? if($_SERVER["REQUEST_URI"] == "/en/galeria"): ?>class="on"<? endif; ?>>Gallery</a></span>
            <span><a href="/en/a_panziorol" <? if($_SERVER["REQUEST_URI"] == "/en/a_panziorol"): ?>class="on"<? endif; ?>>About the Inn</a></span>
            <span><a href="/en/a_jegverem_tortenete" <? if($_SERVER["REQUEST_URI"] == "/en/a_jegverem_tortenete"): ?>class="on"<? endif; ?>>History</a></span>
            <span class="no"><a href="/en/kapcsolat" <? if($_SERVER["REQUEST_URI"] == "/en/kapcsolat"): ?>class="on"<? endif; ?>>Contact</a></span>
        </div>
		
		<div class="languages">
			<a href="/index">HU</a>
			<a href="/de">DE</a>
			<a href="/en" class="on">EN</a>
		</div>
		
		<div id="fb-root"></div>

		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div class="fb-like" data-href="https://www.facebook.com/jegverem.fogado" 
		data-width="50" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
</div>