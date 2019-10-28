const nextBtn = document.querySelector('.swiper-button-next');
const prevBtn = document.querySelector('.swiper-button-prev');
const x = window.matchMedia('(max-width: 768px)');
let slidesPerView = 3;

const mediaQuery = x => {
	if (x.matches) {
		slidesPerView = 1;
		if (nextBtn && prevBtn) {
			nextBtn.style.display = 'none';
			prevBtn.style.display = 'none';
		}
	}
};
mediaQuery(x);
x.addListener(mediaQuery);

// Swiper Slider
const swiper = new Swiper('#swiper', {
	slidesPerView: slidesPerView,
	spaceBetween: 30,
	slidesPerGroup: slidesPerView,
	loop: true,
	loopFillGroupWithBlank: true,
	autoplay: {
		delay: 5000
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev'
	}
});
const swiper_noSlider = new Swiper('.swiper-no_slider', {
	slidesPerView: slidesPerView,
	spaceBetween: 30,
	slidesPerGroup: slidesPerView,
	loop: false,
	autoplay: {
		delay: 5000
	}
});

const navbarBtn = document.getElementById('navbar-btn');
const navbar = document.getElementById('navbar');
navbarBtn.addEventListener('click', e => {
	navbar.classList.toggle('navbar-menu--active');
});
