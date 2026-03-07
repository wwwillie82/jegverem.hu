<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<title>Jégverem Fogadó</title>
	<meta name="title" content="Jégverem Fogadó" />
	<meta http-equiv="Content-Language" content="de-de" />
	<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
	<link href="/css/main.css?v=20260221" rel="stylesheet" type="text/css" media="screen" />
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/html_template/shared/mobile_menu_css.php'; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/voov.slideshow.js" type="text/javascript"></script>
    <script src="/js/jegverem.js" type="text/javascript"></script>
</head>
<?php $__pageBodyClass = "page-private-events"; if (isset($body_class) && trim($body_class) != "") { $__pageBodyClass = trim($body_class . " " . $__pageBodyClass); } ?>
<body class="<?= $__pageBodyClass ?>">

<div id="container">
    <?= $header ?>
<script defer async src='https://cdn.trustindex.io/loader.js?f9074e46542e48ecf4781fac1'></script>

    <div id="middle">
        <div class="main">
            <div class="top"></div>
            <div class="content">
                <h2><span>Private Veranstaltung im Jégverem</span></h2>

                <p>Geburtstag, Treffen mit Freunden, Geschäftsessen, Familienfeier oder Klassentreffen? Das Jégverem ist der ideale Ort für ein gemeinsames Event in ruhiger, privater Atmosphäre. Wir unterstützen euch dabei, dass alles reibungslos und angenehm abläuft.</p>

                <h3>Ihre Vorteile</h3>
                <ul>
                    <li><strong>Exklusiv</strong> – ein echtes privates Erlebnis nur für eure Gruppe.</li>
                    <li><strong>Keine Raummiete</strong> – und kein erwarteter Mindestverzehr; bestellt einfach Mittag- oder Abendessen für die Gruppe.</li>
                    <li><strong>Flexible Zeiten</strong> – auch außerhalb der regulären Öffnungszeiten möglich.</li>
                    <li><strong>Individuelles Menüangebot</strong> – auf eure Gruppe abgestimmt.</li>
                </ul>

                <h3>Wählt den perfekten Ort!</h3>
                <p>Je nach Gruppengröße und gewünschter Stimmung könnt ihr aus drei Bereichen wählen.</p>

                <div class="private-event-cards">
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:emeleti-privat-terem-2026-01-01" title="Obergeschoss"><img src="/images/skin_v2/emelet_jegverem_fogado_privat_rendezveny.png" alt="Obergeschoss" /></a>
                        <h4>Obergeschoss</h4>
                        <p>Max. 35 Personen</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:a-terasz-2026-01-01" title="Terrasse"><img src="/images/skin_v2/terasz_jegverem_fogado_privat_rendezveny.png" alt="Terrasse" /></a>
                        <h4>Terrasse</h4>
                        <p>Max. 40 Personen</p>
                    </div>
                    <div class="private-event-card">
                        <a href="http://www.jegverem.hu/galeria/kepek/permalink:az-etterem-2026-01-01" title="Ganzes Restaurant"><img src="/images/skin_v2/etterem_jegverem_fogado_privat_rendezveny.png" alt="Ganzes Restaurant" /></a>
                        <h4>Ganzes Restaurant</h4>
                        <p>Max. 100 Personen</p>
                    </div>
                </div>

                <p class="private-event-note"><strong>Mindestteilnehmerzahl in jedem Bereich: 15 Personen.</strong></p>

                <h3>Die Bar gehört nur euch!</h3>
                <p>Eine Kollegin oder ein Kollege kümmert sich ausschließlich um eure Wünsche, damit der Service während der gesamten Veranstaltung schnell und aufmerksam bleibt.</p>

                <h3>Wir richten uns nach euch</h3>
                <p>Wir stimmen die Details flexibel mit euch ab und bieten Termine auch außerhalb der regulären Öffnungszeiten an.</p>

                <h3>Die Küche kocht nur für euch</h3>
                <p>Ihr könnt zwischen einer vorab abgestimmten À-la-carte-Auswahl oder einem individuellen Menü wählen.</p>

                <h3>Angebot anfragen</h3>
                <p>Fordert ein Angebot an, und ihr erhaltet es innerhalb von 24 Stunden über unsere E-Mail-Adresse <a href="mailto:jegverem@jegverem.hu">jegverem@jegverem.hu</a>.</p>
                <p>Bei Fragen erreicht ihr uns:<br />
                telefonisch: <a href="tel:+36309528687">+36 30 952 8687</a><br />
                persönlich: 9400 Sopron, Jégverem u. 1.</p>
            </div>
            <div class="bottom"></div>
        </div>

        <div class="sidebar sidebar-home-mini-cards">
            <?php
                $lang = 'de';
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
