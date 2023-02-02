'use strict';
const theme = {
  /**
   * Theme's components/functions list
   * Comment out or delete the unnecessary component.
   * Some components have dependencies (plugins).
   * Do not forget to remove dependency from src/js/vendor/ and recompile.
   */
  init: function () {
    theme.stickyHeader();
    theme.subMenu();
    theme.offCanvas();
    theme.isotope();
    theme.onepageHeaderOffset();
    theme.anchorSmoothScroll();
    theme.svgInject();
    theme.backgroundImage();
    theme.imageHoverOverlay();
    theme.rellax();
    theme.scrollCue();
    theme.swiperSlider();
    theme.lightbox();
    theme.plyr();
    theme.progressBar();
    theme.counterUp();
    theme.bsTooltips();
    theme.bsPopovers();
    theme.bsModal();
    theme.iTooltip();
    theme.forms();
    theme.passVisibility();
    theme.pricingSwitcher();
    theme.textRotator();
    theme.codeSnippet();
  },
  /**
   * Sticky Header
   * Enables sticky behavior on navbar on page scroll
   * Requires assets/js/vendor/headhesive.min.js
  */
  stickyHeader: () => {
    let navbar = document.querySelector(".navbar");
    if (navbar == null) return;
    let options = {
      offset: 350,
      offsetSide: 'top',
      classes: {
        clone: 'navbar-clone fixed',
        /*stick: 'navbar-stick',
        unstick: 'navbar-unstick',*/
      },
      onStick: function() {
        let navbarClonedClass = this.clonedElem.classList;
        if (navbarClonedClass.contains('transparent') && navbarClonedClass.contains('navbar-dark')) {
          this.clonedElem.className = this.clonedElem.className.replace("navbar-dark","navbar-light");
        }
      }
    };
    let banner = new Headhesive('.navbar', options);
  },
  /**
   * Sub Menus
   * Enables multilevel dropdown
   */
  subMenu: function () {
    (function($bs) {
      const CLASS_NAME = 'has-child-dropdown-show';
      $bs.Dropdown.prototype.toggle = function(_original) {
          return function() {
              document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                  e.classList.remove(CLASS_NAME);
              });
              let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
              for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                  dd.classList.add(CLASS_NAME);
              }
              return _original.call(this);
          }
      }($bs.Dropdown.prototype.toggle);
      document.querySelectorAll('.dropdown').forEach(function(dd) {
          dd.addEventListener('hide.bs.dropdown', function(e) {
              if (this.classList.contains(CLASS_NAME)) {
                  this.classList.remove(CLASS_NAME);
                  e.preventDefault();
              }
              e.stopPropagation();
          });
      });
    })(bootstrap);
  },
  /**
   * Offcanvas
   * Enables offcanvas-nav, closes offcanvas on anchor clicks
   */
  offCanvas: function () {
    const navOffCanvasBtn = document.querySelectorAll(".offcanvas-nav-btn");
    const navOffCanvas = document.querySelector('.navbar:not(.navbar-clone) .offcanvas-nav');
    const bsOffCanvas = new bootstrap.Offcanvas(navOffCanvas, {scroll: true});
    const scrollLink = document.querySelectorAll('.onepage .navbar li a.scroll');
    navOffCanvasBtn.forEach(e => {
      e.addEventListener('click', event => {
        bsOffCanvas.show();
      })
    });
    scrollLink.forEach(e => {
      e.addEventListener('click', event => {
        bsOffCanvas.hide();
      })
    });
  },
  /**
   * Isotope
   * Enables isotope grid layout and filtering
   * Requires assets/js/vendor/isotope.pkgd.min.js
   * Requires assets/js/vendor/imagesloaded.pkgd.min.js
   */
  isotope: function () {
    let grids = document.querySelectorAll('.grid');
    if(grids != null) {
      grids.forEach(g => {
        let grid = g.querySelector('.isotope');
        let filtersElem = g.querySelector('.isotope-filter');
        let buttonGroups = g.querySelectorAll('.isotope-filter');
        let iso = new Isotope(grid, {
          itemSelector: '.item',
          layoutMode: 'masonry',
          masonry: {
            columnWidth: grid.offsetWidth / 12
          },
          percentPosition: true,
          transitionDuration: '0.7s'
        });
        imagesLoaded(grid).on("progress", function() {
          iso.layout({
            masonry: {
              columnWidth: grid.offsetWidth / 12
            }
          })
        });
        window.addEventListener("resize", function() {
          iso.arrange({
            masonry: {
              columnWidth: grid.offsetWidth / 12
            }
          });
        }, true);
        if(filtersElem != null) {
          filtersElem.addEventListener('click', function(event) {
            if(!matchesSelector(event.target, '.filter-item')) {
              return;
            }
            let filterValue = event.target.getAttribute('data-filter');
            iso.arrange({
              filter: filterValue
            });
          });
          for(let i = 0, len = buttonGroups.length; i < len; i++) {
            let buttonGroup = buttonGroups[i];
            buttonGroup.addEventListener('click', function(event) {
              if(!matchesSelector(event.target, '.filter-item')) {
                return;
              }
              buttonGroup.querySelector('.active').classList.remove('active');
              event.target.classList.add('active');
            });
          }
        }
      });
    }
  },
  /**
   * Onepage Header Offset
   * Adds an offset value to anchor point equal to sticky header height on an onepage
   */
  onepageHeaderOffset: function () {
    const header_height = document.querySelector(".navbar").offsetHeight;
    const shrinked_header_height = 75;
    const sections = document.querySelectorAll(".onepage section");
    sections.forEach(section => {
      section.style.paddingTop = shrinked_header_height + 'px';
      section.style.marginTop = '-' + shrinked_header_height + 'px';
    });
    const first_section = document.querySelector(".onepage section:first-of-type");
    if(first_section != null) {
      first_section.style.paddingTop = header_height + 'px';
      first_section.style.marginTop = '-' + header_height + 'px';
    }
  },
  /**
   * Anchor Smooth Scroll
   * Adds smooth scroll animation to links with .scroll class
   * Requires assets/js/vendor/smoothscroll.js
   */
  anchorSmoothScroll: function () {
    const links = document.querySelectorAll(".scroll");
    for(const link of links) {
      link.addEventListener("click", clickHandler);
    }
    function clickHandler(e) {
      e.preventDefault();
      this.blur();
      const href = this.getAttribute("href");
      const offsetTop = document.querySelector(href).offsetTop;
      scroll({
        top: offsetTop,
        behavior: "smooth"
      });
    }
  },
  /**
   * SVGInject
   * Replaces an img element with an inline SVG, so you can apply colors to your SVGs
   * Requires assets/js/vendor/svg-inject.min.js
   */
  svgInject: function () {
    SVGInject.setOptions({
      onFail: function(img, svg) {
        img.classList.remove('svg-inject');
      }
    });
    document.addEventListener('DOMContentLoaded', function() {
      SVGInject(document.querySelectorAll('img.svg-inject'), {
        useCache: true
      });
    });
  },
  /**
   * Background Image
   * Adds a background image link via data attribute "data-image-src"
   */
  backgroundImage: function () {
    let bg = document.querySelectorAll(".bg-image");
    for(let i = 0; i < bg.length; i++) {
      let url = bg[i].getAttribute('data-image-src');
      bg[i].style.backgroundImage = "url('" + url + "')";
    }
  },
  /**
   * Image Hover Overlay
   * Adds span.bg inside .overlay for simpler markup and styling purposes
   */
  imageHoverOverlay: function () {
    let overlay = document.querySelectorAll('.overlay > a, .overlay > span');
    for(let i = 0; i < overlay.length; i++) {
      let overlay_bg = document.createElement('span');
      overlay_bg.className = "bg";
      overlay[i].appendChild(overlay_bg);
    }
  },
  /**
   * Rellax.js
   * Adds parallax animation to shapes and elements
   * Requires assets/js/vendor/rellax.min.js
   */
  rellax: function () {
    if(document.querySelector(".rellax") != null) {
      window.onload = function() {
        let rellax = new Rellax('.rellax', {
          speed: 2,
          center: true,
          breakpoints: [576, 992, 1201]
        });
        let projects_overflow = document.querySelectorAll('.projects-overflow');
        imagesLoaded(projects_overflow, function() {
          rellax.refresh();
        });
      }
    }
  },
  /**
   * scrollCue.js
   * Enables showing elements by scrolling
   * Requires assets/js/vendor/scrollCue.min.js
   */
  scrollCue: function () {
    scrollCue.init({
      interval: -400,
      duration: 700,
      percentage: 0.8
    });
    scrollCue.update();
  },
  /**
   * Swiper Slider
   * Enables carousels and sliders
   * Requires assets/js/vendor/swiper-bundle.min.js
   */
  swiperSlider: function() {
    let carousel = document.querySelectorAll('.swiper-container');
    for(let i = 0; i < carousel.length; i++) {
      let slider1 = carousel[i]
      slider1.classList.add('swiper-container-' + i);
      let controls = document.createElement('div');
      controls.className = "swiper-controls";
      let pagi = document.createElement('div');
      pagi.className = "swiper-pagination";
      let navi = document.createElement('div');
      navi.className = "swiper-navigation";
      let prev = document.createElement('div');
      prev.className = "swiper-button swiper-button-prev";
      let next = document.createElement('div');
      next.className = "swiper-button swiper-button-next";
      slider1.appendChild(controls);
      controls.appendChild(navi);
      navi.appendChild(prev);
      navi.appendChild(next);
      controls.appendChild(pagi);
      let sliderEffect = slider1.getAttribute('data-effect') ? slider1.getAttribute('data-effect') : 'slide';
      let sliderItems = slider1.getAttribute('data-items') ? slider1.getAttribute('data-items') : 3; // items in all devices
      let sliderItemsXs = slider1.getAttribute('data-items-xs') ? slider1.getAttribute('data-items-xs') : 1; // start - 575
      let sliderItemsSm = slider1.getAttribute('data-items-sm') ? slider1.getAttribute('data-items-sm') : Number(sliderItemsXs); // 576 - 767
      let sliderItemsMd = slider1.getAttribute('data-items-md') ? slider1.getAttribute('data-items-md') : Number(sliderItemsSm); // 768 - 991
      let sliderItemsLg = slider1.getAttribute('data-items-lg') ? slider1.getAttribute('data-items-lg') : Number(sliderItemsMd); // 992 - 1199
      let sliderItemsXl = slider1.getAttribute('data-items-xl') ? slider1.getAttribute('data-items-xl') : Number(sliderItemsLg); // 1200 - end
      let sliderItemsXxl = slider1.getAttribute('data-items-xxl') ? slider1.getAttribute('data-items-xxl') : Number(sliderItemsXl); // 1500 - end
      let sliderSpeed = slider1.getAttribute('data-speed') ? slider1.getAttribute('data-speed') : 500;
      let sliderAutoPlay = slider1.getAttribute('data-autoplay') !== 'false';
      let sliderAutoPlayTime = slider1.getAttribute('data-autoplaytime') ? slider1.getAttribute('data-autoplaytime') : 5000;
      let sliderAutoHeight = slider1.getAttribute('data-autoheight') === 'true';
      let sliderMargin = slider1.getAttribute('data-margin') ? slider1.getAttribute('data-margin') : 30;
      let sliderLoop = slider1.getAttribute('data-loop') === 'true';
      let swiper = slider1.querySelector('.swiper');
      let slider = new Swiper(swiper, {
        on: {
          beforeInit: function() {
            if(slider1.getAttribute('data-nav') !== 'true' && slider1.getAttribute('data-dots') !== 'true') {
              controls.remove();
            }
            if(slider1.getAttribute('data-dots') !== 'true') {
              pagi.remove();
            }
            if(slider1.getAttribute('data-nav') !== 'true') {
              navi.remove();
            }
          },
          init: function() {
            if(slider1.getAttribute('data-autoplay') !== 'true') {
              this.autoplay.stop();
            }
            this.update();
          }
        },
        autoplay: {
          delay: sliderAutoPlayTime,
          disableOnInteraction: false
        },
        speed: sliderSpeed,
        slidesPerView: sliderItems,
        loop: sliderLoop,
        spaceBetween: Number(sliderMargin),
        effect: sliderEffect,
        autoHeight: sliderAutoHeight,
        grabCursor: true,
        resizeObserver: false,
        breakpoints: {
          0: {
            slidesPerView: Number(sliderItemsXs)
          },
          576: {
            slidesPerView: Number(sliderItemsSm)
          },
          768: {
            slidesPerView: Number(sliderItemsMd)
          },
          992: {
            slidesPerView: Number(sliderItemsLg)
          },
          1200: {
            slidesPerView: Number(sliderItemsXl)
          },
          1400: {
            slidesPerView: Number(sliderItemsXxl)
          }
        },
        pagination: {
          el: carousel[i].querySelector('.swiper-pagination'),
          clickable: true
        },
        navigation: {
          prevEl: slider1.querySelector('.swiper-button-prev'),
          nextEl: slider1.querySelector('.swiper-button-next'),
        }
      });
    }
  },
  /**
   * GLightbox
   * Enables lightbox functionality
   * Requires assets/js/vendor/glightbox.js
   */
  lightbox: function () {
    const lightbox = GLightbox({
      selector: '*[data-glightbox]',
      touchNavigation: true,
      loop: false,
      zoomable: false,
      autoplayVideos: true,
      moreLength: 0,
      slideExtraAttributes: {
        poster: ''
      },
      plyr: {
        css: '',
        js: '',
        config: {
          ratio: '16:9',
          fullscreen: {
            enabled: false,
            iosNative: false
          },
          youtube: {
            noCookie: true,
            rel: 0,
            showinfo: 0,
            iv_load_policy: 3
          },
          vimeo: {
            byline: false,
            portrait: false,
            title: false,
            transparent: false
          }
        }
      },
    });
  },
  /**
   * Plyr
   * Enables media player
   * Requires assets/js/vendor/plyr.js
   */
  plyr: function () {
    let players = Plyr.setup('.player', {
      loadSprite: true,
    });
  },
  /**
   * Progressbar
   * Enables animated progressbars
   * Requires assets/js/vendor/progressbar.min.js
   * Requires assets/js/vendor/noframework.waypoints.min.js
   */
  progressBar: function () {
    const pline = document.querySelectorAll(".progressbar.line");
    const pcircle = document.querySelectorAll(".progressbar.semi-circle");
    pline.forEach(e => {
      let line = new ProgressBar.Line(e, {
        strokeWidth: 6,
        trailWidth: 6,
        duration: 3000,
        easing: 'easeInOut',
        text: {
          style: {
            color: 'inherit',
            position: 'absolute',
            right: '0',
            top: '-30px',
            padding: 0,
            margin: 0,
            transform: null
          },
          autoStyleContainer: false
        },
        step: (state, line) => {
          line.setText(Math.round(line.value() * 100) + ' %');
        }
      });
      let value = e.getAttribute('data-value') / 100;
      new Waypoint({
        element: e,
        handler: function() {
          line.animate(value);
        },
        offset: 'bottom-in-view',
      })
    });
    pcircle.forEach(e => {
      let circle = new ProgressBar.SemiCircle(e, {
        strokeWidth: 6,
        trailWidth: 6,
        duration: 2000,
        easing: 'easeInOut',
        step: (state, circle) => {
          circle.setText(Math.round(circle.value() * 100));
        }
      });
      let value = e.getAttribute('data-value') / 100;
      new Waypoint({
        element: e,
        handler: function() {
          circle.animate(value);
        },
        offset: 'bottom-in-view',
      })
    });
  },
  /**
   * Counter
   * Counts to a targeted number when the number becomes visible
   * Requires assets/js/vendor/counterup.min.js
   * Requires assets/js/vendor/noframework.waypoints.min.js
   */
  counterUp: function () {
    let counterUp = window.counterUp["default"];
    const counters = document.querySelectorAll(".counter");
    counters.forEach(el => {
      new Waypoint({
        element: el,
        handler: function() {
          counterUp(el, {
            duration: 1000,
            delay: 50
          })
          this.destroy()
        },
        offset: 'bottom-in-view',
      })
    });
  },
  /**
   * Bootstrap Tooltips
   * Enables Bootstrap tooltips
   * Requires Poppers library
   */
  bsTooltips: function () {
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    let tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  },
  /**
   * Bootstrap Popovers
   * Enables Bootstrap popovers
   * Requires Poppers library
   */
  bsPopovers: function () {
    let popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    let popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
      return new bootstrap.Popover(popoverTriggerEl)
    })
  },
  /**
   * Bootstrap Modal
   * Enables Bootstrap modal popup
   */
  bsModal: function () {
    if(document.querySelector(".modal-popup") != null) {
      let myModalPopup = new bootstrap.Modal(document.querySelector('.modal-popup'));
      setTimeout(function() {
        myModalPopup.show();
      }, 200);
    }
    // Fixes jumping of page progress caused by modal
    let innerWidth = window.innerWidth;
    let clientWidth = document.body.clientWidth;
    let scrollSize = innerWidth - clientWidth;
    let myModalEl = document.querySelectorAll('.modal');
    let pageProgress = document.querySelector('.progress-wrap');
    function setPadding() {
      if(pageProgress != null) {
        pageProgress.style.marginRight = scrollSize + 'px';
      }
    }
    function removePadding() {
      if(pageProgress != null) {
       pageProgress.style.marginRight = '';
      }
    }
    myModalEl.forEach(myModalEl => {
      myModalEl.addEventListener('show.bs.modal', function(e) {
        setPadding();
      })
      myModalEl.addEventListener('hidden.bs.modal', function(e) {
        removePadding();
      })
    });
  },
  /**
   * iTooltip
   * Enables custom tooltip style for image hover docs/elements/hover.html
   * Requires assets/js/vendor/itooltip.min.js
   */
  iTooltip: function () {
    let tooltip = new iTooltip('.itooltip')
    tooltip.init({
      className: 'itooltip-inner',
      indentX: 15,
      indentY: 15,
      positionX: 'right',
      positionY: 'bottom'
    })
  },
  /**
   * Form Validation and Contact Form submit
   * Bootstrap validation - Only sends messages if form has class ".contact-form" and is validated and shows success/fail messages
   */
  forms: function () {
    (function() {
      "use strict";
      window.addEventListener("load", function() {
        let forms = document.querySelectorAll(".needs-validation");
        let validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener("submit", function(event) {
            if(form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
            if(form.checkValidity() === true) {
              event.preventDefault();
              form.classList.remove("was-validated");
              // Send message only if the form has class .contact-form
              let isContactForm = form.classList.contains('contact-form');
              console.log(isContactForm);
              if(isContactForm) {
                let data = new FormData(form);
                let alertClass = 'alert-danger';
                fetch("assets/php/contact.php", {
                  method: "post",
                  body: data
                }).then((data) => {
                  if(data.ok) {
                    alertClass = 'alert-success';
                  }
                  return data.text();
                }).then((txt) => {
                  let alertBox = '<div class="alert ' + alertClass + ' alert-dismissible fade show"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' + txt + '</div>';
                  if(alertClass && txt) {
                    form.querySelector(".messages").insertAdjacentHTML('beforeend', alertBox);
                    form.reset();
                  }
                }).catch((err) => {
                  console.log(err);
                });
              }
            }
          }, false);
        });
      }, false);
    })();
  },
  /**
   * Password Visibility Toggle
   * Toggles password visibility in password input
   */
  passVisibility: function () {
    let pass = document.querySelectorAll('.password-field');
    for (let i = 0; i < pass.length; i++) {
      let passInput = pass[i].querySelector('.form-control');
      let passToggle = pass[i].querySelector('.password-toggle > i');
      passToggle.addEventListener('click', (e) => {
        if (passInput.type === "password") {
          passInput.type = "text";
          passToggle.classList.remove('uil-eye');
          passToggle.classList.add('uil-eye-slash');
        } else {
          passInput.type = "password";
          passToggle.classList.remove('uil-eye-slash'); 
          passToggle.classList.add('uil-eye');
        } 
      }, false);
    }
  },
  /**
   * Pricing Switcher
   * Enables monthly/yearly switcher seen on pricing tables
   */
  pricingSwitcher: function () {
    const wrapper = document.querySelectorAll(".pricing-wrapper");
    wrapper.forEach(wrap => {
      const switchers = wrap.querySelector(".pricing-switchers");
      const switcher = wrap.querySelectorAll(".pricing-switcher");
      const price = wrap.querySelectorAll(".price");
      switchers.addEventListener("click", (e) => {
        switcher.forEach(s => {
          s.classList.toggle("pricing-switcher-active");
        });
        price.forEach(p => {
          p.classList.remove("price-hidden");
          p.classList.toggle("price-show");
          p.classList.toggle("price-hide");
        });
      });
    });
  },
  /**
   * ReplaceMe.js
   * Enables text rotator
   * Requires assets/js/vendor/replaceme.min.js
   */
  textRotator: function () {
    if(document.querySelector(".rotator-zoom") != null) {
      let replace = new ReplaceMe(document.querySelector('.rotator-zoom'), {
        animation: 'animate__animated animate__zoomIn',
        speed: 2500,
        separator: ',',
        clickChange: false,
        loopCount: 'infinite'
      });
    }
    if(document.querySelector(".rotator-fade") != null) {
      let replace = new ReplaceMe(document.querySelector('.rotator-fade'), {
        animation: 'animate__animated animate__fadeInDown',
        speed: 2500,
        separator: ',',
        clickChange: false,
        loopCount: 'infinite'
      });
    }
  },
  /**
   * Clipboard.js
   * Enables clipboard on docs
   * Requires assets/js/vendor/clipboard.min.js
   */
  codeSnippet: function () {
    let btnHtml = '<button type="button" class="btn btn-sm btn-white rounded-pill btn-clipboard">Copy</button>'
    document.querySelectorAll('.code-wrapper-inner').forEach(function(element) {
      element.insertAdjacentHTML('beforebegin', btnHtml)
    })
    let clipboard = new ClipboardJS('.btn-clipboard', {
      target: function(trigger) {
        return trigger.nextElementSibling
      }
    })
    clipboard.on('success', event => {
      event.trigger.textContent = 'Copied!';
      event.clearSelection();
      setTimeout(function () {
        event.trigger.textContent = 'Copy';
      }, 2000);
    });
    let copyIconCode = new ClipboardJS('.btn-copy-icon');
    copyIconCode.on('success', function(event) {
      event.clearSelection();
      event.trigger.textContent = 'Copied!';
      window.setTimeout(function() {
        event.trigger.textContent = 'Copy';
      }, 2300);
    });
  },
}
theme.init();