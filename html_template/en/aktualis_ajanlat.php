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
<div id="container">
    <?php echo $header; ?>
<!-- <script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script> -->


    <div id="middle">
		<div class="tabs">
			<span><a href="/en/ettermunk_kinalata">Menu</a></span>
			<span><a href="/en/itallap">Drinks</a></span>
			<span><a href="/en/aktualis_ajanlat" class="on">Aktuális ajánlat</a></span>
			<span><a href="/en/elismereseink">Elismeréseink</a></span>
		</div>

        <div class="main_full">
            <div class="content">
				<h3><?php echo $products->cat_title; ?></h3>
				
				<? foreach($products as $product): ?>
				<div class="item">
					<div class="txt_full">
						<h4><?php echo $product->name; ?></h4>
						<p><?php echo $product->description; ?></p>
						<? if($product->price > 0): ?><div class="price"><span><?php echo $product->attribute; ?></span> <?php echo $product->price; ?>,-</div><? endif; ?>
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
                    <a href="/en/ettermunk_kinalata"><img src="../images/img_1.jpg" alt="" /></a>
                </div>

                <h3>Restaurant menu</h3>

                <div class="text">
                    <p>The fine gastronomy of the Jégverem Inn was recognised with a Grand Prix award. We are confident that you will also find delicious, filling meals on our menu. The prices for small portions are listed in the menu next to the full portion price.</p>
                </div>

                <a href="/en/ettermunk_kinalata" class="btn_tovabb">Details</a>
            </div>

            <div class="item">
                <div class="img">
                    <a href="/en/kapcsolat"><img src="../images/img_2.jpg" alt="" /></a>
                </div>

                <h3>Házhozszállítás</h3>

                <div class="text">
                    <p><span style="color: red; font-weight: bold;">From Monday to Friday</span> the "Jégverem Waiter" is going to your house <span style="color: red; font-weight: bold;">between 11.00-22.00!</span></p>
					<p>You can pay in: Cash, SZÉP card, Dining voucher, Kékfrank, Bank Card</p>
                </div>

                <a href="/en/kapcsolat" class="btn_tovabb">Details</a>
            </div>
			<br class="clearfix" />
		</div>
        <br class="clearfix" />
    </div>

    <?php echo $footer; ?>
</div>
<!-- eof container -->

</body>
</html>