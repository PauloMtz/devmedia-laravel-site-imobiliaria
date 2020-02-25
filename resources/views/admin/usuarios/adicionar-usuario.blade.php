@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Novo usuário</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de usuários</a>
					<a class="breadcrumb">Novo usuário</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.usuarios.salvar') }}" method="post">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.usuarios._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Adicionar</button>
		</form>
	</div>
</div>
@endsection