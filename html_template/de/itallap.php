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
		<link href="/css/main.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
		<script src="/js/voov.slideshow.js" type="text/javascript"></script>
		<script src="/js/jegverem.js" type="text/javascript"></script>
	</head>
	<body>
		<!-- container -->
		<div id="container">
			<?php echo $header; ?>
<!--<script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script> -->
			<div id="middle">
				<div class="tabs">
					<span><a href="/de/ettermunk_kinalata">Speisekarte</a></span>
					<span><a href="/de/itallap" class="on">Getränke</a></span> 
					<? if($aktualis->length() > 0): ?> <span><a href="/de/aktualis_ajanlat">Aktuelle Angebote</a></span> <? endif; ?>
				</div>
				<div class="main_full">
					<div class="content">
						<h3><?php echo $products->cat_title; ?></h3> <? foreach($products as $product): ?>
						<div class="item">
							<div class="txt_full">
								<h4><?php echo $product->name; ?></h4>
								<p>
									<?php echo $product->description; ?>
								</p>
								<? if($product->price > 0): ?>
								<div class="price">
									<span><?php echo $product->attribute; ?></span> <?php echo $product->price; ?>,-
								</div>
								<? endif; ?>
							</div>
						</div>
						<? endforeach; ?>
					</div>
					<div class="bottom"></div>
				</div>
				<div class="sidebar_full">
					<div class="navigation">
						<? foreach($categories as $cat): ?> <a href="<?php echo URI::MakeURL("de/itallap", array("filter" => $cat->permalink), true); ?>" <? if($cat->id == $products->categories_id): ?>class="on"<? endif; ?>><?php echo $cat->title; ?></a> <? endforeach; ?>
					</div>
					<div class="fix"></div>
					<div class="item">
        <div class="img">
            <a href="/de/a_panziorol"><img src="/images/img_2.jpg" alt="" /></a>
        </div>

        <h3>Der Jégverem Kellner</h3>

        <div class="text">
			<p>Der Jégverem  Kellner  liefert  zu  Ihnen  nach Haus <span style="color: red; font-weight: bold;">von Montag bis Freitag zwischen 11.00-22.00 Uhr!</span></p>
			<p>Sie  können  zahlen  mit  Bargeld,  Essen  Bon,  SZÉP Karte, Kékfrank, Bankkarte.</p>
		</div>

        <a href="/de/kapcsolat" class="btn_tovabb">Weiter</a>
    </div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<?php echo $footer; ?>
		</div><!-- eof container -->
	</body>
</html>