@extends('layouts.site')

@section('content')

<div class="container">
	<div class="row section">
		<h3>Contato</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m7">
			@if(isset($pagina->mapa))
			<div class="video-container">
				{!! $pagina->mapa !!}
			</div>
			@else
			<img class="responsive-img" src="{{ asset($pagina->imagem) }}">
			@endif
		</div>
		<div class="col s12 m5">
			<h4>{{ $pagina->titulo }}</h4>
			<blockquote>{{ $pagina->descricao }}</blockquote>
			<form class="col s12 m6" action="{{ route('site.contato.enviar') }}" method="post" style="width:100%">
				{{ csrf_field() }} <!-- gera um token de validação do formulário -->
				<div class="input-field">
					<label>Nome</label>
					<input type="text" name="nome" class="validate">
				</div>
				<div class="input-field">
					<label>E-mail</label>
					<input type="text" name="email" class="validate">
				</div>
				<div class="input-field">
					<label>Mensagem</label>
					<textarea name="mensagem" class="materialize-textarea"></textarea>
				</div>
				<button class="btn blue" style="width:140px">Enviar</button>
			</form>
		</div>
	</div>
</div>
@endsection