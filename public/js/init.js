// ativação do slide (está no site do materialize [na página do código do slider])
$(document).ready(function() {
	$('.sidenav').sidenav();
	$('.slider').slider({full_width: true});
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