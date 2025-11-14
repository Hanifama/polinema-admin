const sliderEffectConfig = {
  effect: "creative",
  creativeEffect: {
    limitProgress: 3,
    prev: {
      // will set `translateZ(-400px)` on previous slides
      translate: ["-100%", 0, 100],
      rotate: [0, 20, 0],
    },
    next: {
      // will set `translateX(100%)` on next slides
      translate: ["100%", 0, 100],
      rotate: [0, -20, 0],
    },
    perspective: true,
  },
};

const optionalParamtersConfig = {
  // Optional parameters
  breakpoints: {
    320: {
      slidesPerView: 2,
      width: 600,
    },
    940: {
      slidesPerView: 5,
    },
  },

  centeredSlides: true,
  //   slideToClickedSlide: true,

  direction: "horizontal",
  loop: true,
  speed: 1000,
  spaceBetween: 30,
  autoplay: {
    delay: 3000,
  },
};

const paginationConfig = {
  pagination: {
    el: ".swiper-pagination",
  },
};

const navigationConfig = {
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
};

const scrollbarConfig = {
  scrollbar: {
    el: ".swiper-scrollbar",
  },
};

const swiper = new Swiper(".swiper", {
  // Main Effect
  ...sliderEffectConfig,

  ...optionalParamtersConfig,

  // If we need pagination
  //   ...paginationConfig,

  //   Navigation arrows
  //   ...navigationConfig,

  // And if we need scrollbar
  //   ...scrollbarConfig,
});

swiper.on("slideChange", function () {
  // swiper-slide-active
  let swiperWrapper = document.querySelector(".swiper-wrapper");
  let imageItems = swiperWrapper.querySelectorAll(".swiper-slide");
  let activeIndex = this.activeIndex;

  imageItems.forEach((item, index) => {
    let imgElement = item.querySelector("img");
    if (activeIndex == index) {
      setTimeout(() => {
        imgElement.src = imgElement.getAttribute("data-active");
      }, 500);
    } else {
      setTimeout(() => {
        imgElement.src = imgElement.getAttribute("data-inactive");
      }, 500);
    }
  });
});
