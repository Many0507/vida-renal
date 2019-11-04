const nextBtn = document.querySelector('.swiper-button-next');
const prevBtn = document.querySelector('.swiper-button-prev');
const noSwiper = document.querySelector('.swiper-no_slider');
const swiper = document.getElementById('swiper');
const editor = document.querySelector('#editor');
const createBtn = document.getElementById('create');
const closeBtn = document.getElementById('close');
const closeUpdate = document.getElementById('close-update');
const update = document.querySelectorAll('.update');
const formContainer = document.getElementById('form-container');
const formContainerUpdate = document.getElementById('form-container--update');
const formUpdate = document.getElementById('form--update');
const message = document.getElementById('message');
const submitBtn = document.getElementById('submit');
const updateBtn = document.querySelectorAll('.update-btn');
const deleteBtn = document.querySelectorAll('.delete-btn');
const x = window.matchMedia('(max-width: 768px)');
let formData;
let confirm;
let slidePerView;

// delete axios
if (deleteBtn != null) {
	deleteBtn.forEach(btn => {
		btn.addEventListener('click', async e => {
			confirm = window.confirm("¿Desea eliminar la actividad?");
			if (confirm) {
				const id = btn.id.split('-')[1];
				await axios.delete(`${window.location.href}/${id}`);
				location.reload();
			}
		})
	})
}

// update form
if (updateBtn != null) {
	updateBtn.forEach(btn => {
		btn.addEventListener('click', e => {
			formContainerUpdate.style.top = '0';
			const id = btn.id.split('-')[1];
			formUpdate.action = ''
			formUpdate.action = `/admin/actividades/${id}`;
		});
		closeUpdate.addEventListener('click', e => {
			e.preventDefault();
			formContainerUpdate.style.top = '-200vh';
		});
		formContainerUpdate.addEventListener('click', e => {
			if (e.target.id == 'form-container--update') {
				formContainerUpdate.style.top = '-200vh';
			}
		})
	});
}

// Editor textarea
if (editor != null) {
	ClassicEditor.create(editor).catch(error => {
		console.error(error);
	});
}

// Btns
if (createBtn != null) {
	createBtn.addEventListener('click', e => {
		formContainer.style.top = '0';
	});
	if (closeBtn != null) {
		closeBtn.addEventListener('click', e => {
			e.preventDefault();
			formContainer.style.top = '-100vh';
		});
	}
	formContainer.addEventListener('click', e => {
		if (e.target.id == 'form-container') {
			formContainer.style.top = '-100vh';
		}
	});
}

// Media query for buttons
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

// Swipers
if (swiper != null) {
	new Swiper('#swiper', {
		slidesPerView: slidePerView,
		spaceBetween: 20,
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
		loop: false,
		autoplay: {
			delay: 5000
		}
	});
}

// Navbar hamburguer menu
const navbarBtn = document.getElementById('navbar-btn');
const navbar = document.getElementById('navbar');
navbarBtn.addEventListener('click', e => {
	navbar.classList.toggle('navbar-menu--active');
});

// Form file, change file
const fileInput = document.querySelector('#fileJs input[type=file]');
if (fileInput != null) {
	fileInput.onchange = () => {
		if (fileInput.files.length > 0) {
			const fileName = document.querySelector('#fileJs .file-name');
			fileName.textContent = fileInput.files[0].name;
		}
	};
}

const fileInputUpdate = document.querySelector('#fileJsUpdate input[type=file]');
if (fileInputUpdate != null) {
	fileInputUpdate.onchange = () => {
		if (fileInputUpdate.files.length > 0) {
			const fileNameUpdate = document.querySelector('#fileJsUpdate .file-name');
			fileNameUpdate.textContent = fileInputUpdate.files[0].name;
		}
	};
}

// delete btn
document.addEventListener('DOMContentLoaded', () => {
	(document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
	  $notification = $delete.parentNode;
	  $delete.addEventListener('click', () => {
		$notification.parentNode.removeChild($notification);
	  });
	});
  });