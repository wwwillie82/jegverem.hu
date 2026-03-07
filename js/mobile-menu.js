(function() {
    var MENU_KEY_PREFIX = 'jvMobileMenu:';
    var MENU_STATE_TTL_MS = 10000;

    function isMobile() {
        return window.matchMedia && window.matchMedia('(max-width: 768px)').matches;
    }

    function setMobileMode() {
        if (!document.body) {
            return;
        }

        if (isMobile()) {
            document.body.classList.add('mobile-v2');
        } else {
            document.body.classList.remove('mobile-v2');
            document.body.classList.remove('mobile-menu-open');
        }
    }

    function updateMobileHeaderHeight() {
        if (!document.body) {
            return;
        }

        if (!isMobile()) {
            document.body.style.removeProperty('--mobile-header-height');
            return;
        }

        var header = document.querySelector('.mobile-header');
        if (!header) {
            return;
        }

        var measured = header.offsetHeight;
        if (measured > 0) {
            document.body.style.setProperty('--mobile-header-height', measured + 'px');
        }
    }

    function debounce(fn, wait) {
        var timeoutId;

        return function() {
            var context = this;
            var args = arguments;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                fn.apply(context, args);
            }, wait);
        };
    }

    function openMenu(toggle, panel) {
        panel.classList.add('open');
        panel.setAttribute('aria-hidden', 'false');
        toggle.setAttribute('aria-expanded', 'true');
        document.body.classList.add('mobile-menu-open');
    }

    function closeMenu(toggle, panel) {
        panel.classList.remove('open');
        panel.setAttribute('aria-hidden', 'true');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('mobile-menu-open');
    }

    function getStorage() {
        try {
            if (window.sessionStorage) {
                window.sessionStorage.setItem('__jv_mobile_menu_test__', '1');
                window.sessionStorage.removeItem('__jv_mobile_menu_test__');
                return window.sessionStorage;
            }
        } catch (error) {}

        try {
            if (window.localStorage) {
                window.localStorage.setItem('__jv_mobile_menu_test__', '1');
                window.localStorage.removeItem('__jv_mobile_menu_test__');
                return window.localStorage;
            }
        } catch (error) {}

        return null;
    }

    function getStateKeys(pathname) {
        var baseKey = MENU_KEY_PREFIX + (pathname || window.location.pathname);
        return {
            open: baseKey + ':open',
            scroll: baseKey + ':scroll',
            ts: baseKey + ':ts'
        };
    }

    function clearLegacyState(storage) {
        if (!storage) {
            return;
        }

        try {
            storage.removeItem('mobileMenuOpen');
            storage.removeItem('mobileMenuScroll');
        } catch (error) {
            return;
        }
    }

    function clearState(storage, keys) {
        if (!storage || !keys) {
            return;
        }

        try {
            storage.removeItem(keys.open);
            storage.removeItem(keys.scroll);
            storage.removeItem(keys.ts);
        } catch (error) {
            return;
        }
    }

    function persistMenuStateForLanguageSwitch(panel, nextPathname) {
        var storage = getStorage();
        if (!storage) {
            return;
        }

        var keys = getStateKeys(nextPathname);

        try {
            storage.setItem(keys.open, '1');
            storage.setItem(keys.scroll, String(panel.scrollTop || 0));
            storage.setItem(keys.ts, String(Date.now()));
        } catch (error) {
            return;
        }
    }

    function restoreMenuStateIfNeeded(toggle, panel) {
        if (!toggle || !panel || !isMobile()) {
            return;
        }

        var storage = getStorage();
        if (!storage) {
            return;
        }

        var keys = getStateKeys();

        clearLegacyState(storage);

        try {
            if (storage.getItem(keys.open) !== '1') {
                return;
            }

            var savedTs = parseInt(storage.getItem(keys.ts), 10);
            var hasValidTs = !isNaN(savedTs) && (Date.now() - savedTs) <= MENU_STATE_TTL_MS;
            if (!hasValidTs) {
                clearState(storage, keys);
                return;
            }

            openMenu(toggle, panel);

            var savedScroll = parseInt(storage.getItem(keys.scroll), 10);
            if (!isNaN(savedScroll) && savedScroll > 0) {
                requestAnimationFrame(function() {
                    panel.scrollTop = savedScroll;
                });
            }

            clearState(storage, keys);
        } catch (error) {
            return;
        }
    }

    function initMenu() {
        var toggle = document.querySelector('.mobile-menu-toggle');
        var panel = document.getElementById('mobile-menu-panel');

        if (!toggle || !panel) {
            return;
        }

        toggle.addEventListener('click', function() {
            var opened = panel.classList.contains('open');
            if (opened) {
                closeMenu(toggle, panel);
            } else {
                openMenu(toggle, panel);
            }
        });

        panel.addEventListener('click', function(event) {
            var target = event.target;
            if (!target || target.tagName.toLowerCase() !== 'a') {
                return;
            }

            if (target.closest('.mobile-menu-languages')) {
                if (panel.classList.contains('open')) {
                    var targetHref = target.getAttribute('href') || '';
                    var nextPathname = '';

                    try {
                        nextPathname = new URL(targetHref, window.location.origin).pathname;
                    } catch (error) {
                        nextPathname = '';
                    }

                    persistMenuStateForLanguageSwitch(panel, nextPathname || window.location.pathname);
                }
                return;
            }

            closeMenu(toggle, panel);
        });

        restoreMenuStateIfNeeded(toggle, panel);
    }

    function initMenuListenersOnce() {
        if (window.__jvMobileMenuV2ListenersInited) {
            return;
        }

        window.__jvMobileMenuV2ListenersInited = true;
        initMenu();
    }

    function boot() {
        setMobileMode();
        initMenuListenersOnce();
        updateMobileHeaderHeight();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }

    window.addEventListener('load', function() {
        updateMobileHeaderHeight();
    });

    window.addEventListener('orientationchange', debounce(function() {
        setMobileMode();
        updateMobileHeaderHeight();
    }, 100));

    if (!window.__jvMobileMenuV2ResizeInited) {
        window.__jvMobileMenuV2ResizeInited = true;

        var onResize = debounce(function() {
            setMobileMode();
            updateMobileHeaderHeight();

            if (!isMobile()) {
                var toggle = document.querySelector('.mobile-menu-toggle');
                var panel = document.getElementById('mobile-menu-panel');
                if (toggle && panel) {
                    closeMenu(toggle, panel);
                }
            }
        }, 100);

        window.addEventListener('resize', onResize);
    }
})();
