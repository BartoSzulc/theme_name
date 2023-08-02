import LazyLoad from "vanilla-lazyload";
import { domReady } from '@roots/sage/client';
import Header from "./components/Header";
import Carousels from "./components/Carousels";
// import VideoPlay from "./components/VideoPlay";
import AOS from 'aos';
import $ from 'jquery';

import GLightbox from 'glightbox';
import Alpine from 'alpinejs'
// import { gsap } from 'gsap/dist/gsap';



/**
 * app.main
 * 
**/
AOS.init({
  duration: 600,
  easing: 'ease-in-sine',
  anchorPlacement: 'top-bottom'
});

$(document).ready(function() {
 
  function addActiveTab($tabHeader, sectionClass) {
    const tabData = $tabHeader.data("tab");
    const $tabContent = $(`.${sectionClass} .tab-content[data-tab='${tabData}']`);

    // Only add "active" class and fade in if it's not already active
    if (!$tabHeader.hasClass("active")) {
      removeActiveClasses(sectionClass, function() {
        $tabHeader.addClass("active");
        $tabContent.addClass("active").fadeIn(400, function() {
          console.log(`Added active classes to tab with ID '${tabData}'`);
        });
      });
    }
  }

  function removeActiveClasses(sectionClass, callback) {
    $(`.${sectionClass} .tab-header`).removeClass("active");
    console.log("Removed active classes header.");
    $(`.${sectionClass} .tab-content.active`).fadeOut(300, function() {
      $(this).removeClass("active");
      console.log("Removed active classes content.");
      if (typeof callback === "function") {
        callback();
      }
    });
  }
  function initializeTabs(sectionClass, activeTab) {
    const $tabHeaders = $(`.${sectionClass} .tab-header`);
    const $tabContents = $(`.${sectionClass} .tab-content`);
  
    $tabContents.hide();
    $tabHeaders.removeClass("active");
  
    if (activeTab) {
      addActiveTab(activeTab, sectionClass);
    } else {
      const $firstTab = $tabHeaders.first();
      // Do not call removeActiveClasses() here to prevent immediate removal of active class.
      $firstTab.addClass("active"); // Set the first tab as active by default.
      const tabData = $firstTab.data("tab");
      const $tabContent = $(`.${sectionClass} .tab-content[data-tab='${tabData}']`);
      $tabContent.addClass("active").fadeIn(400, function() {
        console.log(`Added active classes to tab with ID '${tabData}'`);
      });
    }
  
    $tabHeaders.on("click", function() {
      const tab = $(this).data("tab");
      const $activeTabContent = $(`.${sectionClass} .tab-content.active`);
  
      if (!$(this).hasClass("active")) {
        $activeTabContent.fadeOut(300, () => {
          removeActiveClasses(sectionClass);
          $(this).addClass("active");
          $(`.${sectionClass} .tab-content[data-tab='${tab}']`).fadeIn(300).addClass("active");
        });
      } else {
        console.log(`Tab with ID '${tab}' is already active.`);
      }
    });
  }
  
  function scrollToTabAndOpen(tabId) {
    const $tabHeader = $(`.tab-header[data-tab='${tabId}']`);
  
    // Check if the tab-header element exists
    if ($tabHeader.length === 0) {
      console.warn(`Tab with ID '${tabId}' not found. Redirecting to /oferta/#${tabId}`);
      window.location.href = `/oferta/#${tabId}`;
      return;
    }
  
    const sectionClass = $tabHeader.closest(".offer__tabs").attr("class");
  
    if (sectionClass) {
      const sectionClassArr = sectionClass.split(" ");
      const targetSectionClass = sectionClassArr.find((cls) => cls.startsWith("offer__tabs--"));
  
      if (targetSectionClass) {
        addActiveTab($tabHeader, targetSectionClass);
        $("html, body").animate(
          
          {
            scrollTop: $tabHeader.offset().top - 50,
          },
          500,
          () => {
            
          }
        );
      } else {
        console.warn(`No section class found for tab with ID '${tabId}'.`);
      }
    } else {
      console.warn(`No section class found for tab with ID '${tabId}'.`);
    }
  }

  initializeTabs("offer__tabs--premium");
  initializeTabs("offer__tabs--special");
  // Add more sections here with their respective classes if needed

  $(".menu-item__third-level a").on("click", function(e) {
    e.preventDefault();
    const targetId = $(this).attr("href").split("#")[1];
    console.log(`Menu link clicked. Scrolling to tab with ID '${targetId}'`);
    scrollToTabAndOpen(targetId);
  });
  function scrollToTab(tabId) {
    const $tabHeader = $(`.tab-header[data-tab='${tabId}']`);
  
    // Check if the tab-header element exists and scroll to it
    if ($tabHeader.length !== 0) {
      const sectionClass = $tabHeader.closest(".offer__tabs").attr("class");
  
      if (sectionClass) {
        const sectionClassArr = sectionClass.split(" ");
        const targetSectionClass = sectionClassArr.find((cls) => cls.startsWith("offer__tabs--"));
  
        if (targetSectionClass) {
          addActiveTab($tabHeader, targetSectionClass);
          $("html, body").animate(
            {
              scrollTop: $tabHeader.offset().top - 50,
            },
            500
          );
        } else {
          console.warn(`No section class found for tab with ID '${tabId}'.`);
        }
      } else {
        console.warn(`No section class found for tab with ID '${tabId}'.`);
      }
    }
  }

  // Check if the URL has a tab ID, then scroll to it
  const hash = window.location.hash.substr(1);
  if (hash) {
    scrollToTab(hash);
  }
});

