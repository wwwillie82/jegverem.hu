<div id="site-header">
<div id="header">
    <div class="holder site-width">
        <h1><a href="/en/index">Jégverem Fogadó</a></h1>

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
    <a href="/en" class="header-overlay-link" aria-label="Home"></a>
</div>

<div id="cta-bar">
    <div class="holder site-width">
        <a class="cta-btn" href="https://mobilpincer.net/hu/jegverem-fogado">Online Ordering</a>
        <a class="cta-btn" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee">Table Booking</a>
        <a class="cta-btn" href="/en/a_panziorol">Accommodation</a>
        <a class="cta-btn" href="#">Private Events</a>
    </div>
</div>

<div id="main-nav">
    <div class="holder site-width">
        <div id="menu">
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/index" || $_SERVER["REQUEST_URI"] == "/en"): ?>active<? endif; ?>"><a href="/en/index">Home</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/heti_menu"): ?>active<? endif; ?>"><a href="/en/heti_menu">Weekly menu</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/ettermunk_kinalata"): ?>active<? endif; ?>"><a href="/en/ettermunk_kinalata">Restaurant menu</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/galeria"): ?>active<? endif; ?>"><a href="/en/galeria">Gallery</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/a_panziorol"): ?>active<? endif; ?>"><a href="/en/a_panziorol">About the Guesthouse</a></span>
            <span class="nav-item <? if($_SERVER["REQUEST_URI"] == "/en/a_jegverem_tortenete"): ?>active<? endif; ?>"><a href="/en/a_jegverem_tortenete">History</a></span>
            <span class="nav-item no <? if($_SERVER["REQUEST_URI"] == "/en/kapcsolat"): ?>active<? endif; ?>"><a href="/en/kapcsolat">Contact</a></span>
        </div>
    </div>
</div>
</div>
