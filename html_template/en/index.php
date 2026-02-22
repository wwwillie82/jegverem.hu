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
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>


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
					<span><a href="/en/heti_menu" class="on">Weekly menu</a></span>
					<span><a href="/en/ettermunk_kinalata">Menu</a></span>
					<span><a href="/en/itallap">Drinks</a></span>
					<!--<? if($category->length() > 0): ?>
					<span><a href="/en/aktualis_ajanlat" class="no">Aktuális ajánlat</a></span>
					<? endif; ?>-->
				</div>
			
				<div class="holder" id="block_1">
					<div id="scrollbar1">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
							 <div class="overview">
								<? if($menus->length() > 0): ?>
									<h3 style="line-height: 22px;">This week (<?= $menus->week ?>. week) <br />Packing: 250 HUF/food</h3>

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
									<h3 style="line-height: 22px;">Next week (<?= $next_menus->week ?>. week) </h3>

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
                    <a href="/en/ettermunk_kinalata"><img src="/images/skin_v2/jegverem_fogado_sopron_ettermunk_kinalata.png" alt="Our Restaurant’s Menu" /></a>
                </div>

                <div class="home-card-mini-body">
                    <h3 class="home-card-mini-title">Our Restaurant’s Menu</h3>

                    <p class="home-card-mini-text">Our menu draws inspiration from traditional Hungarian flavors, complemented by creatively reimagined classics and exciting dishes from international cuisine. Our selection is built on quality ingredients and a harmonious taste experience.</p>

                    <a href="/en/ettermunk_kinalata" class="home-card-mini-btn">VIEW OUR MENU >></a>
                </div>
            </div>

            <div class="item home-card-mini home-card-delivery-mini">
                <div class="home-card-mini-media">
                    <a href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer"><img src="/images/skin_v2/jegverem_fogado_sopron_kiszallitas_web.png" alt="Delivery" /></a>
                </div>

                <div class="home-card-mini-body">
                    <h3 class="home-card-mini-title">Delivery</h3>

                    <p class="home-card-mini-text">Every weekday between 11:00 AM and 9:00 PM, the Jégverem waiter delivers right to your door!</p>

                    <a class="home-card-mini-btn" href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer">Online Ordering</a>
                </div>
            </div>

            <div class="item home-card-mini home-card-accommodation-mini">
                <div class="home-card-mini-media">
                    <a href="/en/a_panziorol"><img src="/images/skin_v2/jegverem_fogado_sopron_panzio_szallas.png" alt="Accommodation" /></a>
                </div>

                <div class="home-card-mini-body">
                    <h3 class="home-card-mini-title"><a href="/en/a_panziorol">Accommodation</a></h3>

                    <p class="home-card-mini-text">The guesthouse offers 6 authentic-style rooms equipped with modern amenities. This accommodation is an ideal starting point for exploring Sopron, as it is located in the immediate vicinity of the historic Old Town, in the heart of the old Poncichter district.</p>

                    <a href="/en/a_panziorol" class="home-card-mini-btn">About the guesthouse >></a>
                </div>
            </div>
            <br class="clearfix" />
        </div>
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>
