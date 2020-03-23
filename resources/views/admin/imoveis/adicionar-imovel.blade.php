@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Adicionar imóvel</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de imóveis</a>
					<a class="breadcrumb">Adicionar imóvel</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.imoveis.salvar') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.imoveis._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Adicionar</button>
		</form>
	</div>
</div>
@endsection