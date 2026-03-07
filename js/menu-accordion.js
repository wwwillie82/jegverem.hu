document.addEventListener('DOMContentLoaded', function () {
    var accordion = document.querySelector('[data-menu-accordion="1"]');

    if (!accordion) {
        return;
    }

    function setPanelHeight(item, open) {
        var panel = item ? item.querySelector('.menu-accordion__panel') : null;
        if (!panel) {
            return;
        }

        if (!open) {
            panel.style.maxHeight = '0px';
            return;
        }

        panel.style.maxHeight = '0px';
        requestAnimationFrame(function () {
            panel.style.maxHeight = panel.scrollHeight + 'px';
        });
    }

    function closeAllItems() {
        var items = accordion.querySelectorAll('.menu-accordion__item');

        items.forEach(function (current) {
            current.classList.remove('open');
            var currentToggle = current.querySelector('.menu-accordion__toggle');
            if (currentToggle) {
                currentToggle.setAttribute('aria-expanded', 'false');
            }
            setPanelHeight(current, false);
        });
    }

    accordion.addEventListener('click', function (event) {
        var toggle = event.target.closest('.menu-accordion__toggle');

        if (!toggle || !accordion.contains(toggle)) {
            return;
        }

        var item = toggle.closest('.menu-accordion__item');

        if (!item) {
            return;
        }

        var isOpen = item.classList.contains('open');
        closeAllItems();

        if (!isOpen) {
            item.classList.add('open');
            toggle.setAttribute('aria-expanded', 'true');
            setPanelHeight(item, true);
        }
    });

    var openItems = accordion.querySelectorAll('.menu-accordion__item.open');
    openItems.forEach(function (item) {
        setPanelHeight(item, true);
        var itemToggle = item.querySelector('.menu-accordion__toggle');
        if (itemToggle) {
            itemToggle.setAttribute('aria-expanded', 'true');
        }
    });


    accordion.addEventListener('load', function (event) {
        if (!event.target || event.target.tagName !== 'IMG') {
            return;
        }

        var opened = accordion.querySelector('.menu-accordion__item.open');
        if (opened) {
            setPanelHeight(opened, true);
        }
    }, true);

    window.addEventListener('resize', function () {
        var opened = accordion.querySelector('.menu-accordion__item.open');
        if (opened) {
            setPanelHeight(opened, true);
        }
    });
});
