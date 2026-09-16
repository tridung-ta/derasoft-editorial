(function () {
  'use strict';

  var videos = [
    { id: 'Q8ucXj2pDbo', vi: 'Không gian văn hóa nghệ thuật: Bảo tàng Mỹ thuật Việt Nam', en: 'Vietnam Fine Arts Museum: An artistic and cultural space', zh: '越南美术博物馆：艺术与文化空间' },
    { id: 'q-r5WwQukik', vi: 'Phim tài liệu 60 năm Bảo tàng Mỹ thuật Việt Nam', en: 'Documentary: 60 years of the Vietnam Fine Arts Museum', zh: '纪录片：越南美术博物馆六十年' },
    { id: 'vx54SQs3A1M', vi: 'Trải nghiệm mỹ thuật với ứng dụng iMuseum VFA', en: 'Experiencing art with the iMuseum VFA application', zh: '通过 iMuseum VFA 应用体验艺术' },
    { id: 'tJTkPdk3Mks', vi: 'Không gian mỹ thuật đương đại tại Bảo tàng Mỹ thuật Việt Nam', en: 'Contemporary art at the Vietnam Fine Arts Museum', zh: '越南美术博物馆的当代艺术空间' }
  ];

  function currentLanguage() {
    var path = window.location.pathname.toLowerCase();
    if (path.indexOf('/en/') === 0 || path === '/en') return 'en';
    if (path.indexOf('/zh/') === 0 || path === '/zh') return 'zh';
    return 'vi';
  }

  function text(video, language) {
    return video[language] || video.vi;
  }

  function buildFallback() {
    if (document.getElementById('editorialVideoPlayer')) return;
    var empty = document.querySelector('.ed-video-page .ed-empty');
    if (!empty) return;
    var language = currentLanguage();
    var sourceLabel = language === 'en' ? 'Source' : (language === 'zh' ? '来源' : 'Nguồn');
    var openLabel = language === 'en' ? 'Open on YouTube' : (language === 'zh' ? '在 YouTube 上观看' : 'Mở trên YouTube');
    var libraryLabel = language === 'en' ? 'Explore the collection' : (language === 'zh' ? '探索影像收藏' : 'Khám phá bằng hình ảnh');
    var first = videos[0];
    var cards = videos.map(function (video, index) {
      var title = text(video, language);
      return '<article class="ed-video-choice' + (index === 0 ? ' is-active' : '') + '"><button type="button" class="ed-video-choice__button" data-video-select data-video-id="' + video.id + '" data-video-title="' + title.replace(/&/g, '&amp;').replace(/"/g, '&quot;') + '" data-video-description="" data-video-source="Bảo tàng Mỹ thuật Việt Nam" aria-pressed="' + (index === 0 ? 'true' : 'false') + '"><figure><img src="https://i.ytimg.com/vi/' + video.id + '/hqdefault.jpg" alt="" loading="lazy"><span class="ed-play">▶</span></figure><div><small>Bảo tàng Mỹ thuật Việt Nam</small><h3>' + title + '</h3></div></button></article>';
    }).join('');
    var wrapper = empty.closest('.ed-archive__content');
    wrapper.outerHTML = '<section class="ed-watch"><div class="ed-shell"><div class="ed-watch__layout"><div class="ed-watch__player"><iframe id="editorialVideoPlayer" src="https://www.youtube-nocookie.com/embed/' + first.id + '?rel=0" title="' + text(first, language) + '" loading="eager" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div><div class="ed-watch__info"><span class="ed-kicker">' + (language === 'en' ? 'NOW PLAYING' : (language === 'zh' ? '正在播放' : 'ĐANG PHÁT')) + '</span><h2 id="editorialVideoTitle">' + text(first, language) + '</h2><p id="editorialVideoDescription"></p><div class="ed-watch__source"><span>' + sourceLabel + '</span><strong id="editorialVideoSource">Bảo tàng Mỹ thuật Việt Nam</strong></div><a id="editorialVideoExternal" href="https://www.youtube.com/watch?v=' + first.id + '" target="_blank" rel="noopener noreferrer">' + openLabel + ' ↗</a></div></div></div></section><section class="ed-video-library"><div class="ed-shell"><header class="ed-section__head"><div><span class="ed-kicker">VIDEO</span><h2>' + libraryLabel + '</h2></div></header><div class="ed-video-grid ed-video-grid--selectable">' + cards + '</div></div></section>';
  }

  function bindPlayer() {
    var player = document.getElementById('editorialVideoPlayer');
    var title = document.getElementById('editorialVideoTitle');
    var description = document.getElementById('editorialVideoDescription');
    var source = document.getElementById('editorialVideoSource');
    var external = document.getElementById('editorialVideoExternal');
    var buttons = document.querySelectorAll('[data-video-select]');
    if (!player || !buttons.length) return;
    Array.prototype.forEach.call(buttons, function (button) {
      button.addEventListener('click', function () {
        var id = button.getAttribute('data-video-id') || '';
        if (!/^[A-Za-z0-9_-]{11}$/.test(id)) return;
        player.src = 'https://www.youtube-nocookie.com/embed/' + id + '?autoplay=1&rel=0';
        player.title = button.getAttribute('data-video-title') || 'Video';
        if (title) title.textContent = button.getAttribute('data-video-title') || '';
        if (description) description.textContent = button.getAttribute('data-video-description') || '';
        if (source) source.textContent = button.getAttribute('data-video-source') || '';
        if (external) external.href = 'https://www.youtube.com/watch?v=' + id;
        Array.prototype.forEach.call(buttons, function (item) {
          item.setAttribute('aria-pressed', item === button ? 'true' : 'false');
          item.parentNode.classList.toggle('is-active', item === button);
        });
        player.scrollIntoView({ behavior: 'smooth', block: 'center' });
      });
    });
  }

  buildFallback();
  bindPlayer();
})();
