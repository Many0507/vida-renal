const nextBtn = document.querySelector(".swiper-button-next");
const prevBtn = document.querySelector(".swiper-button-prev");
const x = window.matchMedia("(max-width: 768px)");
let slidePerView;

const mediaQuery = x => {
  if (x.matches) {
    slidePerView = 1;
    if (nextBtn && prevBtn) {
      nextBtn.style.display = "none";
      prevBtn.style.display = "none";
    }
  } else {
    slidePerView = 3;
  }
};

mediaQuery(x);
x.addListener(mediaQuery);

const swiper = new Swiper("#swiper", {
  slidesPerView: slidePerView,
  spaceBetween: 20,
  // slidesPerGroup: slidePerView,
  loop: true,
  loopFillGroupWithBlank: false,
  autoplay: {
    delay: 5000
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});

const swiper_noSlider = new Swiper(".swiper-no_slider", {
  slidesPerView: slidePerView,
  spaceBetween: 20,
  slidesPerGroup: slidePerView,
  loop: false,
  autoplay: {
    delay: 5000
  }
});

const navbarBtn = document.getElementById("navbar-btn");
const navbar = document.getElementById("navbar");
navbarBtn.addEventListener("click", e => {
  navbar.classList.toggle("navbar-menu--active");
});