$(document).ready(function() {
  AOS.init({
    duration: 600,
    easing: 'ease-in-sine',
    anchorPlacement: 'top-bottom'
  });
  const firstLevelItems = $('.menu-item__first-level');
  const submenu = $('.menu-item__dropdown-menu.depth-0');
  let timeout;
  const isMobile = () => window.matchMedia('(max-width: 1280px)').matches;

  // Hide all submenus
  submenu.removeClass('active');

  // Click behavior for mobile devices (with menu-item__dropdown class)
  firstLevelItems.on('click', function(e) {
    // Check if it's a mobile device before enabling the click behavior
    if (isMobile() && $(this).hasClass('menu-item__dropdown')) {
      const currentSubmenu = $(this).find('.menu-item__dropdown-menu.depth-0');

      if (currentSubmenu.hasClass('active')) {
        // Follow link on the second click
        return;
      }

      // Prevent default link behavior on the first click and show submenu
      e.preventDefault();
      submenu.removeClass('active');
      currentSubmenu.addClass('active');
    }
  });

  // Hover behavior for non-mobile devices
  if (!isMobile()) {
    firstLevelItems.hover(
      function() {
        const currentSubmenu = $(this).find('.menu-item__dropdown-menu.depth-0');
        clearTimeout(timeout);

        setTimeout(function() {
          submenu.not(currentSubmenu).removeClass('active');
          currentSubmenu.addClass('active');
        }, 100);
      },
      function() {
        const currentSubmenu = $(this).find('.menu-item__dropdown-menu.depth-0');
        clearTimeout(timeout);
        timeout = setTimeout(function() {
          currentSubmenu.removeClass('active');
        }, 500); 
      }
    );
  }
});



const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
    <div class="gloader visible"></div>
    <div class="goverlay"></div>
    <div class="gcontainer">
    <div id="glightbox-slider" class="gslider"></div>
    <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example"><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle class="transition-kaemde group-hover:custom-{{ $color ?? 'white' }}" cx="30" cy="30" r="30" fill="#383436"/>
    <g clip-path="url(#clip0_18_4)">
    <path  d="M44.6563 29.1705C44.6559 29.1701 44.6556 29.1697 44.6552 29.1694L38.532 23.0756C38.0732 22.6191 37.3312 22.6208 36.8746 23.0796C36.4181 23.5383 36.4198 24.2803 36.8786 24.7369L40.9897 28.8281H16.1719C15.5246 28.8281 15 29.3528 15 30C15 30.6472 15.5246 31.1719 16.1719 31.1719H40.9897L36.8786 35.2631C36.4199 35.7197 36.4181 36.4617 36.8747 36.9204C37.3313 37.3792 38.0733 37.3808 38.532 36.9244L44.6553 30.8306C44.6556 30.8303 44.6559 30.8299 44.6563 30.8295C45.1153 30.3714 45.1138 29.627 44.6563 29.1705Z" fill="#8EC43F"/>
    </g>
    <defs>
    <clipPath id="clip0_18_4">
    <rect class="transition-kaemde group-hover:custom-{{ $color ?? 'white' }}"  width="30" height="30" fill="#383436" transform="translate(15 15)"/>
    </clipPath>
    </defs>
