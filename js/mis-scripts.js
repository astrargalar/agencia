(function($) {
	// 'use strict'; Esto no sirve

	// $ = jQuery.noConflict(); Esto ya lo pone WordPress por defecto

	$(document).on('mouseover', '.container-hero .column', function() {
		$('.site-header').hide(40);
		$(this).addClass('active').siblings().removeClass('active');
	});
	$(document).on('mouseover', '.container-hero .column', function() {
		$(this).addClass('active').siblings().removeClass('active');
	});
	// alert('Se está ejecutando JQuery $');
	// function ocultar() {
	// 	document.getElementsByClassName('footer-widget-1').style.display = 'none';
	// }
})(jQuery);
// Mapa de Leaflet
var map = L.map('mapid').setView([ 36.523464, -6.2803823 ], 6); //Establecemos el mapa inicial

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	// Cargamos la hoja con las calles y el estilo que queramos
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var startmarkers = [
	// Creamos los marcadores que necesitemos (ojo, como es un array  empieza por 0)
	[
		'Cádiz', // Elemento 0
		36.523464, // Elemento 1
		-6.2803823, // Elemento 2
		'./Sedes/LapaginadeCadiz.html', // Elemento 3
		'Aquí me puedes encontrar.<br> Incluso en la segunda línea.' // Elemento 4
	],
	[
		'Chiclana',
		36.425441,
		-6.153263,
		'./Sedes/LapaginadeChiclana.html', //Cambiar por la específica de la oficina que sea
		'Aquí nuestras oficinas de.<br> Chiclana - Cádiz.'
	]
];

mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>'; // Este será nuesto mapa definitivo
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; ' + mapLink + ' Contributors',
	maxZoom: 18
}).addTo(map);

let arrayOfMarkers = [];
for (let i = 0; i < startmarkers.length; i++) {
	marker = new L.marker([ startmarkers[i][1], startmarkers[i][2] ])
		.bindPopup('<a href="' + startmarkers[i][3] + '">' + startmarkers[i][0] + '<br>' + startmarkers[i][4])
		.addTo(map);

	arrayOfMarkers.push([ startmarkers[i][1], startmarkers[i][2] ]);
}
console.log(arrayOfMarkers); // Listamos el array en la consola para comprobar que se carga correctamente. Luego no es necesario

var bounds = new L.LatLngBounds(arrayOfMarkers); //Con esto centramos el mapa al máximo zoom siempre que se vean todos nuestros marcadores
map.fitBounds(bounds);

// Botón subir arriba
(function($) {
	/** code by webdevtrick ( https://webdevtrick.com) **/
	document.addEventListener('DOMContentLoaded', function() {
		let gototop = document.querySelector('.gototop');
		let body = document.documentElement;

		window.addEventListener('scroll', check);

		function check() {
			pageYOffset >= 100 && gototop.classList.add('visible');
			pageYOffset < 100 && gototop.classList.remove('visible');
		}

		gototop.onclick = function() {
			animate({
				duration: 700,
				timing: gogototopEaseOut,
				draw: (progress) => (body.scrollTop = body.scrollTop * (1 - progress / 7))
			});
		};

		let circ = (timeFraction) => 1 - Math.sin(Math.acos(timeFraction > 1 ? (timeFraction = 1) : timeFraction));

		let makeEaseOut = (timing) => (timeFraction) => 1 - timing(1 - timeFraction);
		let gogototopEaseOut = makeEaseOut(circ);
	});

	function animate(options) {
		let start = performance.now();

		requestAnimationFrame(function animate(time) {
			let timeFraction = (time - start) / options.duration;
			timeFraction > 1 && (timeFraction = 1);

			let progress = options.timing(timeFraction);

			options.draw(progress);
			timeFraction < 1 && requestAnimationFrame(animate);
		});
	}
})(jQuery);
