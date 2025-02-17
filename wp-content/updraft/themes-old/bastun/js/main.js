var windowOn = window;

////////////////////////////////////////////////////
//preloader
windowOn.addEventListener('load', function() {
    var backPreloader = document.getElementById('back__preloader');
    setTimeout(function() {
        backPreloader.style.display = 'none';
    }, 1000);
});

//Herobanner Slider
var swiper = new Swiper(".herobanner__slider__active", {
  grabCursor: true,
  slidesPerView: 1,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  }
});

//testimonial Slider (Testimonial)
var swiper = new Swiper(".testimonial__slider__active", {
  grabCursor: true,
  pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
  navigation: { 
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  }
});




var swiper = new Swiper(".testimonial__slider__active__2", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 1,
      },

      992: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 2
      },
      1500: {
          slidesPerView: 2
      }
  },
});




var swiper = new Swiper(".testimonial__3__slider__active", {
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 3,
  breakpoints: {
      350: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 2,
      },
      1200: {
        slidesPerView: 3,
      },
      1500: {
          slidesPerView: 3,
      }
  },
});



var swiper = new Swiper(".team__slider__active", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4
      },
      1500: {
          slidesPerView: 4
      }
  },
});

var swiper = new Swiper(".hero__simple__slider__active", {
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 1,
      },

      992: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 1
      },
      1500: {
          slidesPerView: 1
      }
  },
});


var swiper = new Swiper(".project__slider__active", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3
      },
      1500: {
          slidesPerView: 3
      }
  },
});

var swiper = new Swiper(".service__slider__active", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      500: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4
      },
      1500: {
          slidesPerView: 4
      }
  },
});



