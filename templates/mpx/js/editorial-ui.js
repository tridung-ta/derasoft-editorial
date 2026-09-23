(function () {
  'use strict';

  var header = document.querySelector('[data-editorial-header]');
  var toggle = document.querySelector('[data-editorial-menu-toggle]');
  var navigation = document.querySelector('[data-editorial-navigation]');
  var backToTop = document.getElementById('btnToTop');

  function enhanceHomeCardImages() {
    var images = document.querySelectorAll('.ed-home .ed-card__media img[loading="lazy"]');
    Array.prototype.forEach.call(images, function (image) {
      var media = image.closest('.ed-card__media');
      if (!media || (image.complete && image.naturalWidth > 0)) return;
      media.classList.add('is-loading');
      var finish = function () { media.classList.remove('is-loading'); };
      image.addEventListener('load', finish, { once: true });
      image.addEventListener('error', finish, { once: true });
      window.setTimeout(finish, 10000);
    });
  }

  function closeMenu() {
    if (!toggle || !navigation) return;
    toggle.classList.remove('is-active');
    navigation.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', toggle.getAttribute('data-open-label') || 'Open menu');
    document.body.classList.remove('menu-open');
  }

  if (header && toggle && navigation) {
    toggle.addEventListener('click', function () {
      var isOpen = toggle.getAttribute('aria-expanded') !== 'true';
      toggle.classList.toggle('is-active', isOpen);
      navigation.classList.toggle('is-open', isOpen);
      toggle.setAttribute('aria-expanded', String(isOpen));
      toggle.setAttribute('aria-label', toggle.getAttribute(isOpen ? 'data-close-label' : 'data-open-label') || 'Menu');
      document.body.classList.toggle('menu-open', isOpen);
      if (isOpen) {
        var firstLink = navigation.querySelector('a');
        if (firstLink) firstLink.focus();
      }
    });

    navigation.addEventListener('click', function (event) {
      if (event.target.closest('a')) closeMenu();
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        closeMenu();
        toggle.focus();
      }
    });
    document.addEventListener('click', function (event) {
      if (!header.contains(event.target)) closeMenu();
    });
    window.addEventListener('resize', function () {
      if (window.innerWidth > 767) closeMenu();
    });
  }

  function updateScrollState() {
    if (header) header.classList.toggle('is-scrolled', window.scrollY > 24);
    if (backToTop) backToTop.classList.toggle('is-visible', window.scrollY > 600);
  }

  if (backToTop) {
    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' });
    });
  }
  updateScrollState();
  window.addEventListener('scroll', updateScrollState, { passive: true });
  enhanceHomeCardImages();
})();
