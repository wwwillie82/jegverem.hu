<div id="site-header">
<?php
    $path = URI::GetCurrentRoutePath();

    if ($path === '/en') {
        $basePath = '/index';
        $currentLang = 'en';
    } elseif (strpos($path, '/en/') === 0) {
        $basePath = substr($path, 3);
        $currentLang = 'en';
    } else {
        $basePath = $path === '' || $path === '/' ? '/index' : $path;
        $currentLang = 'hu';
    }

    $langPrefix = $currentLang === 'hu' ? '' : '/' . $currentLang;

    $homeUrl = $currentLang === 'hu' ? '/index' : '/' . $currentLang;

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


<div class="mobile-header">
    <div class="mobile-header-inner">
        <div class="mobile-logo">
            <a href="<?= $homeUrl ?>"><img src="/images/logo.png" alt="Jégverem" /></a>
        </div>

        <div class="mobile-header-actions">
            <div class="mobile-header-social" aria-label="Social links">
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
                <span class="menu-text">Menu</span>
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
                <a href="<?= $langPrefix ?>/heti_menu">Weekly menu</a>
                <a href="<?= $langPrefix ?>/ettermunk_kinalata">Menu</a>
                <a href="<?= $langPrefix ?>/itallap">Drinks</a>
                <a href="<?= $langPrefix ?>/privat_rendezvenyek">Private Events</a>
                <a href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee" target="_blank" rel="noopener noreferrer">Table Booking</a>
                <a href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer">Online Ordering</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/a_panziorol">Accommodation</a>
            <div class="mobile-menu-sub">
                <a href="https://nethotelbooking.net/hotels/jegverem/lang=en">Online price calculation &amp; booking</a>
                <a href="<?= $langPrefix ?>/a_panziorol">About the Guesthouse</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/kapcsolat">Jégverem</a>
            <div class="mobile-menu-sub">
                <a href="<?= $langPrefix ?>/kapcsolat">Contact</a>
                <a href="<?= $langPrefix ?>/galeria">Gallery</a>
            </div>
        </div>
    </div>
</div>

<div id="header">
    <div class="holder site-width">
        <h1><a href="/en/index">Jégverem Fogadó</a></h1>

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
    <a href="/en" class="header-overlay-link" aria-label="Home"></a>
</div>


<div id="cta-bar">
    <div class="holder site-width">
        <a class="cta-btn" href="https://mobilpincer.net/hu/jegverem-fogado">Online Ordering</a>
        <a class="cta-btn" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee">Table Booking</a>
        <a class="cta-btn" href="https://nethotelbooking.net/hotels/jegverem/lang=en">Accommodation</a>
        <a class="cta-btn" href="/en/privat_rendezvenyek">Private Events</a>
    </div>
</div>

<div id="main-nav">
    <div class="holder site-width">
        <div id="menu">
            <span class="nav-item <? if($path == "/en/index" || $path == "/en"): ?>active<? endif; ?>"><a href="/en/index">Home</a></span>
            <span class="nav-item <? if($path == "/en/heti_menu"): ?>active<? endif; ?>"><a href="/en/heti_menu">Weekly menu</a></span>
            <span class="nav-item <? if($path == "/en/ettermunk_kinalata"): ?>active<? endif; ?>"><a href="/en/ettermunk_kinalata">Restaurant menu</a></span>
            <span class="nav-item <? if($path == "/en/galeria"): ?>active<? endif; ?>"><a href="/en/galeria">Gallery</a></span>
            <span class="nav-item <? if($path == "/en/a_panziorol"): ?>active<? endif; ?>"><a href="/en/a_panziorol">About the Guesthouse</a></span>
            <span class="nav-item <? if($path == "/en/a_jegverem_tortenete"): ?>active<? endif; ?>"><a href="/en/a_jegverem_tortenete">History</a></span>
            <span class="nav-item no <? if($path == "/en/kapcsolat"): ?>active<? endif; ?>"><a href="/en/kapcsolat">Contact</a></span>
        </div>
    </div>
</div>
</div>
<div id="site-header-spacer" aria-hidden="true"></div>
<?php if (empty($GLOBALS['__jv_mobile_menu_js_included'])): $GLOBALS['__jv_mobile_menu_js_included'] = true; ?>
<script src="/js/mobile-menu.js" type="text/javascript"></script>
<?php endif; ?>
