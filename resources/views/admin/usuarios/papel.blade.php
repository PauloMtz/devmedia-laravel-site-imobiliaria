@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h3>Papel para {{$usuario->name}}</h3>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.usuarios') }}" class="breadcrumb">Lista de usuários</a>
					<a class="breadcrumb">Papéis</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{route('admin.usuarios.papel.salvar', $usuario->id)}}" method="post">
			{{ csrf_field() }} <!-- token de segurança do Laravel -->
			<div class="input-field" style="width:50%">
				<!-- esse name="papel_id" foi atribuído lá em UsuarioController->salvarPapel() -->
				<select name="papel_id">
					<!-- $papel vem de UsuarioController->papel() -->
					@foreach($papel as $valor)
					<option value="{{ $valor->id }}">{{ $valor->nome }}</option>
					@endforeach
				</select>
				<label>Nome</label>
			</div>
			<button class="btn  blue-grey lighten-2" style="width:170px">Salvar</button>
		</form>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Papel</th>
				<th>Descrição</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				<!-- $usuario->papeis vem do model User->papeis() -->
				@foreach($usuario->papeis as $p)
				<tr>
					<td>{{ $p->nome }}</td>
					<td>{{ $p->descricao }}</td>
					<td style="text-align:center">
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.usuarios.papel.excluir', [$usuario->id, $p->id]) }}'
								}" title="Excluir">
							<img src="{{ asset('img/delete.png') }}">
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection