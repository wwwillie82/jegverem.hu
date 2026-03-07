(function () {
  document.addEventListener('DOMContentLoaded', function () {
    var siteHeader = document.getElementById('site-header');
    var spacer = document.getElementById('site-header-spacer');
    if (!siteHeader) {
      return;
    }

    var ticking = false;

    function updateSpacerHeight() {
      if (!siteHeader || !spacer) return;
      var h = siteHeader.getBoundingClientRect().height;
      document.documentElement.style.setProperty('--site-header-h', h + 'px');
    }

    if ('ResizeObserver' in window && siteHeader && spacer) {
      var ro = new ResizeObserver(function () {
        updateSpacerHeight();
      });
      ro.observe(siteHeader);
    }

    function updateState() {
      var shouldCompact = window.scrollY > 80;
      var isCompact = siteHeader.classList.contains('is-compact');

      if (shouldCompact !== isCompact) {
        siteHeader.classList.toggle('is-compact', shouldCompact);
        window.requestAnimationFrame(updateSpacerHeight);
      }

      ticking = false;
    }

    function onScroll() {
      if (!ticking) {
        window.requestAnimationFrame(updateState);
        ticking = true;
      }
    }


    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', function () {
      window.requestAnimationFrame(updateSpacerHeight);
    });

    updateState();
    window.requestAnimationFrame(updateSpacerHeight);
  });
})();
