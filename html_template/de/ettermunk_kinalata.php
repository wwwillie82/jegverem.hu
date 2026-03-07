<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<!-- written by Voov (www.voov.hu), copyright 2011 -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/html_template/shared/mobile_menu_css.php'; ?>
	<link href="/css/menu_mobile.css?v=20260305" rel="stylesheet" type="text/css" media="screen" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
	<script src="/js/menu-accordion.js" defer="defer"></script>
	
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-D729CRGYTY"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-D729CRGYTY');
	</script>
</head>
<body class="page-ettermunk-kinalata">

<!-- container -->
<div id="container">
    <?= $header ?>
<!-- <script defer async src='https://cdn.trustindex.io/loader.js?0b42a8965ce451e6142286174'></script>-->

    <div id="middle">
		<div class="tabs">
			<span><a href="/de/ettermunk_kinalata" class="on">Speisekarte</a></span>
			<span class="drinks-tab"><a href="/de/itallap">Getränke</a></span>
			<?php if($aktualis->length() > 0): ?>
			<span><a href="/de/aktualis_ajanlat">Aktuelle Angebot</a></span>
			<?php endif; ?>
		</div>
	
        <div class="main_full">
            <div class="content">
				<div class="desktop-menu">
					<h3><?= $products->cat_title ?></h3>
					
					<?php foreach($products as $product): ?>
					<div class="item">
						<div class="img">
							<?php if($product->pic_path != ""): ?>
							<img src="/<?= $this->ImageCache($product->pic_path)->Crop($product->pic_data)->ResizeImage(189,189) ?>" alt="<?= $product->name ?>" />
							<?php endif; ?>
						</div>
						
						<div class="txt">
							<h4><?= $product->name ?></h4>
							<p><?= $product->description ?></p>
							<div class="price"><?= $product->price ?>,- <?php if($product->price_small > 0): ?>/ <?= $product->price_small ?>,- <?php endif; ?></div>
						</div>
						<br class="clearfix" />
					</div>
					<?php endforeach; ?>
				</div>

				<div class="menu-accordion" data-menu-accordion="1">
					<?php foreach($categories as $cat): ?>
					<div class="menu-accordion__item <?php if($cat->id == $products->categories_id): ?>open<?php endif; ?>">
						<button type="button" class="menu-accordion__toggle" aria-expanded="<?php if($cat->id == $products->categories_id): ?>true<?php else: ?>false<?php endif; ?>"><?= $cat->title ?></button>
						<div class="menu-accordion__panel">
							<?php $items = isset($productsByCat[$cat->id]) ? $productsByCat[$cat->id] : array(); ?>
							<?php foreach($items as $menu_product): ?>
							<div class="menu-mitem">
								<div class="menu-mitem__row">
									<span class="menu-mitem__name"><?= $menu_product->name ?></span>
									<span class="menu-mitem__price"><?= $menu_product->price ?>,-<?php if($menu_product->price_small > 0): ?> / <?= $menu_product->price_small ?>,-<?php endif; ?></span>
								</div>
								<?php if($menu_product->pic_path != ""): ?>
								<div class="menu-mitem__img">
									<img src="/<?= $this->ImageCache($menu_product->pic_path)->Crop($menu_product->pic_data)->ResizeImage(640,640) ?>" alt="<?= $menu_product->name ?>" />
								</div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			
			<div class="bottom"></div>
        </div>

        <div class="sidebar_full">
			<div class="navigation">
				<?php foreach($categories as $cat): ?>
				<a href="<?= URI::MakeURL("de/ettermunk_kinalata", array("filter" => $cat->permalink), true) ?>" <?php if($cat->id == $products->categories_id): ?>class="on"<?php endif; ?>><?= $cat->title ?></a>
				<?php endforeach; ?>
			</div>
			<div class="fix"></div>
			
			<br class="clearfix" />
		</div>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>