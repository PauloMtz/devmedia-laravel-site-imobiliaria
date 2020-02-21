@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h3>Login</h3>
		<form action="{{ route('admin.login') }}" method="post">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.login._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Entrar</button>
		</form>
	</div>

@endsection