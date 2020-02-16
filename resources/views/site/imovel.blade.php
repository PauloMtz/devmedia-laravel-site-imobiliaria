@extends('layouts.site')

@section('content')

<div class="container">
	<div class="row section">
		<h3 align="center">Mais detalhes sobre o imóvel</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m8">
			<div class="row">
				<div class="slider">
					<ul class="slides">
						<li>
							<img src="{{ asset('img/apartment.jpg') }}">
							<div class="caption center-align">
								<h3>TÍTULO DA IMAGEM</h3>
								<h5>Descrição do slide da imagem.</h5>
							</div>
						</li>
						<li>
							<img src="{{ asset('img/apartment-architecture.jpg') }}">
							<div class="caption right-align">
								<h3>TÍTULO DA IMAGEM</h3>
								<h5>Descrição do slide da imagem.</h5>
							</div>
						</li>
						<li>
							<img src="{{ asset('img/armario.jpg') }}">
							<div class="caption left-align">
								<h3>TÍTULO DA IMAGEM</h3>
								<h5>Descrição do slide da imagem.</h5>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="row" align="center">
				<button onclick="sliderPrev()" class="btn blue"> < < </button>
				<button onclick="sliderNext()" class="btn blue"> > > </button>
			</div>
		</div>
		<div class="col s12 m4" style="padding-left:30px;margin-top:-30px">
			<h4>Título do imóvel</h4>
			<blockquote>
				Breve descrição sobre o imóvel.
			</blockquote>
			<p><b>Código:</b> 123</p>
			<p><b>Status:</b> Venda</p>
			<p><b>Tipo:</b> Imóvel usado</p>
			<p><b>Localização:</b> Bairro Cidade Nova</p>
			<p><b>Cidade:</b> Santa Cruz do Sul</p>
			<p><b>CEP:</b> 01.0001-001</p>
			<p><b>Valor:</b> R$ 100.000,00</p>
			<a href="{{ route('site.contato') }}" class="btn blue-grey lighten-2">Entre em contato</a>
		</div>
	</div>
</div>
@endsection