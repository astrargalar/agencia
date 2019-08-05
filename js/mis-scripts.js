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
// var map = L.map('map', {
// 	center: [ 55.751244, 37.618423 ],
// 	zoom: 2
// });

// L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
// 	maxZoom: 18,
// 	id: 'mapbox.streets',
// 	accessToken: 'pk.eyJ1IjoiaW5zYXRpYWJsZS1taW5kIiwiYSI6ImNqOWIwaWdrNjFjdDIzM24ya21qbGJuMzQifQ.EIK16areNxtGW7AyBTug6A'
// }).addTo(map);

// map.locate({
// 	setView: true
// });

var mymap = L.map('mapid').setView([ 36.523464, -6.280382 ], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

L.marker([ 36.523464, -6.280382 ])
	.addTo(mymap)
	.bindPopup('Aquí me puedes encontrar.<br> Incluso en la segunda línea.')
	.openPopup();
if ($('#mapid').length == 0) {
	console.log('El div #mapid no se ha cargado en el dom');
}
