@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Novo tipo de imóvel</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.tipos') }}" class="breadcrumb">Lista de tipos</a>
					<a class="breadcrumb">Novo tipo de imóvel</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.tipos.salvar') }}" method="post">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.tipos._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Adicionar</button>
		</form>
	</div>
</div>
@endsection