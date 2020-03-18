@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Adicionar cidade</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.cidades') }}" class="breadcrumb">Cidades</a>
					<a class="breadcrumb">Adicionar cidade</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.cidades.salvar') }}" method="post">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.cidades._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Adicionar</button>
		</form>
	</div>
</div>
@endsection