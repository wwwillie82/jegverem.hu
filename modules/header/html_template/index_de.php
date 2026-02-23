<div id="site-header">
<div id="header">
    <div class="holder site-width">
        <h1><a href="/de/index">Jégverem Fogadó</a></h1>

        <div class="top-links">
            <?php
                // aktuális URI (pl. /a_panziorol vagy /en/a_panziorol)
                $uri = $_SERVER['REQUEST_URI'] ?? '/';

                // csak a path kell (query nélkül)
                $path = parse_url($uri, PHP_URL_PATH);

                // ha üres vagy csak / → kezeljük indexként
                if ($path === '' || $path === '/') {
                    $basePath = '/index';
                    $currentLang = 'hu';
                } else {

                    // EN prefix
                    if (strpos($path, '/en/') === 0) {
                        $basePath = substr($path, 3); // levágjuk az /en részt
                        $currentLang = 'en';
                    }
                    elseif ($path === '/en') {
                        $basePath = '/index';
                        $currentLang = 'en';
                    }

                    // DE prefix
                    elseif (strpos($path, '/de/') === 0) {
                        $basePath = substr($path, 3);
                        $currentLang = 'de';
                    }
                    elseif ($path === '/de') {
                        $basePath = '/index';
                        $currentLang = 'de';
                    }

                    // HU (nincs prefix)
                    else {
                        $basePath = $path;
                        $currentLang = 'hu';
                    }
                }

                // index speciális kezelés
                if ($basePath === '/index') {
                    $huUrl = '/index';
                    $enUrl = '/en';
                    $deUrl = '/de';
                } else {
                    $huUrl = $basePath;
                    $enUrl = '/en' . $basePath;
                    $deUrl = '/de' . $basePath;
                }
            ?>

            <div class="languages">
                <a href="<?= $huUrl ?>" class="<?= $currentLang === 'hu' ? 'on' : '' ?>">HU</a>
                <a href="<?= $deUrl ?>" class="<?= $currentLang === 'de' ? 'on' : '' ?>">DE</a>
                <a href="<?= $enUrl ?>" class="<?= $currentLang === 'en' ? 'on' : '' ?>">EN</a>
            </div>

            <div class="social-icons">
                <a href="https://www.tiktok.com/@jegveremfogado" aria-label="TikTok"><img src="/images/skin_v2/tiktok.png" alt="TikTok" /></a>
                <a href="https://www.instagram.com/jegveremfogado" aria-label="Instagram"><img src="/images/skin_v2/instagram.png" alt="Instagram" /></a>
                <a href="https://www.facebook.com/jegveremfogado/" aria-label="Facebook"><img src="/images/skin_v2/facebook.png" alt="Facebook" /></a>
            </div>
        </div>
    </div>
    <a href="/de" class="header-overlay-link" aria-label="Startseite"></a>
</div>

<div id="cta-bar">
    <div class="holder site-width">
        <a class="cta-btn" href="https://mobilpincer.net/hu/jegverem-fogado">Online Bestellung</a>
        <a class="cta-btn" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee">Tischreservierung</a>
        <a class="cta-btn" href="/de/a_panziorol">Unterkunft</a>
        <a class="cta-btn" href="#">Private Veranstaltungen</a>
    </div>
</div>

<div id="main-nav">
    <div class="holder site-width">
        <div id="menu">
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/index" || $_SERVER["REQUEST_URI"] == "/de"): ?>active<? endif; ?>"><a href="/de/index">Startseite</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/heti_menu"): ?>active<? endif; ?>"><a href="/de/heti_menu">Wochenmenü</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/ettermunk_kinalata"): ?>active<? endif; ?>"><a href="/de/ettermunk_kinalata">Angebote unseres Restaurants</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/galeria"): ?>active<? endif; ?>"><a href="/de/galeria">Galerie</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/a_panziorol"): ?>active<? endif; ?>"><a href="/de/a_panziorol">Über die Pension</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/de/a_jegverem_tortenete"): ?>active<? endif; ?>"><a href="/de/a_jegverem_tortenete">Geschichte</a></span>
            <span class="nav-item no <? if($_SERVER["REQUEST_URI"] == "/de/kapcsolat"): ?>active<? endif; ?>"><a href="/de/kapcsolat">Kontakte</a></span>
        </div>
    </div>
</div>
</div>