</svg>     </button>
    <button class="gprev gbtn" tabindex="1" aria-label="Previous"><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
    <circle class="transition-kaemde group-hover:custom-{{ $color ?? 'white' }}" cx="30" cy="30" r="30" fill="#383436"/>
    <g clip-path="url(#clip0_18_4)">
    <path  d="M44.6563 29.1705C44.6559 29.1701 44.6556 29.1697 44.6552 29.1694L38.532 23.0756C38.0732 22.6191 37.3312 22.6208 36.8746 23.0796C36.4181 23.5383 36.4198 24.2803 36.8786 24.7369L40.9897 28.8281H16.1719C15.5246 28.8281 15 29.3528 15 30C15 30.6472 15.5246 31.1719 16.1719 31.1719H40.9897L36.8786 35.2631C36.4199 35.7197 36.4181 36.4617 36.8747 36.9204C37.3313 37.3792 38.0733 37.3808 38.532 36.9244L44.6553 30.8306C44.6556 30.8303 44.6559 30.8299 44.6563 30.8295C45.1153 30.3714 45.1138 29.627 44.6563 29.1705Z" fill="#8EC43F"/>
    </g>
    <defs>
    <clipPath id="clip0_18_4">
    <rect class="transition-kaemde group-hover:custom-{{ $color ?? 'white' }}"  width="30" height="30" fill="#383436" transform="translate(15 15)"/>
    </clipPath>
    </defs>
</svg>     
</button>
    <button class="gclose" tabindex="2" aria-label="Close">
    <svg xmlns="http://www.w3.org/2000/svg" width="22.457" height="22.457" viewBox="0 0 22.457 22.457">
      <path class="fill-primary" id="Close-icon-9iuh" d="M122.232,46.019l6.621-6.621a2.7,2.7,0,1,0-3.817-3.817L118.415,42.2l-6.621-6.621a2.7,2.7,0,0,0-3.817,3.817l6.621,6.621-6.621,6.621a2.7,2.7,0,0,0,3.817,3.817l6.621-6.621,6.621,6.621a2.7,2.7,0,0,0,3.817-3.817Z" transform="translate(-107.186 -34.791)"/>
    </svg>
    </button>
