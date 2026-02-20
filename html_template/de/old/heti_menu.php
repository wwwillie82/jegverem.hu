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
    <?php echo $header; ?>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2 class="nobg"><span>Wochenmenü</span></h2>
				<div class="icon_price"></div>

				<? if($menus->length() > 0): ?>
					<h3>Ezen a héten (<?php echo $menus->week; ?>. hét)</h3>

					<? 
					$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
					foreach($menus as $menu):
					?>
					<h5><span><?php echo $days[$menu->day]; ?></span></h5>
					<div class="food">
						<?php echo nl2br($menu->offer_text); ?>
					</div>
					<? endforeach; ?>
				<? endif; ?>

				<? if($next_menus->length() > 0): ?>
					<h3>Következő héten (<?php echo $next_menus->week; ?>. hét)</h3>

					<? 
					$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
					foreach($next_menus as $menu):
					?>
					<h5><span><?php echo $days[$menu->day]; ?></span></h5>
					<div class="food">
						<?php echo nl2br($menu->offer_text); ?>
					</div>
					<? endforeach; ?>
				<? endif; ?>

            </div>
            <div class="bottom"></div>
        </div>

        <?php echo $sidebar; ?>
        <br class="clearfix" />
    </div>

    <?php echo $footer; ?>
</div>
<!-- eof container -->

</body>
</html>