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
					<span><a href="#" class="on">Weekly menu</a></span>
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
									<h3 style="line-height: 22px;">This week (<?= $menus->week ?>. week)<br />Weekly menu price: 990 HUF / 1290 HUF</h3>

									<? 
									$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
									foreach($menus as $menu):
									?>
									<h5><span><?= $days[$menu->day] ?></span></h5>
									<div class="food">
										<?= nl2br($menu->offer_text) ?>
									</div>
									<? endforeach; ?>
								<? endif; ?>

								<? if($next_menus->length() > 0): ?>
									<h3 style="line-height: 22px;">Next week (<?= $next_menus->week ?>. week)<br />Weekly menu price: 990 HUF / 1290 HUF</h3>

									<? 
									$days = array("Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
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

                <h3>Delivery</h3>

                <div class="text">
                    <p><span style="color: red; font-weight: bold;">From Monday to Friday</span> the "Jégverem Waiter" is going to your house <span style="color: red; font-weight: bold;">between 11.00-22.00!</span></p>
					<p>You can pay in: Cash, SZÉP card, Dining voucher, Kékfrank, Bank Card</p>
                </div>

                <a href="/en/kapcsolat" class="btn_tovabb">Details</a>
            </div>

            <div class="item no">
                <div class="img">
                    <a href="/en/a_panziorol"><img src="../images/img_3.jpg" alt="" /></a>
                </div>

                <h3>About the Inn</h3>

                <div class="text">
                    <p>The Jégverem Inn is housed in a 250-year old, wood-beam building, with 2- and 4-bed rooms with all modern amenities, including TV and in-suite bathroom. The Inn is an ideal starting point for exploring the city of Sopron, as it is located right next to the historical city centre, in the old “Poncichter” quarter.</p>
                </div>

                <a href="/en/a_panziorol" class="btn_tovabb">Details</a>
            </div>
            <br class="clearfix" />
        </div>
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>