</div>
</div>`;
const lightbox = GLightbox({ 
  lightboxHTML: customLightboxHTML,
});

$(document).ready(() => {
  // Smoothly open submenu on anchor click
  $(".menu-item__dropdown-menu.depth-0 li.menu-item > a").click(function(e) {
    const subMenu = $(this).siblings(".sub-menu.depth-1");
    const activeSubMenu = $(".menu-item__dropdown-menu.depth-0 li.menu-item > a.active").siblings(".sub-menu.depth-1");

    if (subMenu.length > 0) {
      if ($(this).hasClass("active")) {
        // Follow link on second click
        return;
      }

      e.preventDefault();
      const previousSubMenu = activeSubMenu.filter(".open");

      if (previousSubMenu.length > 0) {
        previousSubMenu.removeClass("open").slideUp(300, () => {
          subMenu.slideDown(300, () => {
            subMenu.addClass("open");
          });
        });
      } else {
        subMenu.slideDown(300, () => {
          subMenu.addClass("open");
        });
      }

      $(".menu-item__dropdown-menu.depth-0 li.menu-item > a").removeClass("active"); // Remove active class from all depth-0 links
      $(this).addClass("active"); // Add active class to the clicked depth-0 link
    }
  });

  // Follow link on depth-1 anchor click
  $(".menu-item__dropdown-menu.depth-0 li.menu-item .sub-menu.depth-1 a").click((e) => {
    e.stopPropagation(); // Prevent event bubbling to the parent elements
  });

  // Add active class to the first link and show its depth-1 submenu
  const initialSubMenu = $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child .sub-menu.depth-1");
  initialSubMenu.addClass("open");
  $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child > a").addClass("active");
});



// $(document).ready(function() {
//   // Smoothly open submenu on anchor click
//   $(".menu-item__dropdown-menu.depth-0 li.menu-item > a").click(function(e) {
//     var subMenu = $(this).siblings(".sub-menu.depth-1");

//     if (subMenu.length > 0) {
//       e.preventDefault();
//       $(".menu-item__dropdown-menu.depth-0 li.menu-item > a").removeClass("active"); // Remove active class from all depth-0 links
//       $(this).addClass("active"); // Add active class to the clicked depth-0 link
//       $(".menu-item__dropdown-menu.depth-0 li.menu-item .sub-menu.depth-1").not(subMenu).removeClass("open"); // Close other depth-1 submenus
//       subMenu.addClass("open"); // Show the clicked depth-1 submenu
//     }
//   });

//   // Follow link on depth-1 anchor click
//   $(".menu-item__dropdown-menu.depth-0 li.menu-item .sub-menu.depth-1 a").click(function(e) {
//     e.stopPropagation(); // Prevent event bubbling to the parent elements
//   });
//   $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child > a").addClass("active");
//   $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child .sub-menu.depth-1").addClass("open");
// });


 // Add active class to the first link and show its depth-1 submenu
//  $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child > a").addClass("active");
//  $(".menu-item__dropdown-menu.depth-0 li.menu-item__second-level:first-child .sub-menu.depth-1").addClass("open");
// const homepage = document.querySelector('.home') !== null,
//   blackBG = document.querySelector('.hero-homepage__black-bg'),
//   textLinesHero = document.querySelector('.heroText'),
//   textLines = document.querySelectorAll('.heroText h1 > span'),
//   body = document.querySelector('body'),
//   modalHero = document.querySelector('.modal-hero');
//   if (homepage && !window.location.hash && (!localStorage.getItem('heroPlayedAt') || Date.now() - localStorage.getItem('heroPlayedAt') > 300000)) {
//     window.onbeforeunload = function () {
//       window.scrollTo(0, 0);
//     }
//     textLinesHero.classList.add('z-50');
//     let homeTL = gsap.timeline({
//       pause: true
//     });
//     homeTL.set(textLines, {
//       opacity: 0,
//     }).fromTo(textLines, {
//       opacity: 0,
//     }, {
//       opacity: 1,
//       duration: 1.2,
//       stagger: 1
//     }).to(blackBG, {
//       opacity: 0,
//       duration: 1,
//       onComplete: () => {
  
//         blackBG.classList.add('hidden');
//         body.classList.remove('overflow-hidden');
//         modalHero.classList.remove('hidden');
//         AOS.init({
//           offset: 0,
//           duration: 600,
//           easing: 'ease-in-sine',
//           anchorPlacement: 'top-bottom'
//         });
  
//         localStorage.setItem('heroPlayedAt', Date.now());
//       }
//     });
//     homeTL.play();
//     //console.log('play');
//   }
//    else {
//     //console.log('no play');
//     body.classList.remove('overflow-hidden');
//     if (blackBG && textLinesHero && modalHero) {
//       blackBG.classList.add('transition-hidden');
//       modalHero.classList.remove('hidden');
//       textLinesHero.classList.add('z-50');
//     }
//     window.setTimeout(function(){

//       AOS.init({
//         offset: 0,
//         duration: 600,
//         easing: 'ease-in-sine',
//         anchorPlacement: 'top-bottom'
//       });
//     }, 500);
//   }

  
// const lightbox = GLightbox({});

window.Alpine = Alpine
Alpine.start()



// const formsWithAnimatedLabels = document.querySelectorAll(
//   ".formGeneral, .formNewsletter"
// );
// const focusedClass = "focused";
// for (const form of formsWithAnimatedLabels) {
//   const formControls = form.querySelectorAll(
//     '[type="text"], [type="email"], [type="tel"]'
//   );
//   for (const formControl of formControls) {
//     formControl.addEventListener("focus", function () {
//       this.parentElement.nextElementSibling.classList.add(focusedClass);
//     });
//     formControl.addEventListener("blur", function () {
//       if (!this.value) {
//         this.parentElement.nextElementSibling.classList.remove(
//           focusedClass
//         );
//       }
//     });
//   }
//   form.parentElement.addEventListener("wpcf7mailsent", function () {
//     const labels = document.querySelectorAll(".focused");
//     for (const label of labels) {
//       label.classList.remove(focusedClass);
//     }
//   });
// }

const reviewDivs = document.querySelectorAll('.review');
for (let i = 0; i < reviewDivs.length; i++) {
  const review = reviewDivs[i];
  const shortText = review.querySelector('.short-text');
  const fullText = review.querySelector('.full-text');
  const showMoreBtn = review.querySelector('.show-more');

  if (showMoreBtn) {
    showMoreBtn.addEventListener('click', function (e) {
      e.preventDefault();
      shortText.classList.add('hidden');
      fullText.classList.remove('hidden');
      showMoreBtn.classList.add('hidden');
    });
  }
}


$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function (event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 50
        }, 500, function () {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
const main = async (err) => {


  if (err) {
    // handle hmr errors
    console.error(err);
  }

  let lazyLoad = new LazyLoad({
    elements_selector: "[data-lazy]",
    load_delay: 300,
  });

  let header = new Header();
  header.init();

  let carousels = new Carousels();
  carousels.init();

  // let video = new VideoPlay();
  // video.init();



  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
