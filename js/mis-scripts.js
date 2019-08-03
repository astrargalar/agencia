$ = jQuery.noConflict();

$(document).on('mouseover', '.container .column', function() {
	$(this).addClass('active').siblings().removeClass('active');
});

function ocultar() {
	document.getElementsByClassName('footer-widget-1').style.display = 'none';
}
