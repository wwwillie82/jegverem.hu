<div id="header">
    <div class="holder">
        <h1><a href="/index">Jégverem Fogadó</a></h1>
		
		<div class="booking"><a href="https://nethotelbooking.net/hotels/jegverem/lang=hu">SZOBAFOGLALÁS</a></div>
		<div class="ordering"><a href="https://mobilpincer.net/hu/jegverem-fogado"><img border="0" src="../images/gomb_jv_ONLINE_rendeles.png" width="250" height="66"></a></div>
		<div class="tablebooking"><a href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee"><img border="0" src="../images/gomb_jv_online_asztalfoglalas.png"
		width="250" height="66"></a></div>
		<div class="EFRA"><a href="http://jegverem.hu/projektek"><img src="../images/infoblokk_kedv_final_felso_cmyk_ERFA.jpg"></a></div>
		<div class="phone_number"></div>

		<?php  $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/'; ?>
		<?php  $isHome = in_array($path, ['/', '/index', '/index/'], true); ?>
		<?php  if($isHome): ?>
		<div class="home-v2-topbar">
			<div class="home-v2-social">
				<span class="soc tiktok"><img src="../images/skin_v2/tiktok.png" alt="TikTok"></span>
				<span class="soc instagram"><img src="../images/skin_v2/instagram.png" alt="Instagram"></span>
				<a href="https://www.facebook.com/jegverem.fogado" class="soc facebook"><img src="../images/skin_v2/facebook.png" alt="Facebook"></a>
			</div>
			<div class="home-v2-cta">
				<a class="cta order" href="https://mobilpincer.net/hu/jegverem-fogado"><span>Online Ételerendelés</span></a>
				<a class="cta table" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee"><span>Asztalfoglalás</span></a>
				<a class="cta rooms" href="https://nethotelbooking.net/hotels/jegverem/lang=hu"><span>Szállás</span></a>
				<a class="cta events" href="#" onclick="return false;"><span>Zártkörű rendezvények</span></a>
			</div>
		</div>
		<?php  endif; ?>
        <div id="menu">
            <span><a href="/index" <?php  if($_SERVER["REQUEST_URI"] == "/index" || $_SERVER["REQUEST_URI"] == "/"): ?>class="on"<?php  endif; ?>>Kezdőlap</a></span>
            <span><a href="/heti_menu" <?php  if($_SERVER["REQUEST_URI"] == "/heti_menu"): ?>class="on"<?php  endif; ?>>Heti menü</a></span>
            <span><a href="/ettermunk_kinalata" <?php  if($_SERVER["REQUEST_URI"] == "/ettermunk_kinalata"): ?>class="on"<?php  endif; ?>>Éttermünk kínálata</a></span>
            <span><a href="/galeria" <?php  if($_SERVER["REQUEST_URI"] == "/galeria"): ?>class="on"<?php  endif; ?>>Galéria</a></span>
            <span><a href="/a_panziorol" <?php  if($_SERVER["REQUEST_URI"] == "/a_panziorol"): ?>class="on"<?php  endif; ?>>A panzióról</a></span>
            <span><a href="/a_jegverem_tortenete" <?php  if($_SERVER["REQUEST_URI"] == "/a_jegverem_tortenete"): ?>class="on"<?php  endif; ?>>Jégverem története</a></span>
			<span><a href="/projektek" <?php  if($_SERVER["REQUEST_URI"] == "/projektek"): ?>class="on"<?php  endif; ?>>Projektek</a></span>
            <span class="no"><a href="/kapcsolat" <?php  if($_SERVER["REQUEST_URI"] == "/kapcsolat"): ?>class="on"<?php  endif; ?>>Kapcsolat</a></span>
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
		
		
    </div>
</div>