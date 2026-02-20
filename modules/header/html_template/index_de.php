<div id="header">
    <div class="holder">
        <h1><a href="/de/index">Jégverem Fogadó</a></h1>
		
		<div class="booking"><a href="https://nethotelbooking.net/hotels/jegverem/lang=de">ONLINE BUCHUNG</a></div>
		<div class="EFRA"><a href="http://jegverem.hu/projektek"><img src="../images/infoblokk_kedv_final_felso_cmyk_ERFA.jpg"></a></div>

		<?php  $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'; ?>
		<?php  $isHome = in_array($path, ['/de', '/de/', '/de/index', '/de/index/'], true); ?>
		<?php  if($isHome): ?>
		<div class="home-v2-topbar">
			<div class="home-v2-social">
				<span class="soc tiktok"><img src="../images/skin_v2/tiktok.png" alt="TikTok"></span>
				<span class="soc instagram"><img src="../images/skin_v2/instagram.png" alt="Instagram"></span>
				<a href="https://www.facebook.com/jegverem.fogado" class="soc facebook"><img src="../images/skin_v2/facebook.png" alt="Facebook"></a>
			</div>
			<div class="home-v2-cta">
				<a class="cta order" href="https://mobilpincer.net/hu/jegverem-fogado"><span>Online Bestellung</span></a>
				<a class="cta table" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee"><span>Tischreservierung</span></a>
				<a class="cta rooms" href="https://nethotelbooking.net/hotels/jegverem/lang=de"><span>Zimmer</span></a>
				<a class="cta events" href="#" onclick="return false;"><span>Private Veranstaltungen</span></a>
			</div>
		</div>
		<?php  endif; ?>

        <div id="menu">
            <span><a href="/de/index" <?php  if($_SERVER["REQUEST_URI"] == "/de/index" || $_SERVER["REQUEST_URI"] == "/de"): ?>class="on"<?php  endif; ?>>Startseite</a></span>
            <span><a href="/de/heti_menu" <?php  if($_SERVER["REQUEST_URI"] == "/de/heti_menu"): ?>class="on"<?php  endif; ?>>Wochenmenü</a></span>
            <span><a href="/de/ettermunk_kinalata" <?php  if($_SERVER["REQUEST_URI"] == "/de/ettermunk_kinalata"): ?>class="on"<?php  endif; ?>>Angebote unseres Restaurants</a></span>
            <span><a href="/de/galeria" <?php  if($_SERVER["REQUEST_URI"] == "/de/galeria"): ?>class="on"<?php  endif; ?>>Galerie</a></span>
            <span><a href="/de/a_panziorol" <?php  if($_SERVER["REQUEST_URI"] == "/de/a_panziorol"): ?>class="on"<?php  endif; ?>>Über uns</a></span>
            <span><a href="/de/a_jegverem_tortenete" <?php  if($_SERVER["REQUEST_URI"] == "/de/a_jegverem_tortenete"): ?>class="on"<?php  endif; ?>>Geschichte</a></span>
            <span class="no"><a href="/de/kapcsolat" <?php  if($_SERVER["REQUEST_URI"] == "/de/kapcsolat"): ?>class="on"<?php  endif; ?>>Kontakte</a></span>
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