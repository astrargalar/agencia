(function() {
	'use strict';

	$ = jQuery.noConflict();

	$(document).on('mouseover', '.container .column', function() {
		$(this).addClass('active').siblings().removeClass('active');
	});

	// function ocultar() {
	// 	document.getElementsByClassName('footer-widget-1').style.display = 'none';
	// }
});
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
