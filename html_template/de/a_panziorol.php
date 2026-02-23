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
	<link href="../css/main.css?v=20260221" rel="stylesheet" type="text/css" media="screen" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-11988214-3']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>
<? $__pageBodyClass = "page-a_panziorol"; if (isset($body_class) && trim($body_class) != "") { $__pageBodyClass = trim($body_class . " " . $__pageBodyClass); } ?>
<body class="<?= $__pageBodyClass ?>">

<!-- container -->
<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h1>Unterkunft</h1>

                <div class="panel-box">
                    <p><strong>Unterkunft im Gasthof Jégverem</strong><br />
                    Das Gebäude des ehemaligen städtischen Eiskellers wurde als Gasthof neu geboren, wobei die traditionellen Merkmale der Holzkonstruktion bewahrt wurden. Die Innenräume und der Gartenbereich schaffen eine besondere Atmosphäre, während im Zentrum des Restaurants der alte Eiskeller bis heute besichtigt werden kann. In der Pension erwarten 6 Zimmer im authentischen Stil, ausgestattet mit modernem Komfort, die Gäste. Diese Unterkunft ist ein idealer Ausgangspunkt für die Entdeckung von Ödenburg (Sopron), da sie sich in unmittelbarer Nähe der historischen Altstadt, im alten Poncichter-Viertel, befindet.</p>
                </div>

                <div class="booking-cta">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=de" target="_blank" rel="noopener noreferrer" title="Zimmer buchen">
                        <img src="/images/skin_v2/gomb_foglalas_de.png" alt="Zimmer buchen" />
                    </a>
                </div>

                <div class="covers">
                    <? $i=1; foreach($covers as $cover): ?>
                    <? $url = $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(631,631); ?>
                    <div class="item SlideShow" style="background-image: url(http://<?= $_SERVER["HTTP_HOST"] ?>/<?= $url ?>);">
                        <div class="navigation">
                            <h4><?= nl2br($cover->description) ?></h4>

                            <div class="num"><span><?= $i ?></span>/<?= $covers->length() ?></div>

                            <a href="" class="prev SlideShowControlPrev">Előző</a>
                            <a href="" class="next SlideShowControlNext">Következő</a>
                        </div>
                    </div>
                    <? $i++; endforeach; ?>
                </div>

                <div class="panel-box">
                    <p>Unser Gasthof erwartet seine Gäste mit vier unterschiedlich gestalteten Zimmern: ein Doppelzimmer mit Galerie, ein Vierbettzimmer mit Galerie sowie ein Standard-Doppelzimmer und ein Standard-Vierbettzimmer.</p>
                    <p>Das reichhaltige Angebot unseres Restaurants bietet eine große Auswahl für Mittag- und Abendessen. Unsere Hotelgäste erhalten 10% Rabatt auf alle Speisen.</p>

                    <h3>Zimmerausstattung:</h3>
                    <ul>
                        <li>Klimaanlage</li>
                        <li>Flachbild-TV</li>
                        <li>WLAN</li>
                        <li>Doppelbett (2 fest zusammengeschobene Betten, je 90x200 cm)</li>
                        <li>Handtücher</li>
                        <li>Kofferablage</li>
                        <li>Schreibtisch</li>
                        <li>Safe</li>
                        <li>Kleiderschrank mit Kleiderbügeln</li>
                        <li>Badezimmer mit begehbarer Dusche und WC</li>
                    </ul>

                    <h3>Nützliche Informationen:</h3>
                    <ul>
                        <li>Check-in: zwischen 14:00 und 18:00 Uhr</li>
                        <li>Check-out: zwischen 09:00 und 10:00 Uhr</li>
                        <li><a href="/images/skin_v2/Jegverem_TV_channels.pdf" target="_blank" rel="noopener noreferrer">TV-Kanalliste (PDF)</a></li>
                        <li><a href="/images/skin_v2/DE_JV_A-Z.pdf" target="_blank" rel="noopener noreferrer">Weitere Dienstleistungen von A bis Z (PDF)</a></li>
                    </ul>
                </div>

                <div class="booking-cta booking-cta-bottom">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=de" target="_blank" rel="noopener noreferrer" title="Zimmer buchen">
                        <img src="/images/skin_v2/gomb_foglalas_de.png" alt="Zimmer buchen" />
                    </a>
                </div>

                <div class="panel-box panel-box-contact">
                    <p>Telefon: (+36) 99 510 113<br />
                    E-Mail: szallas@jegverem.hu</p>

                    <p>Buchen Sie direkt über unsere Website für die besten Preise! Wir freuen uns darauf, Sie in unserem Gasthof begrüßen zu dürfen!</p>
                </div>

            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'de';
                $order = array('menu', 'delivery');
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
