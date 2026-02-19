<div id="header">
    <div class="holder">
        <h1><a href="/de/index">Jégverem Fogadó</a></h1>

        <div id="menu">
            <span><a href="/de/index" <? if($_SERVER["REQUEST_URI"] == "/de/index" || $_SERVER["REQUEST_URI"] == "/de"): ?>class="on"<? endif; ?>>Startseite</a></span>
            <span><a href="/de/heti_menu" <? if($_SERVER["REQUEST_URI"] == "/de/heti_menu"): ?>class="on"<? endif; ?>>Wochenmenü</a></span>
            <span><a href="/de/ettermunk_kinalata" <? if($_SERVER["REQUEST_URI"] == "/de/ettermunk_kinalata"): ?>class="on"<? endif; ?>>Angebote unseres Restaurants</a></span>
            <span><a href="/de/galeria" <? if($_SERVER["REQUEST_URI"] == "/de/galeria"): ?>class="on"<? endif; ?>>Galerie</a></span>
            <span><a href="/de/a_panziorol" <? if($_SERVER["REQUEST_URI"] == "/de/a_panziorol"): ?>class="on"<? endif; ?>>Über uns</a></span>
            <span><a href="/de/a_jegverem_tortenete" <? if($_SERVER["REQUEST_URI"] == "/de/a_jegverem_tortenete"): ?>class="on"<? endif; ?>>Geschichte</a></span>
            <span class="no"><a href="/de/kapcsolat" <? if($_SERVER["REQUEST_URI"] == "/de/kapcsolat"): ?>class="on"<? endif; ?>>Kontakte</a></span>
        </div>
		
		<div class="languages">
			<a href="/index">HU</a>
			<a href="/de" class="on">DE</a>
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
		data-width="50" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    </div>
</div>