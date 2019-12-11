// Variables //
let formData, confirm, slidePerView, autoplay;

// Swiper Js //
const swiper = document.getElementById('swiper');
const noSwiper = document.querySelector('.swiper-no_slider');
const nextBtn = document.querySelector('.swiper-button-next');
const prevBtn = document.querySelector('.swiper-button-prev');

// Admin Forms //
const formContainer = document.getElementById('form-container');
const formContainerUpdate = document.getElementById('form-container--update');
const formUpdate = document.getElementById('form--update');

// Admin Btn //
const createBtn = document.getElementById('create');
const updateBtn = document.querySelectorAll('.update-btn');
const deleteBtn = document.querySelectorAll('.delete-btn');
const closeBtn = document.getElementById('close');
const closeUpdate = document.getElementById('close-update');

// Blog Content Save //
const blogSaveContent = document.querySelector('.blog-content-save');

// File Input //
const fileInput = document.querySelector('#fileJs input[type=file]');
const fileInputUpdate = document.querySelector(
	'#fileJsUpdate input[type=file]'
);
const fileInputVideo = document.querySelector(
	'#fileJsVideo input[type=file]'
);

// Admin Message //
const message = document.getElementById('message');

// Navbar //
const navbar = document.getElementById('navbar');
const navbarBtn = document.getElementById('navbar-btn');
const navbarContent = document.getElementById('navbar-C');

// Tooltip //
const tooltip = document.querySelectorAll('.tooltip');

// Editor //
const editor = document.getElementById('editor');

//  Media Query //
const x = window.matchMedia('(max-width: 768px)');

// Plugins Init //
if (tooltip.length > 0) tippy('.tooltip');

if (editor != null) {
	const editorInit = async () => {
		try {
			const decoupledEditor = await DecoupledEditor.create(editor, {
				removePlugins: ['ImageUpload']
			});
			const toolbarContainer = document.getElementById('toolbar-container');
			toolbarContainer.appendChild(decoupledEditor.ui.view.toolbar.element);
		} catch (e) {
			console.log(`error: ${e}`);
		}
	};
	editorInit();

	const editorP = editor.childNodes;
	editorP.forEach(p => {
		if (p.childNodes[0]) {
			if (p.tagName === 'P' && p.childNodes[0].tagName === 'BR') {
				p.childNodes[0].parentNode.parentNode.removeChild(
					p.childNodes[0].parentNode
				);
			}
		}
	});
}

// Media Query //
const mediaQuery = x => {
	if (x.matches) {
		slidePerView = 1;
		autoplay = {
			delay: 5000
		};
		if (nextBtn && prevBtn) {
			nextBtn.style.display = 'none';
			prevBtn.style.display = 'none';
		}
	} else {
		autoplay = false;
		slidePerView = 3;
	}
};
mediaQuery(x);
x.addListener(mediaQuery);

// Swipers //
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

// Tab Active //
if(navbar != null) {
	const pathName = window.location.pathname.split('/')[1];
	document.querySelectorAll('.navbar-item').forEach(nav => {
		if(nav.id == pathName) nav.classList.add('active');
	});
}

// Navbar Hamburguer Menu //
if (navbarBtn != null) {
	navbarBtn.addEventListener('click', e => {
		navbar.classList.toggle('navbar-menu--active');
	});
}

// Navbar Box Shadow //
if (navbarContent != null) {
	window.addEventListener('scroll', e => {
		if (window.scrollY > 0) navbarContent.style.boxShadow = '1px 1px 5px #000';
		else navbarContent.style.boxShadow = 'none';
	});
}

// Delete Notifiction //
document.addEventListener('DOMContentLoaded', () => {
	(document.querySelectorAll('.notification .delete') || []).forEach(
		$delete => {
			$notification = $delete.parentNode;
			$delete.addEventListener('click', () => {
				if ($notification.parentNode.classList[0] == 'blog-e')
					$notification.parentNode.parentNode.style.display = 'none';
				else $notification.parentNode.removeChild($notification);
			});
		}
	);
});

// File Name Change //
if (fileInput != null) {
	fileInput.onchange = () => {
		if (fileInput.files.length > 0) {
			const fileName = document.querySelector('#fileJs .file-name');
			fileName.textContent = fileInput.files[0].name;
		}
	};
}

if (fileInputUpdate != null) {
	fileInputUpdate.onchange = () => {
		if (fileInputUpdate.files.length > 0) {
			const fileNameUpdate = document.querySelector('#fileJsUpdate .file-name');
			fileNameUpdate.textContent = fileInputUpdate.files[0].name;
		}
	};
}

if (fileInputVideo != null) {
	fileInputVideo.onchange = () => {
		if (fileInputVideo.files.length > 0) {
			const fileNameVideo = document.querySelector('#fileJsVideo .file-name');
			fileNameVideo.textContent = fileInputVideo.files[0].name;
		}
	};
}

// Btn Events //
if (createBtn != null) {
	createBtn.addEventListener('click', e => {
		formContainer.style.top = '0';
		document.querySelector('.textarea').value = '';
	});
	if (closeBtn != null) {
		closeBtn.addEventListener('click', e => {
			e.preventDefault();
			formContainer.style.top = '-200vh';
		});
	}
	formContainer.addEventListener('click', e => {
		if (e.target.id == 'form-container') formContainer.style.top = '-200vh';
	});
}

if (deleteBtn != null) {
	deleteBtn.forEach(btn => {
		btn.addEventListener('click', async e => {
			confirm = window.confirm('¿Desea eliminar el elemento?');

			if (confirm) {
				const id = btn.id.split('-')[1];
				await axios.delete(`${window.location.protocol}//${window.location.host}${window.location.pathname}/${id}`);
				location.reload();
			}
		});
	});
}

if (updateBtn != null) {
	updateBtn.forEach(btn => {
		btn.addEventListener('click', async e => {
			const id = btn.id.split('-')[1];
			console.log(window.location)
			const data = await axios.get(`${window.location.protocol}//${window.location.host}${window.location.pathname}/${id}`);
			if (data.data.success) {
				document.getElementById('titulo').value = data.data.data.titulo;
				if (document.getElementById('texto')) {
					document.getElementById('texto').value = data.data.data.texto;
				}
				if (document.getElementById('autor')) {
					document.getElementById('autor').value = data.data.data.autor;
				}
			} else console.log('Error al traer los datos');
			formContainerUpdate.style.top = '0';
			formUpdate.action = '';
			formUpdate.action = `${window.location.href}/${id}`;
		});
		closeUpdate.addEventListener('click', e => {
			e.preventDefault();
			formContainerUpdate.style.top = '-200vh';
		});
		formContainerUpdate.addEventListener('click', e => {
			if (e.target.id == 'form-container--update')
				formContainerUpdate.style.top = '-200vh';
		});
	});
}

// Blog Content Save //
if (blogSaveContent != null) {
	blogSaveContent.addEventListener('click', async e => {
		e.preventDefault();

		const id = blogSaveContent.id.split('-')[1];
		const data = await axios.patch(
			`${window.location.protocol}//${window.location.host}${window.location.pathname}/${id}`,
			{
				texto: editor.innerHTML
			}
		);

		notification.parentNode.style.display = 'block';
		if (data.data.success) {
			const notification = document.getElementById('notification');
			notification.style.display = 'block';
		} else
			document.getElementById('notification-error').style.display = 'block';
	});
}
