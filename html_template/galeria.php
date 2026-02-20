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
	<link href="/css/main.css?v=210125" rel="stylesheet" type="text/css" media="screen" />

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
<script defer async src='https://cdn.trustindex.io/loader.js?132e8ed65625479a84db43c2e'></script>
<div id="container">
    <?php echo $header; ?>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Galéria</span></h2>

				<? foreach($albums as $album): ?>
                <div class="album <? if($albums->IsOdd()): ?>right<? endif; ?>">
                    <div class="img">
                        <a href="<?php echo URI::MakeURL("galeria/kepek", array("permalink" => $album->permalink), true); ?>"><img src="/<?php echo $this->ImageCache($album->pic_path)->Crop($album->pic_data)->ResizeImage(287,287); ?>" alt="<?php echo $album->title; ?>" /></a>
                    </div>

                    <h4><?php echo $album->title; ?></h4>
                </div>
				
				<? if($albums->IsOdd() && !$albums->IsLast()): ?>
				<br class="clearfix" />
                <div class="line"></div>
				<? endif; ?>
				
				<? endforeach; ?>

                <br class="clearfix" />
                <div class="line_big"></div>
            </div>
            <div class="bottom"></div>
        </div>

        <?php echo $sidebar; ?>
        <br class="clearfix" />
    </div>

	<?php echo $banner; ?>
    <?php echo $footer; ?>
</div>
<!-- eof container -->

</body>
</html>