@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Lista de usuários</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Lista de usuários</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>E-mail</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($usuario as $u)
				<tr>
					<td>{{ $u->id }}</td>
					<td>{{ $u->name }}</td>
					<td>{{ $u->email }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.usuarios.editar', $u->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.usuarios.excluir', $u->id) }}'
								}" title="Excluir">
							<img src="{{ asset('img/delete.png') }}">
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.usuarios.add') }}" style="width:170px">Novo usuário</a>
	</div>
</div>
@endsection