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
	<link href="../css/main.css" rel="stylesheet" type="text/css" media="screen" />
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="/js/jquery.tinyscrollbar.min.js"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#scrollbar1').tinyscrollbar();
		});

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

    <div id="middle">
        <div class="box_two">
            <div class="covers">
				<? $i=1; foreach($covers as $cover): ?>
				<? $url = $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(631,631); ?>
                <div class="item SlideShow" style="background-image: url(http://<?= $_SERVER["HTTP_HOST"] ?>/<?= $url ?>);">
                    <div class="navigation">
                        <h2><?= nl2br($cover->description) ?></h2>

                        <div class="num"><span><?= $i ?></span>/<?= $covers->length() ?></div>

                        <a href="" class="prev SlideShowControlPrev">Előző</a>
                        <a href="" class="next SlideShowControlNext">Következő</a>
                    </div>
                </div>
				<? $i++; endforeach; ?>
            </div>

            <div class="offers">
				<div class="head">
					<span><a href="#" class="on">Wochenmenü</a></span>
					<span><a href="/de/ettermunk_kinalata">Speisekarte</a></span>
					<span><a href="/de/itallap">Getränke</a></span>
					<!--<? if($category->length() > 0): ?>
					<span><a href="/de/aktualis_ajanlat" class="no">Aktuelle Angebote</a></span>
					<? endif; ?>-->
				</div>
			
				<div class="holder" id="block_1">
					<div id="scrollbar1">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
							 <div class="overview">
								<? if($menus->length() > 0): ?>
									<h3 style="line-height: 22px;">Diese Woche (<?= $menus->week ?>. Woche)<br />Wochenmenü preis: 990 HUF / 1.290 HUF<br />Verpackung: 100 HUF/Stück </h3>

									<? 
									$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
									foreach($menus as $menu):
									?>
									<h5><span><?= $days[$menu->day] ?></span></h5>
									<div class="food">
										<?= nl2br($menu->offer_text) ?>
									</div>
									<? endforeach; ?>
								<? endif; ?>

								<? if($next_menus->length() > 0): ?>
									<h3 style="line-height: 22px;">Nachste Woche (<?= $next_menus->week ?>. Woche)<br />Wochenmenü preis: 990 HUF / 1.290 HUF</h3>

									<? 
									$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
									foreach($next_menus as $menu):
									?>
									<h5><span><?= $days[$menu->day] ?></span></h5>
									<div class="food">
										<?= nl2br($menu->offer_text) ?>
									</div>
									<? endforeach; ?>
								<? endif; ?>
							</div>
						</div>
					</div>
				</div>
            </div>
            <br class="clearfix" />
        </div>

        <div class="box_three">
            <div class="item">
                <div class="img">
                    <a href="/de/ettermunk_kinalata"><img src="../images/img_1.jpg" alt="" /></a>
                </div>

                <h3>Angebote unseres Restaurants</h3>

                <div class="text">
                    <p>Wir hoffen, dass Sie in der zertifizierten Gastronomie unserer Pension Ihnen entsprechende Speisen aus unserem Angebot finde. Der zweite Preis neben den Speisen in der Speisekarte ist der Preis für kleinere Portionen. </p>
                </div>

                <a href="/de/ettermunk_kinalata" class="btn_tovabb">Weiter</a>
            </div>

            <div class="item">
                <div class="img">
                    <a href="/de/kapcsolat"><img src="../images/img_2.jpg" alt="" /></a>
                </div>

                <h3>Der Jégverem Kellner</h3>

                <div class="text">
                    <p>Der Jégverem  Kellner  liefert  zu  Ihnen  nach Haus <span style="color: red; font-weight: bold;">Jeden Tag zwischen 11.00-22.00 Uhr!</span></p>
					<p>Sie  können  zahlen  mit  Bargeld,  Essen  Bon,  SZÉP Karte, Kékfrank, Bankkarte.</p>
                </div>

                <a href="/de/kapcsolat" class="btn_tovabb">Weiter</a>
            </div>

            <div class="item no">
                <div class="img">
                    <a href="/de/a_panziorol"><img src="../images/img_3.jpg" alt="" /></a>
                </div>

                <h3>Über die Pension</h3>

                <div class="text">
                    <p>Im 250 Jahre alte Holz-Fachwerk Gasthaus, erwarten wir unsere Lieben Gäste mit TV, Bad, 2 und 4 Betten geschmackvoll eingerichtete Komfortzimmer. Die Pension liegt im poncicher-Viertel in unmittelbare Nähe zur historischen Innenstadt und hat daher eine Ideale Lage als Ausgangspunkt für Stadtbesichtigungen.</p>
                </div>

                <a href="/de/a_panziorol" class="btn_tovabb">Weiter</a>
            </div>
            <br class="clearfix" />
        </div>
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>