var swiper = new Swiper(".featured__course", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 2,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 3
      },
      1500: {
          slidesPerView: 4
      }
  },
});


  //Details Product Gallery
  var swiper = new Swiper(".details__gallery", {
    spaceBetween: 10,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".details__gallery__big", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

//Modal Gallery
var swiper2 = new Swiper(".modal__gallery__big", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".modal__gallery", {
  spaceBetween: 10,
  slidesPerView: 5,
  freeMode: true,
  watchSlidesProgress: true,
});




//  Sticky header
function TopOffset(el) {
  let rect = el.getBoundingClientRect(),
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return { top: rect.top + scrollTop };
}
function ScrollSticky(){
  const headerStickyWrapper = document.querySelector('header');
  const headerStickyTarget = document.querySelector('.header__sticky');

  if(headerStickyTarget){
    window.addEventListener('scroll', function(){
      let StickyTargetElement = TopOffset(headerStickyWrapper);
      let TargetElementTopOffset = StickyTargetElement.top;

      if(window.scrollY > TargetElementTopOffset ){
        headerStickyTarget.classList.add('sticky');
      }else{
        headerStickyTarget.classList.remove('sticky');
      }
    })
  }
}
ScrollSticky();





// glightbox Activation
const customLightboxHTML = `<div id="glightbox-body" class="glightbox-container">
    <div class="gloader visible"></div>
    <div class="goverlay"></div>
    <div class="gcontainer">
    <div id="glightbox-slider" class="gslider"></div>
    <button class="gnext gbtn" tabindex="0" aria-label="Next" data-customattribute="example">{nextSVG}</button>
    <button class="gprev gbtn" tabindex="1" aria-label="Previous">{prevSVG}</button>
    <button class="gclose gbtn" tabindex="2" aria-label="Close">{closeSVG}</button>
    </div>
    </div>`;
const lightbox = GLightbox({
  touchNavigation: true,
  lightboxHTML: customLightboxHTML,
  loop: true,
});




// CounterUp Activation
const wrapper = document.getElementById("funfactId");
if (wrapper) {
  const counters = wrapper.querySelectorAll(".js-counter");
  const duration = 1000;

  let isCounted = false;
  document.addEventListener("scroll", function () {
    const wrapperPos = wrapper.offsetTop - window.innerHeight;
    if (!isCounted && window.scrollY > wrapperPos) {
      counters.forEach((counter) => {
        const countTo = counter.dataset.count;

        const countPerMs = countTo / duration;

        let currentCount = 0;
        const countInterval = setInterval(function () {
          if (currentCount >= countTo) {
            clearInterval(countInterval);
          }
          counter.textContent = Math.round(currentCount);
          currentCount = currentCount + countPerMs;
        }, 1);
      });
      isCounted = true;
    }
  });
}






/* Slide Up */
var slideUp = (target, time) => {
  const duration = time ? time : 500;
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.boxSizing = "border-box";
  target.style.height = target.offsetHeight + "px";
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};

/* Slide Down */
var slideDown = (target, time) => {
  const duration = time ? time : 500;
  target.style.removeProperty("display");
  let display = window.getComputedStyle(target).display;
  if (display === "none") display = "block";
  target.style.display = display;
  const height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = height + "px";
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};






/* Offcanvas Mobile Menu Function */
const offcanvasHeader = function () {
  const offcanvasOpen = document.querySelector(
      ".offcanvas__header--menu__open--btn"
    ),
    offcanvasClose = document.querySelector(".offcanvas__close--btn"),
    offcanvasHeader = document.querySelector(".offcanvas__header"),
    offcanvasMenu = document.querySelector(".offcanvas__menu"),
    body = document.querySelector("body");
  /* Offcanvas SubMenu Toggle */
  if (offcanvasMenu) {
    offcanvasMenu
      .querySelectorAll(".offcanvas__sub_menu")
      .forEach(function (ul) {
        const subMenuToggle = document.createElement("button");
        subMenuToggle.classList.add("offcanvas__sub_menu_toggle");
        ul.parentNode.appendChild(subMenuToggle);
      });
  }
  /* Open/Close Menu On Click Toggle Button */
  if (offcanvasOpen) {
    offcanvasOpen.addEventListener("click", function (e) {
      e.preventDefault();
      if (e.target.dataset.offcanvas != undefined) {
        offcanvasHeader.classList.add("open");
        body.classList.add("mobile_menu_open");
      }
    });
  }
  if (offcanvasClose) {
    offcanvasClose.addEventListener("click", function (e) {
      e.preventDefault();
      if (e.target.dataset.offcanvas != undefined) {
        offcanvasHeader.classList.remove("open");
        body.classList.remove("mobile_menu_open");
      }
    });
  }

  /* Mobile submenu slideToggle Activation */
  let mobileMenuWrapper = document.querySelector(".offcanvas__menu_ul");
  if (mobileMenuWrapper) {
    mobileMenuWrapper.addEventListener("click", function (e) {
      let targetElement = e.target;
      if (targetElement.classList.contains("offcanvas__sub_menu_toggle")) {
        const parent = targetElement.parentElement;
        if (parent.classList.contains("active")) {
          targetElement.classList.remove("active");
          parent.classList.remove("active");
          parent
            .querySelectorAll(".offcanvas__sub_menu")
            .forEach(function (subMenu) {
              subMenu.parentElement.classList.remove("active");
              subMenu.nextElementSibling.classList.remove("active");
              slideUp(subMenu);
            });
        } else {
          targetElement.classList.add("active");
          parent.classList.add("active");
          slideDown(targetElement.previousElementSibling);
          getSiblings(parent).forEach(function (item) {
            item.classList.remove("active");
            item
              .querySelectorAll(".offcanvas__sub_menu")
              .forEach(function (subMenu) {
                subMenu.parentElement.classList.remove("active");
                subMenu.nextElementSibling.classList.remove("active");
                slideUp(subMenu);
              });
          });
        }
      }
    });
  }

  if (offcanvasHeader) {
    document.addEventListener("click", function (event) {
      if (
        !event.target.closest(".offcanvas__header--menu__open--btn") &&
        !event.target.classList.contains(
          ".offcanvas__header--menu__open--btn".replace(/\./, "")
        )
      ) {
        if (
          !event.target.closest(".offcanvas__header") &&
          !event.target.classList.contains(
            ".offcanvas__header".replace(/\./, "")
          )
        ) {
          offcanvasHeader.classList.remove("open");
          body.classList.remove("mobile_menu_open");
        }
      }
    });
  }

  /* Remove Mobile Menu Open Class & Hide Mobile Menu When Window Width in More Than 991 */
  if (offcanvasHeader) {
    window.addEventListener("resize", function () {
      if (window.outerWidth >= 992) {
        offcanvasHeader.classList.remove("open");
        body.classList.remove("mobile_menu_open");
      }
    });
  }
};
offcanvasHeader();






  /* ----------------------------
      AOS Scroll Animation 
  -------------------------------*/
  AOS.init({
      offset: 40,
      duration: 1000,
      once: true,
      easing: 'ease',
  });



  var buttonsPlus = document.querySelectorAll(".qty-btn-plus");
  var buttonsMinus = document.querySelectorAll(".qty-btn-minus");
  
  buttonsPlus.forEach(function(buttonPlus) {
    buttonPlus.addEventListener("click", function() {
      var $n = this
        .closest(".qty-container")
        .querySelector(".input-qty");
      $n.value = Number($n.value) + 1;
    });
  });
  
  buttonsMinus.forEach(function(buttonMinus) {
    buttonMinus.addEventListener("click", function() {
      var $n = this
        .closest(".qty-container")
        .querySelector(".input-qty");
      var amount = Number($n.value);
      if (amount > 1) {
        $n.value = amount - 1;
      }
    });
  });
  



/* Slidebar collapse */ 
if (window.innerWidth < 991) {
  const sidebarCollapseBtns = document.querySelectorAll('.sidebar-collapse-btn');
  sidebarCollapseBtns.forEach(btn => {
    btn.addEventListener("click", function() {
      const sibling = this.nextElementSibling;
      sibling.style.display = sibling.style.display === 'block' ? 'none' : 'block';
      this.classList.toggle('sidebar-collapse-show');
    });
  });
}



// Dark to light mode js
const lightToDarkButton = document.getElementById("light--to-dark-button");
lightToDarkButton?.addEventListener("click", function () {
    if (localStorage.getItem("theme-color")) {
      if (localStorage.getItem("theme-color") === "light") {
        document.documentElement.classList.add("is_dark");
        localStorage.setItem("theme-color", "dark");
        lightToDarkButton?.classList.add("dark--mode");
      } else {
        document.documentElement.classList.remove("is_dark");
        localStorage.setItem("theme-color", "light");
        lightToDarkButton?.classList?.remove("dark--mode");
      }
    } else {
      if (document.documentElement.classList.contains("is_dark")) {
        document.documentElement.classList.remove("is_dark");
        lightToDarkButton?.classList?.remove("dark--mode");
        localStorage.setItem("theme-color", "light");
      } else {
        document.documentElement.classList.add("is_dark");
        localStorage.setItem("theme-color", "dark");
        lightToDarkButton?.classList.add("dark--mode");
      }
    }
});


jQuery( document ).ready( function( $ ) {
    'use strict';
    $('body').on('click', '.remove_from_cart_button', function(e) {
        e.preventDefault();
        var product_id = $(this).data('product_id');
        var product_sku = $(this).data('product_sku');
        var cart_item_key = $(this).data('cart_item_key');
        var button = $(this);

        $.ajax({
            type: 'POST',
            url: wc_cart_params.ajax_url, 
            data: {
                action: 'woocommerce_remove_cart_item',
                cart_item_key: cart_item_key
            },
            success: function(response) {
                
                button.closest('.cart_item').fadeOut();
                
            }
        });
    });
});