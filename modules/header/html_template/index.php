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
            <div class="mobile-header-social" aria-label="Közösségi linkek">
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
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/ettermunk_kinalata">Étterem</a>
            <div class="mobile-menu-sub">
                <a href="<?= $langPrefix ?>/heti_menu">Heti menü</a>
                <a href="<?= $langPrefix ?>/ettermunk_kinalata">Étlap</a>
                <a href="<?= $langPrefix ?>/itallap">Itallap</a>
                <a href="<?= $langPrefix ?>/privat_rendezvenyek">Privát rendezvények</a>
                <a href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee" target="_blank" rel="noopener noreferrer">Asztalfoglalás</a>
                <a href="https://mobilpincer.net/hu/jegverem-fogado" target="_blank" rel="noopener noreferrer">Online Ételrendelés</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/a_panziorol">Szállás</a>
            <div class="mobile-menu-sub">
                <a href="https://nethotelbooking.net/hotels/jegverem/lang=hu">Online árkalkuláció &amp; foglalás</a>
                <a href="<?= $langPrefix ?>/a_panziorol">Panziónkról</a>
            </div>
        </div>

        <div class="mobile-menu-group">
            <a class="mobile-menu-section-title" href="<?= $langPrefix ?>/kapcsolat">Jégverem</a>
            <div class="mobile-menu-sub">
                <a href="<?= $langPrefix ?>/kapcsolat">Kapcsolat</a>
                <a href="<?= $langPrefix ?>/galeria">Galéria</a>
            </div>
        </div>
    </div>
</div>

<div id="header">
    <div class="holder site-width">
        <h1><a href="/index">Jégverem Fogadó</a></h1>

        <div class="top-links">
            <div class="languages">
                <a href="<?= $huUrl ?>" class="<?= $currentLang === 'hu' ? 'on' : '' ?>">HU</a>
                <a href="<?= $deUrl ?>" class="<?= $currentLang === 'de' ? 'on' : '' ?>">DE</a>
                <a href="<?= $enUrl ?>" class="<?= $currentLang === 'en' ? 'on' : '' ?>">EN</a>
            </div>

            <div class="social-icons">
                <a href="https://www.tiktok.com/@jegveremfogado" target="_blank" rel="noopener" aria-label="TikTok"><img src="/images/skin_v2/icons/tiktok.png" alt="TikTok" /></a>
                <a href="https://www.instagram.com/jegveremfogado" target="_blank" rel="noopener" aria-label="Instagram"><img src="/images/skin_v2/instagram.png" alt="Instagram" /></a>
                <a href="https://www.facebook.com/jegveremfogado/" target="_blank" rel="noopener" aria-label="Facebook"><img src="/images/skin_v2/facebook.png" alt="Facebook" /></a>
            </div>
        </div>
    </div>
    <a href="/index" class="header-overlay-link" aria-label="Kezdőlap"></a>
</div>


<div id="cta-bar">
    <div class="holder site-width">
        <a class="cta-btn" href="https://mobilpincer.net/hu/jegverem-fogado">Online Ételrendelés</a>
        <a class="cta-btn" href="https://reservation.dish.co/landingPage/hydra-fa60e3c2-9cc8-4282-9212-df64ffb965ee">Asztalfoglalás</a>
        <a class="cta-btn" href="https://nethotelbooking.net/hotels/jegverem/lang=hu">Szállás</a>
        <a class="cta-btn" href="/privat_rendezvenyek">Privát rendezvények</a>
    </div>
</div>

<div id="main-nav">
    <div class="holder site-width">
        <div id="menu">
            <span class="nav-item <?php if($path == "/index" || $path == "/"): ?>active<?php endif; ?>"><a href="/index">Kezdőlap</a></span>
            <span class="nav-item <?php if($path == "/heti_menu"): ?>active<?php endif; ?>"><a href="/heti_menu">Heti menü</a></span>
            <span class="nav-item <?php if($path == "/ettermunk_kinalata"): ?>active<?php endif; ?>"><a href="/ettermunk_kinalata">Éttermünk kínálata</a></span>
            <span class="nav-item <?php if($path == "/galeria"): ?>active<?php endif; ?>"><a href="/galeria">Galéria</a></span>
            <span class="nav-item <?php if($path == "/a_panziorol"): ?>active<?php endif; ?>"><a href="/a_panziorol">A panzióról</a></span>
            <span class="nav-item <?php if($path == "/a_jegverem_tortenete"): ?>active<?php endif; ?>"><a href="/a_jegverem_tortenete">Jégverem története</a></span>
            <span class="nav-item <?php if($path == "/projektek"): ?>active<?php endif; ?>"><a href="/projektek">Projektek</a></span>
            <span class="nav-item no <?php if($path == "/kapcsolat"): ?>active<?php endif; ?>"><a href="/kapcsolat">Kapcsolat</a></span>
        </div>
    </div>
</div>
</div>
<div id="site-header-spacer" aria-hidden="true"></div>
<script src="/js/mobile-menu.js" type="text/javascript"></script>
