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
	<link href="../css/main.css?v=210125" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="../css/skin_home_v2.css" type="text/css" media="screen" />
	
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
<body class="home-v2">


<!-- container -->



<div id="container">
    <?php echo $header; ?>
<script defer async src='https://cdn.trustindex.io/loader.js?132e8ed65625479a84db43c2e'></script>
    <div id="middle">
        <div class="box_two">
            <div class="covers">
				<?php  $i=1; foreach($covers as $cover): ?>
				<?php  $url = $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(631,631); ?>
                <div class="item SlideShow" style="background-image: url(http://<?= $_SERVER["HTTP_HOST"] ?>/<?= $url ?>);">
                    <div class="navigation">
                        <h2><?php echo nl2br($cover->description); ?></h2>

                        <div class="num"><span><?php echo $i; ?></span>/<?php echo $covers->length(); ?></div>

                        <a href="" class="prev SlideShowControlPrev">Előző</a>
                        <a href="" class="next SlideShowControlNext">Következő</a>
                    </div>
                </div>
				<?php  $i++; endforeach; ?>
            </div>

            <div class="offers">
				<div class="head">
					<span><a href="#" class="on">Heti menü</a></span>
					<span><a href="/ettermunk_kinalata">Étlap</a></span>
					<span><a href="/itallap">Itallap</a></span>
					<?php  if($category->length() > 0): ?>
					<span><a href="/aktualis_ajanlat" class="no">Aktuális ajánlat</a></span>
					<?php  endif; ?>
				</div>
			
				<div class="holder" id="block_1">
					<div id="scrollbar1">
						<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
						<div class="viewport">
							 <div class="overview">
								<?php  if($menus->length() > 0): ?>
									<h3 style="line-height: 22px;">Ezen a héten (<?= $menus->week ?>. hét)<br /> Csomagolás: 250 Ft/menü </h3>

									<?php 
									$days = array("Extra menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
									foreach($menus as $menu):
									?>
									<h5><span><?php echo $days[$menu->day]; ?></span></h5>
									<div class="food">
										<?php echo nl2br($menu->offer_text); ?>
									</div>
									<?php  endforeach; ?>
								<?php  endif; ?>

								<?php  if($next_menus->length() > 0): ?>
									<h3 style="line-height: 22px;">Következő a héten (<?= $next_menus->week ?>. hét)</h3>

									<?php 
									$days = array("Extra menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat");
									foreach($next_menus as $menu):
									?>
									<h5><span><?php echo $days[$menu->day]; ?></span></h5>
									<div class="food">
										<?php echo nl2br($menu->offer_text); ?>
									</div>
									<?php  endforeach; ?>
								<?php  endif; ?>
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
                    <a href="/kapcsolat"><img src="../images/img_2.jpg" alt="" /></a>
                </div>

                <h3>Házhozszállítás</h3>

                <div class="text">
                    <p><span style="color: red; font-weight: bold;">Minden hétköznap, a nyitvatartási időn belül<br />(11.00-22.00)</span> a Jégverem pincér házhoz megy!</p>
					<p><b>Fizetési lehetőségek kiszállítás esetén:</b><br />
					Készpénz, SZÉP Kártya, Étkezési utalvány, Kékfrank, Bankkártya</p>
                </div>

                <a href="/kapcsolat" class="btn_tovabb">Tovább</a>
            </div>

            <div class="item no">
                <div class="img">
                    <a href="/a_panziorol"><img src="../images/img_3.jpg" alt="" /></a>
                </div>

                <h3>A panzióról</h3>

                <div class="text">
                    <p>A 250 esztendős, fagerendázatú fogadóban összkomfortos, TV-vel, fürdővel felszerelt 2 és 4 ágyas szobák, 
					várják a pihenni vágyókat. A panzió ideális kiindulópont Sopron felfedezéséhez, hiszen a történelmi belváros 
					közvetlen szomszédságában, a régi poncichter-negyedben található.</p>
                </div>

                <a href="/a_panziorol" class="btn_tovabb">Tovább</a>
            </div>
            <br class="clearfix" />
        </div>
    </div>
	
	<?php echo $banner; ?>
    <?php echo $footer; ?>
</div>
<!-- eof container -->

</body>
</html>
