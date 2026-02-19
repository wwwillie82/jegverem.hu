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
		<div class="tabs">
			<span><a href="/ettermunk_kinalata">Étlap</a></span>
			<span><a href="/itallap">Itallap</a></span>
			<span><a href="/aktualis_ajanlat" class="on">Aktuális ajánlat</a></span>
			<span><a href="/elismereseink">Elismeréseink</a></span>
		</div>

        <div class="main_full">
            <div class="content">
				<h3><?= $products->cat_title ?></h3>
				
				<? foreach($products as $product): ?>
				<div class="item">
					<div class="txt_full">
						<h4><?= $product->name ?></h4>
						<p><?= $product->description ?></p>
						<? if($product->price > 0): ?><div class="price"><span><?= $product->attribute ?></span> <?= $product->price ?>,-</div><? endif; ?>
					</div>
				</div>
				<? endforeach; ?>
			</div>

			<div class="bottom"></div>
        </div>

        <div class="sidebar_full">
			<div class="navigation">
				<a href="#" class="on">Aktuális ajánlat</a>
			</div>
			<div class="fix"></div>

            <div class="item">
                <div class="img">
                    <a href="/ettermunk_kinalata"><img src="../images/img_1.jpg" alt="" /></a>
                </div>

                <h3>Éttermünk kínálata</h3>

                <div class="text">
                    <p>A fogadó gasztronómiai tevékenységét védnöki táblával is elismerték. Bízunk benne, hogy 
					Ön is kedvére való ételeket talál kínálatunkban. Az étlapon szereplő ételek ára mellett található 
					árak a kis adag ételek árait jelentik.</p>
                </div>

                <a href="/ettermunk_kinalata" class="btn_tovabb">Tovább</a>
            </div>

			<div class="item">
				<div class="img">
					<a href="/a_panziorol"><img src="../images/img_2.jpg" alt="" /></a>
				</div>

				<h3>Házhozszállítás</h3>

				<div class="text">
                    <p><span style="color: red; font-weight: bold;">Hétfőtől-Péntekig, a nyitvatartási időn belül<br />(11.00-22.00)</span> a Jégverem pincér házhoz megy!</p>
					<p><b>Fizetési lehetőségek kiszállítás esetén:</b><br />
					Készpénz, SZÉP Kártya, Étkezési utalvány, Kékfrank, Bankkártya</p>
                </div>

				<a href="/a_panziorol" class="btn_tovabb">Tovább</a>
			</div>
			<br class="clearfix" />
		</div>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>