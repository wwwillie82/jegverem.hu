<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- written by Voov (www.voov.hu), copyright 2011 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Jégverem Fogadó</title>
	<meta name="title" content="Jégverem Fogadó" />
	<meta name="Keywords" lang="HU" content="" />
	<meta name="Description" lang="HU" content="" />
	<meta http-equiv="Content-Language" content="hu-hu" />
    <meta name="Page-Topic" content="all, alle" />
    <meta name="Distribution" content="global" />
	<meta http-equiv="Cache-Control" content="no-cache"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta name="Robots" content="index,follow" />
	<meta http-equiv="Imagetoolbar" content="no" />
	<meta name="Owner" content="Jégverem Fogadó (www.jegverem.hu)" />
	<meta name="Copyright" content="Copyright (c) 2011 Jégverem Fogadó, All Rights Reserved" />
	<meta name="Author" content="Voov Kft. (www.jegverem.hu)" />
	<meta name="Designer" content="Voov Kft. (www.jegverem.hu)" />

	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
	<link href="/css/main.css?v=20260221" rel="stylesheet" type="text/css" media="screen" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
	
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-D729CRGYTY"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-D729CRGYTY');
	</script>
</head>
<body>

<!-- container -->
<div id="container">
    <?= $header ?>
<!-- <script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>-->

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2 class="nobg"><span>Wochenmenü</span></h2>
				<div class="icon_price"></div>

				<? if($menus->length() > 0): ?>
					<h3>Ezen a héten (<?= $menus->week ?>. hét)</h3>

					<? 
					$days = array("Extra menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
					foreach($menus as $menu):
					?>
					<h5><span><?= $days[$menu->day] ?></span></h5>
					<div class="food">
						<?= nl2br($menu->offer_text) ?>
					</div>
					<? endforeach; ?>
				<? endif; ?>

				<? if($next_menus->length() > 0): ?>
					<h3>Következő héten (<?= $next_menus->week ?>. hét)</h3>

					<? 
					$days = array("Extra menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
					foreach($next_menus as $menu):
					?>
					<h5><span><?= $days[$menu->day] ?></span></h5>
					<div class="food">
						<?= nl2br($menu->offer_text) ?>
					</div>
					<? endforeach; ?>
				<? endif; ?>

            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
            $lang = 'de';
            $order = array('accommodation', 'menu', 'delivery');
            include $_SERVER['DOCUMENT_ROOT'] . '/modules/sidebar/html_template/home_mini_cards.php';
            ?>
        </div>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>