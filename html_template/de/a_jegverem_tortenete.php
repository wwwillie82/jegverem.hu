<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- written by Voov (www.voov.hu), copyright 2011 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/html_template/shared/mobile_menu_css.php'; ?>

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
<script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Geschichte der Jégverem</span></h2>

                <div class="covers">
                    <? $i=1; foreach($covers as $cover): ?>
					<? $url = $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(631,631); ?>
					<div class="item SlideShow" style="background-image: url(http://<?= $_SERVER["HTTP_HOST"] ?>/<?= $url ?>);">
						<div class="navigation">
							<h4><?= nl2br($cover->description) ?></h4>

							<div class="num"><span><?= $i ?></span>/<?= $covers->length() ?></div>

							<a href="" class="prev SlideShowControlPrev">Vorheriges</a>
							<a href="" class="next SlideShowControlNext">Nächstes</a>
						</div>
					</div>
					<? $i++; endforeach; ?>
                </div>

                <p>Über das einstige städtische Eisloch wusste man lange Zeit nur aus mündlicher Überlieferung.<br />Den städtischen Rechnungsbüchern zufolge verkaufte die Stadt seit 1749 Eis.
                Über dem ehemaligen städtischen Eisloch errichtete man später eine Metzgerei
                und ein Feuerwehrgerätehaus. Das einfache Haus brannte 1837 vollständig ab. Das Gebäude wurde noch im selben Jahr nach Plänen von Márton Hasenauer wieder aufgebaut.
                Das eigentliche Loch wurde in den Hang des Sankt‑Michael‑Hügels gehauen. Sein birnenförmiges Inneres wurde mit regelmäßigen Steinen ausgekleidet. Der kleine Eingang zeigte nach Norden. Sein Inneres wurde
                mit Schilf und Stroh ausgekleidet und an den kältesten Tagen des Jahres mit gebrochenem Eis aus dem Neusiedler See (Fertő) gefüllt. Das Dach deckte man zunächst mit einer aus Holzbalken gezimmerten Decke, später mit einem Ziegelgewölbe.</p>

                <p>Mit dem Beginn der industriellen Eisproduktion verlor es seine Bedeutung; die Tür wurde zugemauert.<br />
                Das wertvolle Baudenkmal wurde von der Landesdenkmalbehörde unter Schutz gestellt und 1987 – gleichzeitig mit dem darüber stehenden Haus – nach Plänen des Planungsbetriebs des Komitats Győr‑Sopron, mit der Arbeit des Staatlichen Bauunternehmens des Komitats Győr,
                im Auftrag des Unternehmens für Viehhandel und Fleischindustrie des Komitats Győr‑Sopron, restauriert.</p>

                <p>Seit 1999 wird das Jégverem Fogadó unter dem Namen <b>Gasthaus der Bauch‑Freunde&reg;</b> betrieben – ein Ort, den Sie garantiert satt verlassen.</p>
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