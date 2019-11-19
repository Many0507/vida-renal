const nextBtn = document.querySelector('.swiper-button-next');
const prevBtn = document.querySelector('.swiper-button-prev');
const noSwiper = document.querySelector('.swiper-no_slider');
const swiper = document.getElementById('swiper');
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
let autoplay;

// tooltip
if (document.querySelectorAll('.tooltip').length > 0) {
	tippy('.tooltip');
}

// delete axios
if (deleteBtn != null) {
	deleteBtn.forEach(btn => {
		btn.addEventListener('click', async e => {
			confirm = window.confirm('¿Desea eliminar el elemento?');
			if (confirm) {
				const id = btn.id.split('-')[1];
				await axios.delete(`${window.location.href}/${id}`);
				location.reload();
			}
		});
	});
}

// update form
if (updateBtn != null) {
	updateBtn.forEach(btn => {
		btn.addEventListener('click', async e => {
			const id = btn.id.split('-')[1];
			const data = await axios.get(`${window.location.href}/${id}`);
			document.getElementById('titulo').value = data.data.titulo;
			document.getElementById('texto').value = data.data.texto;

			formContainerUpdate.style.top = '0';
			formUpdate.action = '';
			formUpdate.action = `${window.location.href}/${id}`;
		});
		closeUpdate.addEventListener('click', e => {
			e.preventDefault();
			formContainerUpdate.style.top = '-200vh';
		});
		formContainerUpdate.addEventListener('click', e => {
			if (e.target.id == 'form-container--update') {
				formContainerUpdate.style.top = '-200vh';
			}
		});
	});
}

// Editor textarea
// if (editor != null) {
// 	ClassicEditor.create(editor).catch(error => {
// 		console.error(error);
// 	});
// }

const editor = document.getElementById('editor');
if (editor != null) {
	DecoupledEditor.create(editor)
		.then(editor => {
			const toolbarContainer = document.querySelector('#toolbar-container');
			toolbarContainer.appendChild(editor.ui.view.toolbar.element);
		})
		.catch(error => {
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
			formContainer.style.top = '-200vh';
		});
	}
	formContainer.addEventListener('click', e => {
		if (e.target.id == 'form-container') {
			formContainer.style.top = '-200vh';
		}
	});
}

// Media query for buttons
const mediaQuery = x => {
	if (x.matches) {
		slidePerView = 1;
		autoplay = {
			delay: 5000
		}
		if (nextBtn && prevBtn) {
			nextBtn.style.display = 'none';
			prevBtn.style.display = 'none';
		}
	}
	else {
		autoplay = false;
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
		loop: true,
		autoplay: autoplay
	});
}

// Navbar hamburguer menu
const navbarBtn = document.getElementById('navbar-btn');
const navbar = document.getElementById('navbar');
if (navbarBtn != null) {
	navbarBtn.addEventListener('click', e => {
		navbar.classList.toggle('navbar-menu--active');
	});
}
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

const blogSaveContent = document.querySelector('.blog-content-save');
if (blogSaveContent != null) {
	blogSaveContent.addEventListener('click', async e => {
		e.preventDefault();
		const id = blogSaveContent.id.split('-')[1];
		const data = await axios.patch(`http://localhost:8000/admin/blog-content/${id}`, {
			texto: editor.innerHTML
		});
		
		if (data) {
			document.getElementById('notification').style.display = 'block';
		}
	});
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
	(document.querySelectorAll('.notification .delete') || []).forEach($delete => {
		$notification = $delete.parentNode;
		$delete.addEventListener('click', () => {
			$notification.parentNode.removeChild($notification);
		});
	});
});

//
const navbarContent = document.getElementById('navbar-C');
if (navbarContent != null) {
	window.addEventListener('scroll', function (e) {
		if (window.scrollY > 0) {
			navbarContent.style.boxShadow = '1px 1px 5px #000';
		}
		else navbarContent.style.boxShadow = 'none';
	});
}
