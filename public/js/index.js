const nextBtn = document.querySelector('.swiper-button-next');
const prevBtn = document.querySelector('.swiper-button-prev');
const noSwiper = document.querySelector('.swiper-no_slider');
const swiper = document.getElementById('swiper');
const editor = document.querySelector('#editor');
const actividadBtn = document.getElementById('actividad-submit');
const x = window.matchMedia('(max-width: 768px)');
let slidePerView;

if (editor != null) {
	ClassicEditor.create(editor).catch(error => {
		console.error(error);
	});
	actividadBtn.addEventListener('click', e => {
		e.preventDefault();
	});
}

const mediaQuery = x => {
	if (x.matches) {
		slidePerView = 1;
		if (nextBtn && prevBtn) {
			nextBtn.style.display = 'none';
			prevBtn.style.display = 'none';
		}
	}
	else {
		slidePerView = 3;
	}
};

mediaQuery(x);
x.addListener(mediaQuery);

if (swiper != null) {
	new Swiper('#swiper', {
		slidesPerView: slidePerView,
		spaceBetween: 20,
		// slidesPerGroup: slidePerView,
		loop: true,
		loopFillGroupWithBlank: false,
		autoplay: {
			delay: 5000
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev'
		}
	});
}

if (noSwiper != null) {
	new Swiper('.swiper-no_slider', {
		slidesPerView: slidePerView,
		spaceBetween: 20,
		slidesPerGroup: slidePerView,
		loop: false,
		autoplay: {
			delay: 5000
		}
	});
}

const navbarBtn = document.getElementById('navbar-btn');
const navbar = document.getElementById('navbar');
navbarBtn.addEventListener('click', e => {
	navbar.classList.toggle('navbar-menu--active');
});

const fileInput = document.querySelector('#file-js-example input[type=file]');
fileInput.onchange = () => {
	if (fileInput.files.length > 0) {
		const fileName = document.querySelector('#file-js-example .file-name');
		fileName.textContent = fileInput.files[0].name;
	}
};
