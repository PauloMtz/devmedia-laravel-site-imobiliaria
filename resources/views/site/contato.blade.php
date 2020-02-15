@extends('layouts.site')

@section('content')

<div class="container">
	<div class="row section">
		<h3 align="center">Contato</h3>
		<div class="divider"></div>
	</div>
	<div class="row section">
		<div class="col s12 m7">
			<img class="responsive-img" src="{{ asset('img/apartment.jpg') }}">
		</div>
		<div class="col s12 m5">
			<form class="col s12 m6" style="width:100%">
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
					<textarea class="materialize-textarea"></textarea>
				</div>
				<button class="btn blue" style="width:140px">Enviar</button>
			</form>
		</div>
	</div>
</div>
@endsection