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
    <script src="../js/voov.slideshow.js" type="text/javascript"></script>
    <script src="../js/jegverem.js" type="text/javascript"></script>
	
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
<script defer async src='https://cdn.trustindex.io/loader.js?132e8ed65625479a84db43c2e'></script>
<div id="container">
    <?= $header ?>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>A Jégverem története</span></h2>

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

                <p>A hajdani városi jégverem létezéséről sokáig csak
                a szájhagyomány tudósított.<br />A városi számadáskönyvek szerint 1749-óta adott el a város jeget.
                Az egykori városi jégverem fölé később mészárszéket
                és tűzoltószertárt építettek. Az egyszerű ház 1837-ben porrá égett. Az épületet még ugyanabban az évben Hasenauer Márton tervei alapján újjáépítették.
                Magát a vermet a Szent Mihály domb oldalába vágták. Körte formájú belsejét szabályos kövekkel borították. Apró bejárata észak felé nézett. Belsejét
                náddal, szalmával bélelték és az év leghidegebb napjain töltötték fel a Fertő
                megtört jegével. Tetejét előbb fagerendákból ácsolt mennyezettel, később téglaboltozattal fedték.</p>

                <p>A műjéggyártás megindulása után jelentőségét vesztette, ajtaját befalazták.<br />
                A becses építészeti emléket az Országos Műemléki Felügyelőség védelem alá helyezte és a felette álló házzal egy időben a Győr-Sopron megyei Tanácsi
                Tervező Vállalat tervei alapján, a Győr megyei Állami Építőipari Vállalat munkájával,
                a Győr-Sopron megyei Állatforgalmi és Húsipari Vállalat állíttatta helyre 1987-ben.</p>

                <p>1999-óta Jégverem Fogadó - a <b>haspártiak vendéglője&reg;</b> néven működik
                az üzlet, ahonnan Ön garantáltan teli hassal távozik.</p>
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