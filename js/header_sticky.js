(function () {
  document.addEventListener('DOMContentLoaded', function () {
    var siteHeader = document.getElementById('site-header');
    if (!siteHeader) {
      return;
    }

    var ticking = false;

    function updateState() {
      if (window.scrollY > 80) {
        siteHeader.classList.add('is-compact');
      } else {
        siteHeader.classList.remove('is-compact');
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
    updateState();
  });
})();
