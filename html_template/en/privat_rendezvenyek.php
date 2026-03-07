<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<title>Jégverem Fogadó</title>
	<meta name="title" content="Jégverem Fogadó" />
	<meta http-equiv="Content-Language" content="en-us" />
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
	<link href="/css/main.css?v=20260221" rel="stylesheet" type="text/css" media="screen" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/html_template/shared/mobile_menu_css.php'; ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
</head>
<? $__pageBodyClass = "page-private-events"; if (isset($body_class) && trim($body_class) != "") { $__pageBodyClass = trim($body_class . " " . $__pageBodyClass); } ?>
<body class="<?= $__pageBodyClass ?>">

<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Private events at Jégverem</span></h2>

                <p>Birthday, gathering with friends, business dinner, family celebration or class reunion? Jégverem is an ideal venue when you want to spend time together in a private setting. We help make your event smooth and memorable.</p>

                <h3>Why choose us?</h3>
                <ul>
                    <li><strong>Exclusive</strong> – a true private experience for your group only.</li>
                    <li><strong>No venue rental fee</strong> – and no required minimum spend; simply order lunch or dinner for your group.</li>
                    <li><strong>Flexible timing</strong> – available by arrangement even outside regular opening hours.</li>
                    <li><strong>Custom menu options</strong> – tailored to your group.</li>
                </ul>

                <h3>Choose the perfect venue!</h3>
                <p>You can choose from three different areas depending on your group size and preferred atmosphere.</p>

                <div class="private-event-cards">
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:emeleti-privat-terem-2026-01-01" title="Upstairs room"><img src="/images/skin_v2/emelet_jegverem_fogado_privat_rendezveny.png" alt="Upstairs room" /></a>
                        <h4>Upstairs room</h4>
                        <p>Up to 35 guests</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:a-terasz-2026-01-01" title="Terrace"><img src="/images/skin_v2/terasz_jegverem_fogado_privat_rendezveny.png" alt="Terrace" /></a>
                        <h4>Terrace</h4>
                        <p>Up to 40 guests</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:az-etterem-2026-01-01" title="Entire restaurant"><img src="/images/skin_v2/etterem_jegverem_fogado_privat_rendezveny.png" alt="Entire restaurant" /></a>
                        <h4>Entire restaurant</h4>
                        <p>Up to 100 guests</p>
                    </div>
                </div>

                <p class="private-event-note"><strong>Minimum group size for any area: 15 guests.</strong></p>

                <h3>The bar is exclusively yours</h3>
                <p>One team member will focus only on your requests, ensuring attentive and efficient service throughout your event.</p>

                <h3>We adapt to your plans</h3>
                <p>We coordinate details flexibly and can host your event outside regular opening hours as well.</p>

                <h3>The kitchen cooks for your group</h3>
                <p>You can choose pre-selected à la carte options or request a fully custom menu.</p>

                <h3>Request an offer</h3>
                <p>Request an offer and you will receive it within 24 hours at our e-mail address: <a href="mailto:jegverem@jegverem.hu">jegverem@jegverem.hu</a>.</p>
                <p>If you have any questions, you can reach us:<br />
                by phone: <a href="tel:+36309528687">+36 30 952 8687</a><br />
                in person: 9400 Sopron, Jégverem u. 1.</p>
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


	<?= $banner ?>
    <?= $footer ?>
</div>

</body>
</html>
