import Component from "./Component";
import Swiper from 'swiper';
import gsap from "gsap";

export default class Carousels extends Component {
  constructor() {
    super();
    this.heroSlider = document.querySelectorAll('.home__hero') !== null;
    this.realizationSlider = document.querySelectorAll('.home__realizacje') !== null;
    this.testimonialSlider = document.querySelectorAll('.home__testimonials') !== null;
    this.referencesSlider = document.querySelectorAll('.home__testimonials') !== null;
    this.aboutSlider = document.querySelectorAll('.about__hero') !== null;
    this.offerSlider = document.querySelectorAll('.offer__tabs') !== null;

  }
  init() {
    if (this.heroSlider) {
      document.querySelectorAll('.swiperHero').forEach(el => {
        let heroSwiper = new Swiper(el, {
          simulateTouch: true,
          slidesPerView: 1,
          speed: 2000,
          loop: true,
          slideToClickedSlide: true,
          loopFillGroupWithBlank: true,
          autoplay: {
            delay: 4000,
            pauseOnMouseEnter: true,
          },
          keyboard: {
            enabled: true,
          },
          on: {
            init: function () {
              gsap.fromTo(
                el.querySelector('.swiper-slide-active .box'),
                { opacity: 0, y: 100 },
                { opacity: 1, y: 0, duration: 0.8, delay: 0 } // Adjusted delay to 0.2 seconds
              );

              gsap.set(
                el.querySelector('.swiper-slide-next .box'),
                { opacity: 0, y: -100 } // Set initial opacity to 0 and y position to -100
              );
            },
            slideChangeTransitionStart: function () {
              gsap.fromTo(
                this.slides[this.previousIndex].querySelector('.box'),
                { opacity: 1, y: 0 },
                { opacity: 0, y: -100, duration: 0.8 } // Adjusted duration to 0.5 seconds
              );
            },
            slideChange: function () {
              gsap.fromTo(
                this.slides[this.activeIndex].querySelector('.box'),
                { opacity: 0, y: 100 },
                { opacity: 1, y: 0, duration: 0.8, delay: 0.8 } // Adjusted duration to 0.5 seconds
              );
            }
          }
        });

        const prevBtn = document.querySelector('.heroSwiper__nav--prev');
        const nextBtn = document.querySelector('.heroSwiper__nav--next');

        if (prevBtn != null) {
          prevBtn.addEventListener('click', () => {
            heroSwiper.slidePrev()
          }, false);
        }

        if (nextBtn != null) {
          nextBtn.addEventListener('click', () => {
            heroSwiper.slideNext()
          }, false);
        }
      });
    }



    if (this.realizationSlider) {
      document.querySelectorAll('.swiperRealizacje').forEach(el => {

        let swiperRealizacje = new Swiper(el, {
          simulateTouch: false,
          slidesPerView: 1,
          spaceBetween: 20,
          centeredSlides: true,
          centeredSlidesBounds: true,
          speed: 1000,
          loop: false,
          autoplay: {
            delay: 4000,
            pauseOnMouseEnter: true,
          },
          breakpoints: {
            768: {
              slidesPerView: 2,
              spaceBetween: 20,
              centeredSlides: true,
              centeredSlidesBounds: true,
            },
            1024: {
              slidesPerView: 2,
              spaceBetween: 20,
              centeredSlides: true,
              centeredSlidesBounds: true,
            },
            1366: {
              slidesPerView: 2.40,
              spaceBetween: calculateSlideSpace(),
              centeredSlides: false,
              centeredSlidesBounds: true,
            },
          },

        });
        function calculateSlideSpace() {

          const spacePercentage = (174 / 1674) * 100;
          return `${spacePercentage}%`;
        }
        const prevBtn = document.querySelector('.swiperRealizacje__nav--prev');
        const prevBtnMobile = document.querySelector('.swiperRealizacje__nav--prev-mobile');
        const nextBtn = document.querySelector('.swiperRealizacje__nav--next');
        const nextBtnMobile = document.querySelector('.swiperRealizacje__nav--next-mobile');

        updateNavigation();
        if (window.matchMedia("(max-width: 1024px)").matches) {
          if (prevBtnMobile) {
            prevBtnMobile.addEventListener('click', () => {
              swiperRealizacje.slidePrev();
              updateNavigation();
            }, false);
          }
  
          if (nextBtnMobile) {
            nextBtnMobile.addEventListener('click', () => {
              swiperRealizacje.slideNext();
              updateNavigation();
            }, false);
          }
        } else {
          if (prevBtn) {
            prevBtn.addEventListener('click', () => {
              swiperRealizacje.slidePrev();
              updateNavigation();
            }, false);
          }
  
          if (nextBtn) {
            nextBtn.addEventListener('click', () => {
              swiperRealizacje.slideNext();
              updateNavigation();
            }, false);
          }
        }
        

        function updateNavigation() {
          if (swiperRealizacje.isBeginning) {
            prevBtn.classList.add('disabled');
            prevBtn.classList.remove('swiper-button');
          } else {
            prevBtn.classList.remove('disabled');
            prevBtn.classList.add('swiper-button');
          }

          if (swiperRealizacje.isEnd) {
            nextBtn.classList.add('disabled');
            nextBtn.classList.remove('swiper-button');
          } else {
            nextBtn.classList.remove('disabled');
            nextBtn.classList.add('swiper-button');
          }
        }
      });
    }
    if (this.testimonialSlider) {
      document.querySelectorAll('.swiperOpinie').forEach(el => {

        let slidesPerViewValue = 1;
        const noFrontPage = !document.body.classList.contains('home');

        if (noFrontPage) {
          slidesPerViewValue = 1;
        } else {
          slidesPerViewValue = 2;
        }

        let testimonialSwiper = new Swiper(el, {
          simulateTouch: false,
          slidesPerView: 1,
          spaceBetween: 20,
          speed: 1000,
          loop: true,
          autoplay: {
            delay: 4000,
            pauseOnMouseEnter: true,
          },
          breakpoints: {
            // when window width is >= 480px
            480: {
              slidesPerView: 1,
              spaceBetween: 20,
            },
            // when window width is >= 640px
            640: {
              slidesPerView: slidesPerViewValue,
              spaceBetween: 20,
            },
            768: {
              slidesPerView: slidesPerViewValue,
              spaceBetween: 20,
            },
            1024: {
              slidesPerView: 1,
              spaceBetween: 20
            },
            1366: {
              slidesPerView: slidesPerViewValue,
              spaceBetween: 20
            },
            1400: {
              slidesPerView: slidesPerViewValue,
              spaceBetween: 20
            },
          },
        });

        const prevBtn = document.querySelector('.testimonialSwiper__nav--prev'),
          nextBtn = document.querySelector('.testimonialSwiper__nav--next');
        if (prevBtn != null) {
          prevBtn.addEventListener('click', () => {
            testimonialSwiper.slidePrev()
          }, false);
        }

        if (nextBtn != null) {
          nextBtn.addEventListener('click', () => {
            testimonialSwiper.slideNext()
          }, false);
        }
      });
    }



    if (this.referencesSlider) {
      document.querySelectorAll('.swiperReferences').forEach(el => {

        let referencesSwiper = new Swiper(el, {
          simulateTouch: false,
          slidesPerView: 1,

          spaceBetween: 20,
          speed: 1000,
          loop: true,
        });

        const prevBtn = document.querySelector('.swiperReferences__nav--prev'),
          nextBtn = document.querySelector('.swiperReferences__nav--next');

        if (prevBtn != null) {
          prevBtn.addEventListener('click', () => {
            referencesSwiper.slidePrev()
          }, false);
        }

        if (nextBtn != null) {
          nextBtn.addEventListener('click', () => {
            referencesSwiper.slideNext()
          }, false);
        }
      });
    }
    if (this.aboutSlider) {
      document.querySelectorAll('.swiperAbout').forEach(el => {
        const slideCount = el.querySelectorAll('.swiper-slide').length;
        const centeredSlides = slideCount === 1;
        let aboutSwiper = new Swiper(el, {
          simulateTouch: false,
          slidesPerView: 1,
          spaceBetween: 20,
          speed: 1000,
          loop: true,
        });

        const prevBtn = document.querySelector('.swiperAbout__nav--prev'),
          nextBtn = document.querySelector('.swiperAbout__nav--next');

        if (centeredSlides) { // If there's only one slide, hide the navigation buttons
          prevBtn.style.display = 'none';
          nextBtn.style.display = 'none';
        }

        if (prevBtn != null) {
          prevBtn.addEventListener('click', () => {
            aboutSwiper.slidePrev()
          }, false);
        }

        if (nextBtn != null) {
          nextBtn.addEventListener('click', () => {
            aboutSwiper.slideNext()
          }, false);
        }

      });
    }
    if (this.offerSlider) {
      const swiperContainers = document.querySelectorAll(".swiper-container");

      swiperContainers.forEach((container) => {
        const slideCount = container.querySelectorAll('.swiper-slide').length;
        const centeredSlides = slideCount === 1;
        let offerSwiper = new Swiper(container.querySelector('.swiperContain'), {
          simulateTouch: false,
          slidesPerView: 1,
          centeredSlides: centeredSlides,
          speed: 1000,
          spaceBetween: 20,
          breakpoints: {
            // when window width is >= 480px
            480: {
              slidesPerView: 1,
              spaceBetween: 20,
              centeredSlides: true,
            },
            // when window width is >= 640px
            640: {
              slidesPerView: 1,
              spaceBetween: 20,
              centeredSlides: true,
            },
            768: {
              slidesPerView: 1,
              spaceBetween: 20,
              centeredSlides: true,
            },
            1024: {
              slidesPerView: 2,
              spaceBetween: 20
            },
            1366: {
              slidesPerView: 3,
              spaceBetween: 20
            },
            1400: {
              slidesPerView: 3,
              spaceBetween: 20
            },
          },
          on: {
            init: function () {
              // Add the 'visible-slide' class to the initially visible slides
              this.slides.forEach((slide, index) => {
                if (index >= this.activeIndex && index < this.activeIndex + this.params.slidesPerView) {
                  slide.classList.add('visible-slide');
                }
              });
            },
            slideChange: function () {
              this.slides.forEach(slide => {
                slide.classList.remove('visible-slide');
              });

              // Add the 'visible-slide' class to the currently visible slides
              this.slides.forEach((slide, index) => {
                if (index >= this.activeIndex && index < this.activeIndex + this.params.slidesPerView) {
                  slide.classList.add('visible-slide');
                }
              });
            }
          }
        });

        const prevBtn = container.querySelector('.swiperContain__nav--prev');
        const prevBtnMobile = container.querySelector('.swiperContain__nav--prev-mobile');
        const nextBtn = container.querySelector('.swiperContain__nav--next');
        const nextBtnMobile = container.querySelector('.swiperContain__nav--next-mobile');
        const swiperContainButtonsMobile = container.querySelector('.swiperContainButtonsMobile');
        
        if (window.matchMedia("(max-width: 1024px)").matches) {
          if (prevBtnMobile != null) {
            prevBtnMobile.addEventListener('click', () => {
              console.log('prev-mobile');
              offerSwiper.slidePrev()
            }, false);
          }
        
          if (nextBtnMobile != null) {
            nextBtnMobile.addEventListener('click', () => {
              console.log('next-mobile');
              offerSwiper.slideNext()
            }, false);
          }
        } else {
          if (prevBtn != null) {
            prevBtn.addEventListener('click', () => {
              console.log('prev');
              offerSwiper.slidePrev()
            }, false);
          }
        
          if (nextBtn != null) {
            nextBtn.addEventListener('click', () => {
              console.log('next');

              offerSwiper.slideNext()
            }, false);
          }
        }

        if (centeredSlides) { // If there's only one slide, hide the navigation buttons
      
          prevBtn.style.display = 'none';
          swiperContainButtonsMobile.style.display = 'none';
          prevBtnMobile.style.display = 'none';
          nextBtn.style.display = 'none';
          nextBtnMobile.style.display = 'none';
        }
      });
    }


  }
}
