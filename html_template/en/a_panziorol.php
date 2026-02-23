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
<? $__pageBodyClass = "page-a_panziorol"; if (isset($body_class) && trim($body_class) != "") { $__pageBodyClass = trim($body_class . " " . $__pageBodyClass); } ?>
<body class="<?= $__pageBodyClass ?>">

<!-- container -->
<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>


    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h1>Accommodation</h1>

                <div class="panel-box">
                    <p><strong>Accommodation at the Jégverem Inn</strong><br />
                    The building of the former municipal ice cellar has been reborn as an inn, preserving the traditional features of its timber-framed structure. Its interior spaces and garden area create a unique atmosphere, while the old ice cellar itself can still be viewed today in the center of the restaurant. The guesthouse offers 6 authentic-style rooms equipped with modern amenities. This accommodation is an ideal starting point for exploring Sopron, as it is located in the immediate vicinity of the historic Old Town, in the heart of the old Poncichter district.</p>
                </div>

                <div class="booking-cta">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=en" target="_blank" rel="noopener noreferrer" title="Book a room">
                        <img src="/images/skin_v2/gomb_foglalas_en.png" alt="Book a room" />
                    </a>
                </div>

                <div class="covers">
                    <? $i=1; foreach($covers as $cover): ?>
                    <? $url = $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(631,631); ?>
                    <div class="item SlideShow" style="background-image: url(http://<?= $_SERVER["HTTP_HOST"] ?>/<?= $url ?>);">
                        <div class="navigation">
                            <h4><?= nl2br($cover->description) ?></h4>

                            <div class="num"><span><?= $i ?></span>/<?= $covers->length() ?></div>

                            <a href="" class="prev SlideShowControlPrev">Előző</a>
                            <a href="" class="next SlideShowControlNext">Következő</a>
                        </div>
                    </div>
                    <? $i++; endforeach; ?>
                </div>

                <div class="panel-box">
                    <p>Our inn welcomes guests with four uniquely designed rooms: a double room with a gallery, a four-bedroom with a gallery, as well as a standard double room and a standard four-bedroom.</p>
                    <p>Our restaurant offers a rich selection for both lunch and dinner. We provide a 10% discount on food consumption for our overnight guests.</p>

                    <h3>Room Amenities:</h3>
                    <ul>
                        <li>Air conditioning</li>
                        <li>Flat-screen TV</li>
                        <li>Wi-Fi</li>
                        <li>Double bed (2 fixed beds pushed together, 90x200 cm each)</li>
                        <li>Towels</li>
                        <li>Luggage rack</li>
                        <li>Desk</li>
                        <li>Safe</li>
                        <li>Wardrobe with hangers</li>
                        <li>Bathroom with walk-in shower and toilet</li>
                    </ul>

                    <h3>Useful Information:</h3>
                    <ul>
                        <li>Check-in: between 2:00 PM and 6:00 PM</li>
                        <li>Check-out: between 9:00 AM and 10:00 AM</li>
                        <li><a href="/images/skin_v2/Jegverem_TV_channels.pdf" target="_blank" rel="noopener noreferrer">TV channel list (PDF)</a></li>
                        <li><a href="/images/skin_v2/EN_JV_A-Z.pdf" target="_blank" rel="noopener noreferrer">Additional services from A to Z (PDF)</a></li>
                    </ul>
                </div>

                <div class="booking-cta booking-cta-bottom">
                    <a href="https://nethotelbooking.net/hotels/jegverem/lang=en" target="_blank" rel="noopener noreferrer" title="Book a room">
                        <img src="/images/skin_v2/gomb_foglalas_en.png" alt="Book a room" />
                    </a>
                </div>

                <div class="panel-box panel-box-contact">
                    <p>Phone: (+36) 99 510 113<br />
                    E-mail: szallas@jegverem.hu</p>

                    <p>Book directly on our website for the best rates! We look forward to welcoming you to our inn!</p>
                </div>

            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'en';
                $order = array('menu', 'delivery');
                include $_SERVER['DOCUMENT_ROOT'] . '/modules/sidebar/html_template/home_mini_cards.php';
            ?>
        </div>
        <br class="clearfix" />
    </div>

    <?= $footer ?>
</div>
<!-- eof container -->

</body>
</html>
