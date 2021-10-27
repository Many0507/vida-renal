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

// Taller Redirect //
const tallerImages = document.querySelectorAll('.taller_img');
tallerImages.forEach(img => {
	img.addEventListener('click', e => {
		const id = e.target.id.split('-')[1];
		window.location.href = `/taller-ver/${id}`;
		return;
	});
});

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
		if (window.scrollY > 0) navbarContent.style.boxShadow = '1px 1px 3px #000';
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
		document.querySelector('.textarea') != null 
			? document.querySelector('.textarea').value = ''
			: '';
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

const tipo_egreso_modal = document.getElementById('tipo_egreso_modal');
const tipo_egreso_form = document.getElementById('form-container_tipo_egreso');
const tipo_egreso_close = document.getElementById('close_tipo_egreso');
if (tipo_egreso_modal != null) {
	tipo_egreso_modal.addEventListener('click', e => {
		tipo_egreso_form.style.top = '0';
	});
	if (tipo_egreso_close != null) {
		tipo_egreso_close.addEventListener('click', e => {
			e.preventDefault();
			tipo_egreso_form.style.top = '-200vh';
		});
	}
	tipo_egreso_form.addEventListener('click', e => {
		if (e.target.id == 'form-container_tipo_egreso') tipo_egreso_form.style.top = '-200vh';
	});
}

const egreso_modal = document.getElementById('egreso_modal');
const egreso_form = document.getElementById('form-container_egreso');
const egreso_close = document.getElementById('close_egreso');
if (egreso_modal != null) {
	egreso_modal.addEventListener('click', e => {
		egreso_form.style.top = '0';
	});
	if (egreso_close != null) {
		egreso_close.addEventListener('click', e => {
			e.preventDefault();
			egreso_form.style.top = '-200vh';
		});
	}
	egreso_form.addEventListener('click', e => {
		if (e.target.id == 'form-container_egreso') egreso_form.style.top = '-200vh';
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

// Modales de FAQS
if (document.querySelector('#comoPuedoAyudar') != null) {
	document.querySelector('#comoPuedoAyudar').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#comoPuedoAyudarModal').classList.add('is-active');
	});
	document.querySelector('#comoSerParte').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#comoSerParteModal').classList.add('is-active');
	});
	document.querySelector('#fundacionAyuda').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#fundacionAyudaModal').classList.add('is-active');
	});
	document.querySelector('#fundacionBrinda').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#fundacionBrindaModal').classList.add('is-active');
	});
	document.querySelector('#tipoAtencion').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#tipoAtencionModal').classList.add('is-active');
	});
	document.querySelector('#maneraAyudar').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#maneraAyudarModal').classList.add('is-active');
	});
	document.querySelector('#atencionMedica').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#atencionMedicaModal').classList.add('is-active');
	});
	document.querySelector('#ayudaNoBrindada').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#ayudaNoBrindadaModal').classList.add('is-active');
	});
	document.querySelector('#asistirTaller').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#asistirTallerModal').classList.add('is-active');
	});
	document.querySelector('#consultarRecursos').addEventListener('click', () => {
		document.querySelector('html').classList.add('is-clipped');
		document.querySelector('#consultarRecursosModal').classList.add('is-active');
	});
}
// Close Modal
document.querySelectorAll('.modal-background').forEach(modal => {
	modal.addEventListener('click', e => {
		document.querySelector('html').classList.remove('is-clipped');
		document.querySelectorAll('.modal').forEach(modalClose => {
			modalClose.classList.remove('is-active');
		});
	});
});
document.querySelectorAll('.modal-close').forEach(modal => {
	modal.addEventListener('click', () => {
		document.querySelector('html').classList.remove('is-clipped');
		document.querySelectorAll('.modal').forEach(modalClose => {
			modalClose.classList.remove('is-active');
		});
	});
});

