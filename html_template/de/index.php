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
<script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>

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
									<h3 style="line-height: 22px;">Diese Woche (<?= $menus->week ?>. Woche)<br />Verpackung: 250 HUF/Stück </h3>

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
									<h3 style="line-height: 22px;">Nachste Woche (<?= $next_menus->week ?>. Woche)</h3>

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
						</div>
					</div>
				</div>
            </div>
            <br class="clearfix" />
        </div>

        <div class="box_three">
            <div class="item home-card-mini home-card-menu-mini">
                <div class="home-card-mini-media">
                    <a href="/de/ettermunk_kinalata"><img src="/images/skin_v2/jegverem_fogado_sopron_ettermunk_kinalata.png" alt="Das Angebot unseres Restaurants" /></a>
                </div>

                <div class="home-card-mini-body">
                    <h3 class="home-card-mini-title">Das Angebot unseres Restaurants</h3>

                    <p class="home-card-mini-text">Unsere Speisekarte lässt sich von traditionellen ungarischen Aromen inspirieren, die durch kreativ neu interpretierte Klassiker und spannende Gerichte der internationalen Kochkunst ergänzt werden. Unser Angebot basiert auf hochwertigen Zutaten und einem harmonischen Geschmackserlebnis.</p>

                    <a href="/de/ettermunk_kinalata" class="home-card-mini-btn">ZUR SPEISEKARTE >></a>
                </div>
            </div>

            <div class="item home-card-mini home-card-delivery-mini">
                <div class="home-card-mini-media">
                    <a href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer"><img src="/images/skin_v2/jegverem_fogado_sopron_kiszallitas_web.png" alt="Lieferung" /></a>
                </div>

                <div class="home-card-mini-body">
                    <h3 class="home-card-mini-title">Lieferung</h3>

                    <p class="home-card-mini-text">An jedem Wochentag von 11:00 bis 21:00 Uhr kommt der Jégverem-Kellner direkt zu Ihnen nach Hause!</p>

                    <a class="home-card-mini-btn" href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer">Online Bestellung</a>
                </div>
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