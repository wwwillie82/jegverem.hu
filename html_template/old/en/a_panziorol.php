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

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>About the Inn</span></h2>

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

                <p>The Jégverem Inn is housed in a 250-year old, wood-beam building, with 2- and 4-bed rooms with all modern amenities, including TV and in-suite bathroom. The Inn is an ideal starting point for exploring the city of Sopron, as it is located right next to the historical city centre, in the old “Poncichter” district. The Ferenc Liszt Conference Centre and other downtown locations are just 10 minutes away on foot. We welcome our guests with comfortable, renovated rooms and the most competitive prices in the category!</p>

				<object type ="application/x-shockwave-flash" data="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" width="100%" height="100%">
				<param name ="movie" value ="http://www.forogj.hu/panorama/jegverem_fogado_sopron/1.swf" />
				<param name ="quality" value ="high" />
				<param name ="bgcolor" value ="#AAAAAA" />
				</object>
				<br /><br />
				
                <h3>Room Prices</h3>

                <ul>
                    <li>Single Room: 7 400.-Ft/Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Double room: 9 800.-Ft/ Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Family room (with 4 Beds): 14 200.-Ft/ Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Extra bed: 2 000.-Ft/Person/Night+Tax 450.-Ft/Person/Night</li>
					<li>Dog: 2 500.-Ft/Night</li>
                </ul>

                <h3>National days, Long weekends (During Volt Festival we have different prices!)</h3>

                <ul>
                    <li>Single Room: 7 900.-Ft/ Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Double room: 11 900.-Ft/ Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Family room (with 4 Beds): 16 300.-Ft/ Room/Night +Tax 450.-Ft/Person/Night</li>
					<li>Extra bed: 2 000.-Ft/ Person/Night+Tax 450.-Ft/Person/Night</li>
					<li>Dog: 2 500.-Ft/Night</li>
                </ul>
				
				<p class="bold">These prices valid from 03.2013.</p>

                <p class="bold">For families! No accommodation charge for children under 6 when they stay in their parents’ room at the Inn.</p>
				<p>The above prices are for information purposes only; please contact us by telephone or e-mail for our current offers and for prices for peak seasons.</p>
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