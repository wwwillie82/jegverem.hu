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
                <h2><span>Contact</span></h2>

                <div class="covers">
                    <div class="item">
                        <iframe width="590" height="329" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=hu&amp;geocode=&amp;q=9400+Sopron,+J%C3%A9gverem+u.+1.&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=40.59616,79.013672&amp;vpsrc=0&amp;ie=UTF8&amp;hq=&amp;hnear=9400+Sopron,+J%C3%A9gverem,+Magyarorsz%C3%A1g&amp;t=m&amp;ll=47.68833,16.593819&amp;spn=0.019009,0.050554&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                    </div>
                </div>

                <h3>Related information</h3>

                <ul>
                    <li><span>Address:</span> H-9400 Sopron, Jégverem u. 1.</li>
                    <li><span>Home Delivery/Table reservation:</span>
                    Phone: (+36) 99/510-113, E-mail: jegverem@jegverem.hu</li>
					<li><span>Room reservation:</span>
                    szallas@jegverem.hu</li>
                </ul>

                <h3>Opening hours</h3>
				
				<ul>
					<li>Monday: 12-22</li>
					<li>Tuesday: 12-22</li>
					<li>Wednesday: 12-22</li>
					<li>Thursday: 12-22</li>
					<li>Friday: 12-22</li>
					<li>Saturday: 12-22</li>
					<li>Sunday: 12-20</li>
                </ul>

            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'en';
                $order = array('accommodation', 'menu', 'delivery');
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