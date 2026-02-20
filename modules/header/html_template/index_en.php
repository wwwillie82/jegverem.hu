<div id="header">
    <div class="holder">
        <h1><a href="/en/index">Jégverem Fogadó</a></h1>
		
		<div class="booking"><a href="https://nethotelbooking.net/hotels/jegverem/lang=en">ONLINE BOOKING</a></div>
		<div class="EFRA"><a href="http://jegverem.hu/projektek"><img src="../images/infoblokk_kedv_final_felso_cmyk_ERFA.jpg"></a></div>

		<?php  $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'; ?>
		<?php  $isHome = in_array($path, ['/en', '/en/', '/en/index', '/en/index/'], true); ?>
		<?php  if($isHome): ?>
		<div class="home-v2-topbar">
			<div class="home-v2-social">
				<span class="soc tiktok"><img src="../images/skin_v2/tiktok.png" alt="TikTok"></span>
				<span class="soc instagram"><img src="../images/skin_v2/instagram.png" alt="Instagram"></span>
				<a href="https://www.facebook.com/jegverem.fogado" class="soc facebook"><img src="../images/skin_v2/facebook.png" alt="Facebook"></a>
			</div>
			<div class="home-v2-cta">
				<a class="cta order" href="https://mobilpincer.net/hu/jegverem-fogado"><span>Online order</span></a>
				<a class="cta table" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee"><span>Table booking</span></a>
				<a class="cta rooms" href="https://nethotelbooking.net/hotels/jegverem/lang=en"><span>Rooms</span></a>
				<a class="cta events" href="#" onclick="return false;"><span>Private events</span></a>
			</div>
		</div>
		<?php  endif; ?>

        <div id="menu">
            <span><a href="/en/index" <?php  if($_SERVER["REQUEST_URI"] == "/en/index" || $_SERVER["REQUEST_URI"] == "/en"): ?>class="on"<?php  endif; ?>>Home</a></span>
            <span><a href="/en/heti_menu" <?php  if($_SERVER["REQUEST_URI"] == "/en/heti_menu"): ?>class="on"<?php  endif; ?>>Weekly menu</a></span>
            <span><a href="/en/ettermunk_kinalata" <?php  if($_SERVER["REQUEST_URI"] == "/en/ettermunk_kinalata"): ?>class="on"<?php  endif; ?>>Restaurant menu</a></span>
            <span><a href="/en/galeria" <?php  if($_SERVER["REQUEST_URI"] == "/en/galeria"): ?>class="on"<?php  endif; ?>>Gallery</a></span>
            <span><a href="/en/a_panziorol" <?php  if($_SERVER["REQUEST_URI"] == "/en/a_panziorol"): ?>class="on"<?php  endif; ?>>About the Inn</a></span>
            <span><a href="/en/a_jegverem_tortenete" <?php  if($_SERVER["REQUEST_URI"] == "/en/a_jegverem_tortenete"): ?>class="on"<?php  endif; ?>>History</a></span>
            <span class="no"><a href="/en/kapcsolat" <?php  if($_SERVER["REQUEST_URI"] == "/en/kapcsolat"): ?>class="on"<?php  endif; ?>>Contact</a></span>
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