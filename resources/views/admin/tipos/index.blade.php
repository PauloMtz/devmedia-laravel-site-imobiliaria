@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Tipos de imóveis</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Tipos de imóveis</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Titulo</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($registros as $t)
				<tr>
					<td>{{ $t->id }}</td>
					<td>{{ $t->titulo }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.tipos.editar', $t->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.tipos.excluir', $t->id) }}'
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
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.tipos.add') }}" style="width:170px">Novo tipo de imóvel</a>
	</div>
</div>
@endsection