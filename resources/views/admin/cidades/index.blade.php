@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Cidades</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Cidades</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Estado</th>
				<th>Sigla da UF</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($registros as $c)
				<tr>
					<td>{{ $c->id }}</td>
					<td>{{ $c->nome }}</td>
					<td>{{ $c->estado }}</td>
					<td>{{ $c->uf }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.cidades.editar', $c->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.cidades.excluir', $c->id) }}'
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
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.cidades.add') }}" style="width:170px">Adicionar cidade</a>
	</div>
</div>
@endsection