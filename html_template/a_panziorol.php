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
	<link href="/css/main.css?v=20260220" rel="stylesheet" type="text/css" media="screen" />

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
<body>


<!-- container -->
<script defer async src='https://cdn.trustindex.io/loader.js?132e8ed65625479a84db43c2e'></script>
<div id="container">
    <?= $header ?>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>A panzióról</span></h2>

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

                <p>A 250 esztendős, fagerendázatú fogadóban összkomfortos, TV-vel, fürdővel felszerelt 2 és 4 ágyas szobák, várják a pihenni vágyókat. A panzió ideális kiindulópont Sopron felfedezéséhez, hiszen a történelmi belváros közvetlen szomszédságában, a régi poncichter-negyedben található. A Liszt Ferenc Konferenciaközpont és más belvárosi intézmények gyalogosan 10 perc alatt elérhetők. Felújított szobákkal, a kategóriában a legkedvezőbb árakkal várjuk! Panziónkban ingyenes Wi-fi elérhetőség áll vendégeink rendelkezésére.</p>

				<object type ="application/x-shockwave-flash" data="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" width="100%" height="100%">
				<param name ="movie" value ="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" />
				<param name ="quality" value ="high" />
				<param name ="bgcolor" value ="#AAAAAA" />
				</object>
				<br /><br />
				
				<h3>Szolgáltatásaink</h3>
				
				<p>Panziónk az alábbi alapszolgáltatásokkal áll vendégeink rendelkezésére</p>
                <ul>
                    <li>Állatbarát panzió (felár ellenében szívesen látjuk házikedvencét)</li>
					<li>Babaágy- vagy pótágy bekészítés</li>
					<li>Csomag- és értékmegőrzés</li>
					<li>Fizetőeszköz: bankkártya, készpénz, SZÉP kártya (OTP, MKB, és K&H SZÉP)</li>
					<li>Fürdőszobai bekészítés (habfürdő vagy tusfürdő gél)</li>
					<li>Hajszárító</li>
					<li>Igényelhető hajszárító</li>
					<li>Igényelhető tartalékpárna</li>
					<li>Kérésre plusz takaró</li>
					<li>Központi széf a recepción</li>
					<li>Légkondicionálás</li>
					<li>Rádió</li>
					<li>Recepció szolgálat</li>
					<li>Szélessávú internet-hozzáférés</li>
					<li>Szobához igényelhető (mobil) telefon</li>
					<li>Televízió</li>
					<li>Terasz</li>
					<li>
        				<a href="/images/Jegverem_TV_channels.pdf" target="_blank">TV csatornakiosztás >></a>
    				</li>
					<li>
        				<a href="/images/HU_JV_A-Z.pdf" target="_blank">További szolgáltatásaink A-Z-ig >></a>
    				</li>
                </ul>
				
                <h3>Sí-szezon</h3>

                <p>A szomszédos Ausztria kitűnő sípályái, (pl. Semmering) autóval egy-másfél óra alatt elérhetőek Sopronból, így panziónk kiváló szálláshely a síelni vágyók számára is.</p>

                <p>Panziónk dolgozói örömmel állnak rendelkezésére. Vegye igénybe szolgáltatásainkat!</p>
                <ul>
                    <li>Szállásfoglalás telefonon: (+36) 99/510-113</li>
                    <li>E-mailben: szallas@jegverem.hu</li>
                </ul>

                <h3>Szobaáraink</h3>

				<p><b>Árainkról a "Szobafoglalás" menüpont alatt tájékozódhat!</b></p>
				
				<p>Az árak nem tartalmazzák az idegenforgalmi adó mértékét. IFA: 800Ft/fő/éj</p>

                <p>Családok figyelmébe! Hat éves korukig a gyerekeknek nem számítunk fel szállásdíjat, amennyiben a szülőkkel <b>egy szobában</b> szállnak meg panziónkban!</p>
            </div>
            <div class="bottom"></div>
        </div>

        <?= $sidebar ?>
        <br class="clearfix" />
    </div>

	<?= $banner ?>
    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>