// Validations Voluntariado //
if (document.getElementById('voluntariado_form') != null) {
	const validateNombre = (nombre) => {
		if (nombre == '' || nombre == null || nombre.length <= 0 || nombre.charAt(0) == '') return false;
		if (nombre.length > 60) return false;
		if (!/[a-zA-ZñÑáéíóúü ]/g.test(nombre)) return false;
		return true;
	}
	const validateEdad = (edad) => {
		if (!/[0-9 ]/g.test(edad)) return false;
		if (edad == '' || edad == null || edad <= 0) return false;
		if (edad > 100) return false;
		return true;
	}
	const validateTelefono = (telefono) => {
		if (!/[0-9 ]/g.test(telefono)) return false;
		if (telefono == '' || telefono == null || telefono <= 0) return false;
		if (telefono.length > 10) return false;
		return true;
	}
	const validateEmail = (email) => {
		if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(email)) return false;
		if (email == '' || email == null || email.length <= 0) return false;
		return true;
	}
	const validateMensaje = (mensaje) => {
		if (mensaje == '' || mensaje == null || mensaje.length <= 0) return false;
		if (mensaje.length > 160) return false;
		return true;
	}

	document.getElementById('voluntariado_form').addEventListener('submit', async e => {
		e.preventDefault();
		const nombre = document.getElementById('nombre').value.trim();
		const edad = document.getElementById('edad').value.trim();
		const telefono = document.getElementById('telefono').value.trim();
		const email = document.getElementById('email').value.trim();
		const mensaje = document.getElementById('mensaje').value.trim();
		const social = document.getElementById('social').value.trim();
		const checkHombre = document.getElementById('checkHombre');
		const checkMujer = document.getElementById('checkMujer');

		let isValidNombre = validateNombre(nombre);
		let isValidEdad = validateEdad(edad);
		let isValidTelefono = validateTelefono(telefono);
		let isValidEmail = validateEmail(email);
		let isValidMensaje = validateMensaje(mensaje);
		let isValidSexo = false;

		if (checkHombre.checked || checkMujer.checked) isValidSexo = true;

		if (!isValidNombre ||
			!isValidEdad ||
			!isValidTelefono ||
			!isValidEmail ||
			!isValidMensaje ||
			!isValidSexo) {
				document.getElementById('message_errorV').style.display = 'block';
				document.getElementById('message_doneV').style.display = 'none';
				document.getElementById('message_errorV_text').innerHTML = 'Ha ocurrido un error al enviar sus datos, verifique su informacion e inténtelo más tarde.';
				return;
		}

		let sexo = '';
		if (checkHombre.checked) sexo = 'Hombre'
		else if (checkMujer.checked) sexo = 'Mujer'

		const data = await axios.post(
			`${window.location.protocol}//${window.location.host}/voluntariado/registro`, {
				nombre,
				edad,
				telefono,
				email,
				mensaje,
				social,
				sexo
		});

		if (data.data.success == 0) {
			document.getElementById('message_errorV').style.display = 'block';
			document.getElementById('message_doneV').style.display = 'none';
			document.getElementById('message_errorV_text').innerHTML = 'Ha ocurrido un error al enviar sus datos, verifique su informacion e inténtelo más tarde.';
			return;
		} else {
			document.getElementById('message_errorV').style.display = 'none';
			document.getElementById('message_doneV').style.display = 'block';
			document.getElementById('message_doneV_text').innerHTML = 'Mensaje enviado correctamente';

			document.getElementById('nombre').value = '';
			document.getElementById('edad').value = '';
			document.getElementById('telefono').value = '';
			document.getElementById('email').value = '';
			document.getElementById('social').value = '';
			document.getElementById('mensaje').value = '';
			document.getElementById('checkHombre').checked = false;
			document.getElementById('checkMujer').checked = false;
		}
	});
}

