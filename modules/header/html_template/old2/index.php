<div id="header">
    <div class="holder">
        <h1><a href="/index">Jégverem Fogadó</a></h1>

        <div id="menu">
            <span><a href="/index" <? if($_SERVER["REQUEST_URI"] == "/index" || $_SERVER["REQUEST_URI"] == "/"): ?>class="on"<? endif; ?>>Kezdőlap</a></span>
            <span><a href="/heti_menu" <? if($_SERVER["REQUEST_URI"] == "/heti_menu"): ?>class="on"<? endif; ?>>Heti menü</a></span>
            <span><a href="/ettermunk_kinalata" <? if($_SERVER["REQUEST_URI"] == "/ettermunk_kinalata"): ?>class="on"<? endif; ?>>Éttermünk kínálata</a></span>
            <span><a href="/galeria" <? if($_SERVER["REQUEST_URI"] == "/galeria"): ?>class="on"<? endif; ?>>Galéria</a></span>
            <span><a href="/a_panziorol" <? if($_SERVER["REQUEST_URI"] == "/a_panziorol"): ?>class="on"<? endif; ?>>A panzióról</a></span>
            <span><a href="/a_jegverem_tortenete" <? if($_SERVER["REQUEST_URI"] == "/a_jegverem_tortenete"): ?>class="on"<? endif; ?>>A Jégverem története</a></span>
            <span class="no"><a href="/kapcsolat" <? if($_SERVER["REQUEST_URI"] == "/kapcsolat"): ?>class="on"<? endif; ?>>Kapcsolat</a></span>
        </div>
		
		<div class="languages">
			<a href="/index" class="on">HU</a>
			<a href="/de">DE</a>
			<a href="/en">EN</a>
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
		data-width="50" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		
		<div class="booking" data-href="https://www.facebook.com/jegverem.fogado" 
		data-width="50" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		
    </div>
</div>