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
<script defer async src='https://cdn.trustindex.io/loader.js?132e8ed65625479a84db43c2e'></script>
<div id="container">
    <?= $header ?>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h1>Szállás</h1>

                <div class="panel-box">
                    <p><strong>Szállás a Jégverem Fogadóban</strong><br />
                    A hajdani városi jégverem épülete fogadóként született újjá, megtartva a fagerendázatú építmény hagyományos vonásait. Belső terei és kerthelyisége különleges atmoszférát teremtenek, miközben az étterem közepén a mai napig megtekinthető a régi jégverem. A panzióban 6 autentikus stílusú, modern felszereltséggel ellátott szoba várja a vendégeket. Ez a szálláshely ideális kiindulópont Sopron felfedezéséhez, hiszen a történelmi belváros közvetlen szomszédságában, a régi poncichter-negyedben található.</p>
                </div>

                <div class="booking-cta">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=hu" target="_blank" rel="noopener noreferrer" title="Szobafoglalás">
                        <img src="/images/skin_v2/gomb_foglalas_hu.png" alt="Szobafoglalás" />
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
                    <p>Fogadónk négy különböző kialakítású szobával várja vendégeit: egy galériás franciaágyas, egy galériás négyágyas, valamint egy franciaágyas és egy négyágyas szobával.</p>
                    <p>Éttermünk gazdag kínálata ebédre és vacsorára egyaránt bőséges választékot kínál. Szállóvendégeink számára az ételfogyasztás árából 10% kedvezményt biztosítunk.</p>

                    <h3>A szobák felszereltsége:</h3>
                    <ul>
                        <li>légkondicionáló</li>
                        <li>síkképernyős TV</li>
                        <li>WIFI</li>
                        <li>franciaágy (2 fixen összetolt 90x200cm-es ágy)</li>
                        <li>törölköző</li>
                        <li>bőröndtartó</li>
                        <li>íróasztal</li>
                        <li>széf</li>
                        <li>ruhásszekrény, vállfával</li>
                        <li>épített zuhanyzós fürdőszoba, WC-vel</li>
                    </ul>

                    <h3>Hasznos információk:</h3>
                    <ul>
                        <li>Bejelentkezés: 14:00 és 18:00 között</li>
                        <li>Kijelentkezés: 9:00 és 10:00 között</li>
                        <li><a href="/images/skin_v2/Jegverem_TV_csatornak.pdf" target="_blank" rel="noopener noreferrer">TV csatornakiosztás (PDF)</a></li>
                        <li><a href="/images/skin_v2/HU_JV_A-Z.pdf" target="_blank" rel="noopener noreferrer">További szolgáltatásaink A-Z-ig (PDF)</a></li>
                    </ul>
                </div>

                <div class="booking-cta booking-cta-bottom">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=hu" target="_blank" rel="noopener noreferrer" title="Szobafoglalás">
                        <img src="/images/skin_v2/gomb_foglalas_hu.png" alt="Szobafoglalás" />
                    </a>
                </div>

                <div class="panel-box panel-box-contact">
                    <p>Telefon: (+36) 99 510 113<br />
                    E-mail: szallas@jegverem.hu</p>

                    <p>Foglaljon közvetlenül weboldalunkon a legkedvezőbb árakért!<br />
                    Várjuk szeretettel fogadónkban!</p>
                </div>

            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'hu';
                $order = array('menu', 'delivery');
                include $_SERVER['DOCUMENT_ROOT'] . '/modules/sidebar/html_template/home_mini_cards.php';
            ?>
        </div>
        <br class="clearfix" />
    </div>

	<?= $banner ?>
    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>
