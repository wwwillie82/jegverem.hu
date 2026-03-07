<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<title>Jégverem Fogadó</title>
	<meta name="title" content="Jégverem Fogadó" />
	<meta http-equiv="Content-Language" content="hu-hu" />
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
</head>
<? $__pageBodyClass = "page-private-events"; if (isset($body_class) && trim($body_class) != "") { $__pageBodyClass = trim($body_class . " " . $__pageBodyClass); } ?>
<body class="<?= $__pageBodyClass ?>">

<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Privát rendezvény a Jégveremben!</span></h2>

                <p>Születésnap, baráti találkozó, üzleti vacsora, családi esemény vagy osztálytalálkozó? A Jégverem tökéletes helyszín, ha együtt lennétek, nyugodt és zártkörű környezetben. Segítünk, hogy az alkalom gördülékeny és emlékezetes legyen.</p>

                <h3>Miért jó választás?</h3>
                <ul>
                    <li><strong>Exkluzív</strong> – igazi privát élmény, ahol csak Ti vagytok.</li>
                    <li><strong>Nincs bérleti díj</strong> – vagy elvárt minimum fogyasztás, csak rendeljetek ebédet vagy vacsorát a társaságnak.</li>
                    <li><strong>Rugalmas időpontok</strong> – nyitvatartáson kívül is egyeztethető.</li>
                    <li><strong>Egyedi menüajánlat</strong> – a társaság igényeire szabva.</li>
                </ul>

                <h3>Válaszd ki a tökéletes helyszínt!</h3>
                <p>Három különböző helyszín közül választhattok, létszámtól és hangulattól függően.</p>

                <div class="private-event-cards">
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:emeleti-privat-terem-2026-01-01" title="Emelet"><img src="/images/skin_v2/emelet_jegverem_fogado_privat_rendezveny.png" alt="Emelet" /></a>
                        <h4>Emelet</h4>
                        <p>Max. 35 fő</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:a-terasz-2026-01-01" title="Terasz"><img src="/images/skin_v2/terasz_jegverem_fogado_privat_rendezveny.png" alt="Terasz" /></a>
                        <h4>Terasz</h4>
                        <p>Max. 40 fő</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:az-etterem-2026-01-01" title="Egész étterem"><img src="/images/skin_v2/etterem_jegverem_fogado_privat_rendezveny.png" alt="Egész étterem" /></a>
                        <h4>Egész étterem</h4>
                        <p>Max. 100 fő</p>
                    </div>
                </div>

                <p class="private-event-note"><strong>Minimum létszám bármely helyiség esetén: 15 fő.</strong></p>

                <h3>A pult csak a Tiétek!</h3>
                <p>Egy kollégánk kizárólag a Ti kívánságaitokat figyeli, így a kiszolgálás gyors, figyelmes és személyes marad az esemény teljes ideje alatt.</p>

                <h3>Igazodunk hozzátok</h3>
                <p>Rugalmasan egyeztetünk veletek a részletekről, és nyitvatartási időn túl is biztosítunk időpontot, ha az nektek ideális.</p>

                <h3>A konyha csak Nektek főz</h3>
                <p>Választhattok előre egyeztetett a&apos;la&apos;carte rendelést vagy teljesen egyedi menüajánlatot is.</p>

                <h3>Ajánlatkérés</h3>
                <p>Kérj ajánlatot, és 24 órán belül megkapod a <a href="mailto:jegverem@jegverem.hu">jegverem@jegverem.hu</a> e-mail címünkön.</p>
                <p>Kérdés esetén elérsz minket:<br />
                telefonon: <a href="tel:+36309528687">+36 30 952 8687</a><br />
                személyesen: 9400 Sopron, Jégverem u. 1.</p>
            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'hu';
                $order = array('accommodation', 'menu', 'delivery');
                include $_SERVER['DOCUMENT_ROOT'] . '/modules/sidebar/html_template/home_mini_cards.php';
            ?>
        </div>
        <br class="clearfix" />
    </div>

	<?= $banner ?>
    <?= $footer ?>
</div>

</body>
</html>
