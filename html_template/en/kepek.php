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
	<link href="/css/main.css" rel="stylesheet" type="text/css" media="screen" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
	
	<link href="/css/prettyPhoto.css" rel="stylesheet" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
	
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
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>


    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Gallery</span></h2>

                <h3><?= $album ?></h3>

                <div class="images">
					<? foreach($images as $img): ?>
                    <div class="item <? if($images->IsNth(4)): ?>no<? endif; ?>">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" valign="middle">
                                    <a href="/<?= $img->pic_path ?>" rel="prettyPhoto"><img src="/<?= $this->ImageCache($img->pic_path)->Crop($img->pic_data)->ResizeImage(135,135) ?>" alt="" /></a>
                                </td>
                            </tr>
                        </table>
                    </div>
					
					<? if($images->IsNth(4) && !$images->IsLast()): ?>
					<br class="clearfix" />
                    <div class="line"></div>
					<? endif; ?>
					
					<? endforeach; ?>

                    <br class="clearfix" />
                </div>
            </div>
            <div class="bottom"></div>
        </div>

        <?= $sidebar ?>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({allow_resize: true, default_width: 600,default_height: 600});
	});
</script>

</body>
</html>