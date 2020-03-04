// inicializa componentes (está no site do materialize)
$(document).ready(function() {
	$('.sidenav').sidenav();
	$('.slider').slider({full_width: true});
	$('select').formSelect();
	$('.dropdown-trigger').dropdown();
});

// métodos para manipular os slides na página de detalhes
function sliderPrev() {
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}

function sliderNext() {
	$('.slider').slider('pause');
	$('.slider').slider('next');
}