// Transparencia Admin //
if (document.getElementById('tipo_donador') != null) {
	let tipo_donador_select = document.getElementById('tipo_donador');
	tipo_donador_select.addEventListener('change', function (elem) {
		if (elem.target.value == 4) {
			document.getElementById('ingreso_especie').removeAttribute('disabled');
			document.getElementById('ingreso_monto_especie').removeAttribute('disabled');
			document.getElementById('ingreso_cantidad').disabled = true;
		} else {
			document.getElementById('ingreso_cantidad').removeAttribute('disabled');
			document.getElementById('ingreso_monto_especie').disabled = true;
			document.getElementById('ingreso_especie').disabled = true;
		}
	});
}

// Transparencia - Busqueda de Ingresos //
if (document.getElementById('search_transparencia') != null) {
	let search_transparencia = document.getElementById('search_transparencia');
	search_transparencia.addEventListener('click', async function (e) {
		e.preventDefault();
		let ingreso_mes = document.getElementById('select_mes').value;
		let ingreso_anio = document.getElementById('select_anio').value;
		let ingresos_tbody = document.getElementById('ingresos_tbody');
		document.getElementById('ingreso_busqueda_error').classList.add('is-hidden');

		const data = await axios.post(
			`${window.location.protocol}//${window.location.host}/ingreso/busqueda`, {
				ingreso_mes,
				ingreso_anio
		});

		ingresos_tbody.innerHTML = '';
		document.getElementById('porcentaje_tipo1').innerHTML = '0%';
		document.getElementById('porcentaje_tipo2').innerHTML = '0%';
		document.getElementById('porcentaje_tipo3').innerHTML = '0%';
		document.getElementById('porcentaje_tipo4').innerHTML = '0%';
		if (data.data.success) {
			let actual_date = new Date();
			document.getElementById('ingresos_lista_link').setAttribute('href', `/admin/ingresos/${ingreso_mes}/${ingreso_anio}`);
			document.querySelectorAll('.button_ingreso').forEach(e => e.disabled = false);
			if (parseInt(ingreso_mes) != parseInt(actual_date.getMonth()) + 1 &&
			parseInt(ingreso_anio) != parseInt(actual_date.getFullYear())) {
				document.querySelectorAll('#create.button_ingreso').forEach(e => e.disabled = true);
			}
			data.data.data.forEach(function (item, index) {
				ingresos_tbody.innerHTML += `
					<tr>
						<td>${ item.id }</td>
						<td>${ item.nombre }</td>
						<td>${ item.tipo }</td>
						<td>$ ${ item.cantidad }</td>
						<td>${ item.especie == null ? '' : item.especie }</td>
						<td>$ ${ item.especie_cantidad }</td>
					</tr>
				`;
			});
			if (data.data.porcentajes != null) {
				document.getElementById('porcentaje_tipo1').innerHTML = data.data.porcentajes.tipo_1 + '%';
				document.getElementById('porcentaje_tipo2').innerHTML = data.data.porcentajes.tipo_2 + '%';
				document.getElementById('porcentaje_tipo3').innerHTML = data.data.porcentajes.tipo_3 + '%';
				document.getElementById('porcentaje_tipo4').innerHTML = data.data.porcentajes.tipo_4 + '%';
			}
		} else {
			document.querySelectorAll('.button_ingreso').forEach(e => e.disabled = true);
			document.getElementById('ingreso_busqueda_error').classList.remove('is-hidden');
		}
	});
}

