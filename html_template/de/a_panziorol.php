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
	<link href="../css/main.css" rel="stylesheet" type="text/css" media="screen" />

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
<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Über die Pension</span></h2>

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

                <p>Im 250 Jahre alte Holz-Fachwerk Gasthaus, erwarten wir unsere Lieben Gäste mit TV, Bad, 2 und 4 Betten geschmackvoll eingerichtete Komfortzimmer. Die Pension liegt im poncicher-Viertel in unmittelbare Nähe zur historischen Innenstadt und hat daher eine Ideale Lage als Ausgangspunkt für Stadtbesichtigungen.
				Das Liszt Ferenc Konferenz- und Kulturzentrum und andere Einrichtungen der Innenstadt sind innerhalb 10 Minuten zu Fuß zu erreichen. Wir erwarten Sie mit renovierten Zimmern und der Kategorie entsprechenden, besten Preise.</p>

				<object type ="application/x-shockwave-flash" data="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" width="100%" height="100%">
				<param name ="movie" value ="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" />
				<param name ="quality" value ="high" />
				<param name ="bgcolor" value ="#AAAAAA" />
				</object>
				<br /><br />
				
				<h3>Unsere Dienstleistungen</h3>
				
                <ul>
                    <li>Decken auf Anfrage erhältlich</li>
					<li>Fernseher</li>
					<li>Gepäckaufbewahrung</li>
					<li>Haartrockner auf Anfrage erhältlich</li>
					<li>Halbpension</li>
					<li>Handy ist auf Anfrage verfügbar</li>
					<li>Herstellung des Kinder- oder Gästebetts</li>
					<li>Herstellung im Badezimmer (Schaumbad oder Duschgel)</li>
					<li>Hochgeschwindige Wi-Fi Anlage</li>
					<li>Kissen auf Anfrage erhältlich</li>
					<li>Klimaanlage</li>
					<li>Radio</li>
					<li>Rezeption Dienst</li>
					<li>Terrasse</li>
					<li>Tierfreundliche Pension (Wir willkommen gegen Sonderzahlung auch die Haustiere)</li>
					<li>Zahlungsmittel: Kreditkarte, Bargeld, SZÉP Karte (OTP, K&H und MKB Karte)</li>
					<li>Zentraler Safe an der Rezeption</li>
					<li>
        				<a href="/images/Jegverem_TV_channels.pdf" target="_blank">Fernsehkanäle >></a>
    				</li>
					<li>
        				<a href="/images/DE_JV_A-Z.pdf" target="_blank">Unsere zusätzlichen Dienstleistungen von A bis Z >></a>
    				</li>
                </ul>
				
				
				<ul>
                    <li>Rufnummer für Zimmer Buchung: (+36) 99/510-113</li>
                    <li>e-mail: szallas@jegverem.hu</li>
                </ul>
				
                <h3>Zimmerpreise</h3>

                
					<p class="bold">Über Zimmerpreise sehen Sie die "Online Buchung"!<p>
				<p>Die Preise beinhalten nicht die Kurtaxe: 800 HUF/Person/Nacht.</p>

                
                <p class="bold">Familien aufgepasst! Für Kinder unter 6 Jahren berechnen wir keine Kosten für die Übernachtung, wenn sie mit ihren Eltern in der Pension übernachten.</p>
				
            </div>
            <div class="bottom"></div>
        </div>

        <?= $sidebar ?>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>