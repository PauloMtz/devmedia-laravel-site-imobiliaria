@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Atualizar dados</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de usuários</a>
					<a class="breadcrumb">Atualizar dados</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.usuarios.atualizar', $u->id) }}" method="post">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			<input type="hidden" name="_method" value="put">
			@include('admin.usuarios._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Atualizar</button>
		</form>
	</div>
</div>
@endsection