if (document.getElementById('search_transparencia_egresos') != null) {
	let search_transparencia_egresos = document.getElementById('search_transparencia_egresos');
	search_transparencia_egresos.addEventListener('click', async function (e) {
		e.preventDefault();
		let egreso_mes = document.getElementById('select_egresos_mes').value;
		let egreso_anio = document.getElementById('select_egresos_anio').value;
		let egresos_tbody = document.getElementById('egresos_tbody');
		document.getElementById('egreso_busqueda_error').classList.add('is-hidden');

		const data = await axios.post(
			`${window.location.protocol}//${window.location.host}/egreso/busqueda`, {
				egreso_mes,
				egreso_anio
		});

		egresos_tbody.innerHTML = '';
		if (data.data.success) {
			let actual_date = new Date();
			document.getElementById('egresos_lista_link').setAttribute('href', `/admin/egresos/${egreso_mes}/${egreso_anio}`);
			document.querySelectorAll('.button_egreso').forEach(e => e.disabled = false);
			if (parseInt(egreso_mes) != parseInt(actual_date.getMonth()) + 1 &&
			parseInt(egreso_anio) != parseInt(actual_date.getFullYear())) {
				document.querySelectorAll('#create.button_egreso').forEach(e => e.disabled = true);
			}
			data.data.data.forEach(function (item, index) {
				egresos_tbody.innerHTML += `
					<tr>
						<td>${ item.id != null ? item.id : '' }</td>
						<td>${ item.nombre != null ? item.nombre : '' }</td>
						<td>${ item.tipo_consulta != null ? item.tipo_consulta : '' }</td>
						<td>${ item.consulta_costo != null ? item.consulta_costo : '' }</td>
						<td>${ item.taller != null ? item.taller : '' }</td>
						<td>${ item.costo_taller != null ? item.costo_taller : '' }</td>
						<td>${ item.insumos != null ? item.insumos : '' }</td>
						<td>${ item.costo_insumos != null ? item.costo_insumos : '' }</td>
						<td>${ item.medicamentos != null ? item.medicamentos : '' }</td>
						<td>${ item.costo_medicamentos != null ? item.costo_medicamentos : '' }</td>
						<td>${ item.laboratorios != null ? item.laboratorios : '' }</td>
						<td>${ item.costo_laboratorios != null ? item.costo_laboratorios : '' }</td>
						<td>${ item.conferencias != null ? item.conferencias : '' }</td>
						<td>${ item.costo_conferencias != null ? item.costo_conferencias : '' }</td>
					</tr>
				`;
			});
		} else {
			document.querySelectorAll('.button_egreso').forEach(e => e.disabled = true);
			document.getElementById('egreso_busqueda_error').classList.remove('is-hidden');
		}
	});
}

// Chart Js //
if (document.getElementById('myChart') != null) {
	let porcentajes = [];
	async function getGraphicData () {
		let d = new Date();
		let ingreso_mes = parseInt(d.getMonth()) + 1;
		let ingreso_anio = parseInt(d.getFullYear());
		const data = await axios.post(
			`${window.location.protocol}//${window.location.host}/ingreso/busqueda`, {
				ingreso_mes,
				ingreso_anio
		});
		porcentajes = data.data.porcentajes;

		document.getElementById('porcentaje_fisica').innerHTML = porcentajes.tipo_1 + '%';
		document.getElementById('porcentaje_empresas').innerHTML = porcentajes.tipo_2 + '%';
		document.getElementById('porcentaje_anonimo').innerHTML = porcentajes.tipo_3 + '%';
		document.getElementById('porcentaje_especie').innerHTML = porcentajes.tipo_4 + '%';

		var ctx = document.getElementById('myChart').getContext('2d');
		new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ['Donador Persona fisica', 'Donador empresas', 'Donador Anónimo', 'Donador en Especie'],
				datasets: [{
					label: '%',
					data: [porcentajes.tipo_1, porcentajes.tipo_2, porcentajes.tipo_3, porcentajes.tipo_4],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				plugins: {
					legend: {
						display: true,
						position: 'bottom'
					}
				},
				scales: {
					x: {
						grid: {
							display: false,
							drawBorder: false
						},
						ticks: {
							display: false,
							drawBorder: false
						}
					},
					y: {
						grid:{
							display: false,
							drawBorder: false
						},
						ticks: {
							display: false
						}
					}
				}
			}
		});
	}
	getGraphicData();
}
