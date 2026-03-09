<div id="site-header">
<?php
    $path = isset($path) ? $path : URI::GetCurrentRoutePath();
    $currentLang = isset($currentLang) ? $currentLang : 'hu';
    $langPrefix = isset($langPrefix) ? $langPrefix : ($currentLang === 'hu' ? '' : '/' . $currentLang);
    $homeUrl = isset($homeUrl) ? $homeUrl : ($currentLang === 'hu' ? '/index' : '/' . $currentLang);

    if (!isset($huUrl) || !isset($enUrl) || !isset($deUrl)) {
        $basePath = isset($basePath) ? $basePath : $path;
        if ($basePath === '' || $basePath === '/') {
            $basePath = '/index';
        }

        if ($basePath === '/index') {
            $huUrl = '/index';
            $enUrl = '/en';
            $deUrl = '/de';
        } else {
            $huUrl = $basePath;
            $enUrl = '/en' . $basePath;
            $deUrl = '/de' . $basePath;
        }
    }
?>


<div class="mobile-header">
    <div class="mobile-header-inner">
        <div class="mobile-logo">
            <a href="<?= $homeUrl ?>"><img src="/images/logo.png" alt="Jégverem" /></a>
        </div>

        <div class="mobile-header-actions">
            <div class="mobile-header-social" aria-label="Social-Media-Links">
                <a href="https://www.facebook.com/jegveremfogado/" target="_blank" rel="noopener" aria-label="Facebook">
                    <img src="/images/skin_v2/icons/facebook.png" alt="Facebook" />
                </a>
                <a href="https://www.instagram.com/jegveremfogado" target="_blank" rel="noopener" aria-label="Instagram">
                    <img src="/images/skin_v2/icons/instagram.png" alt="Instagram" />
                </a>
                <a href="https://www.tiktok.com/@jegveremfogado" target="_blank" rel="noopener" aria-label="TikTok">
                    <img src="/images/skin_v2/icons/tiktok.png" alt="TikTok" />
                </a>
            </div>

            <button type="button" class="mobile-menu-toggle" aria-expanded="false" aria-controls="mobile-menu-panel">
                <span class="hamburger"></span>
                <span class="menu-text">Menü</span>
            </button>
        </div>
    </div>
</div>

<div id="mobile-menu-panel" class="mobile-menu" aria-hidden="true">
    <div class="mobile-menu-inner">
        <div class="mobile-menu-languages">
            <a href="<?= $huUrl ?>" class="<?= $currentLang === 'hu' ? 'on' : '' ?>">HU</a>
            <a href="<?= $enUrl ?>" class="<?= $currentLang === 'en' ? 'on' : '' ?>">EN</a>
            <a href="<?= $deUrl ?>" class="<?= $currentLang === 'de' ? 'on' : '' ?>">DE</a>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/ettermunk_kinalata">Restaurant</a>
            <div class="mobile-menu-sub">
                <a href="<?= $langPrefix ?>/heti_menu">Wochenmenü</a>
                <a href="<?= $langPrefix ?>/ettermunk_kinalata">Speisekarte</a>
                <a href="<?= $langPrefix ?>/itallap">Getränkekarte</a>
                <a href="<?= $langPrefix ?>/privat_rendezvenyek">Private Veranstaltungen</a>
                <a href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee" target="_blank" rel="noopener noreferrer">Tischreservierung</a>
                <a href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer">Online-Bestellung</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/a_panziorol">Unterkunft</a>
            <div class="mobile-menu-sub">
                <a href="https://nethotelbooking.net/hotels/jegverem/lang=de">Online-Preisberechnung &amp; Buchung</a>
                <a href="<?= $langPrefix ?>/a_panziorol">Über die Pension</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/kapcsolat">Jégverem</a>
            <div class="mobile-menu-sub">
                <a href="<?= $langPrefix ?>/kapcsolat">Kontakte</a>
                <a href="<?= $langPrefix ?>/galeria">Galerie</a>
            </div>
        </div>
    </div>
</div>

<div id="header">
    <div class="holder site-width">
        <h1><a href="/de/index">Jégverem Fogadó</a></h1>

        <div class="top-links">
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
        <a class="cta-btn" href="https://nethotelbooking.net/hotels/jegverem/lang=de">Unterkunft</a>
        <a class="cta-btn" href="/de/privat_rendezvenyek">Private Veranstaltungen</a>
    </div>
</div>

<div id="main-nav">
    <div class="holder site-width">
        <div id="menu">
            <span class="nav-item <?php if($path == "/de/index" || $path == "/de"): ?>active<?php endif; ?>"><a href="/de/index">Startseite</a></span>
            <span class="nav-item <?php if($path == "/de/heti_menu"): ?>active<?php endif; ?>"><a href="/de/heti_menu">Wochenmenü</a></span>
            <span class="nav-item <?php if($path == "/de/ettermunk_kinalata"): ?>active<?php endif; ?>"><a href="/de/ettermunk_kinalata">Angebote unseres Restaurants</a></span>
            <span class="nav-item <?php if($path == "/de/galeria"): ?>active<?php endif; ?>"><a href="/de/galeria">Galerie</a></span>
            <span class="nav-item <?php if($path == "/de/a_panziorol"): ?>active<?php endif; ?>"><a href="/de/a_panziorol">Über die Pension</a></span>
            <span class="nav-item <?php if($path == "/de/a_jegverem_tortenete"): ?>active<?php endif; ?>"><a href="/de/a_jegverem_tortenete">Geschichte</a></span>
            <span class="nav-item no <?php if($path == "/de/kapcsolat"): ?>active<?php endif; ?>"><a href="/de/kapcsolat">Kontakte</a></span>
        </div>
    </div>
</div>
</div>
<div id="site-header-spacer" aria-hidden="true"></div>
<?php if (empty($GLOBALS['__jv_mobile_menu_js_included'])): $GLOBALS['__jv_mobile_menu_js_included'] = true; ?>
<script src="/js/mobile-menu.js" type="text/javascript"></script>
<?php endif; ?>
