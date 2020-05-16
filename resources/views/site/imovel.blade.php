@extends('layouts.site')

@section('content')

<div class="container">
	<div class="row section">
		<h3>Mais informações</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m8">
			@if($imovel->galeria()->count())
			<div class="row">
				<div class="slider">
					<ul class="slides">
						@foreach($imovel->galeria as $imagem)
						<li>
							<img src="{{ asset($imagem->imagem) }}">
							<div class="caption center-align">
								<h3>{{ $imagem->titulo }}</h3>
								<h5>{{ $imagem->descricao }}</h5>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="row" align="center">
				<button onclick="sliderPrev()" class="btn blue"> < < </button>
				<button onclick="sliderNext()" class="btn blue"> > > </button>
			</div>
			@else
			<img class="responsive-img" src="{{ asset($imovel->imagem) }}">
			@endif
		</div>
		<div class="col s12 m4" style="padding-left:30px;margin-top:-30px">
			<h4>{{ $imovel->titulo }}</h4>
			<blockquote>
				{{ $imovel->descricao }}
			</blockquote>
			<p><b>Código:</b> {{ $imovel->id }}</p>
			<p><b>Status:</b> {{ $imovel->status }}</p>
			<p><b>Tipo:</b> {{ $imovel->tipo->titulo }}</p>
			<p><b>Dormitórios:</b> {{ $imovel->dormitorios }}</p>
			<p><b>Localização:</b> {{ $imovel->endereco }}</p>
			<p><b>Cidade:</b> {{ $imovel->cidade->nome }}</p>
			<p><b>CEP:</b> {{ $imovel->cep }}</p>
			<p><b>Valor:</b> R$ {{ number_format($imovel->valor, 2, ",", ".") }}</p>
			<a href="{{ route('site.contato') }}" class="btn blue-grey lighten-2">Entre em contato</a>
		</div>
	</div>
	<div class="row section">
		<div class="col s12 m8">
			<div class="video-container">
				{!! $imovel->mapa !!}
			</div>
		</div>
		<div class="col s12 m4">
			<h4>Detalhes</h4>
			<p>{{ $imovel->detalhes }}</p>
		</div>
	</div>
</div>
@endsection