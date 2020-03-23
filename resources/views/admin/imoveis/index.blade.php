@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Lista de imóveis</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Lista de imóveis</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Título</th>
				<th>Status</th>
				<th>Cidade</th>
				<th>Valor</th>
				<th>Imagem</th>
				<th>Publicado</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->status }}</td>
					<td>{{ $registro->cidade->nome }}</td>
					<td>R$ {{ number_format($registro->valor, 2, ",", ".") }}</td>
					<td><img width="100" src="{{ asset($registro->imagem) }}"></td>
					<td>{{ $registro->publicar }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.imoveis.editar', $registro->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.imoveis.excluir', $registro->id) }}'
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
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.imoveis.add') }}" style="width:170px">Adicionar imóvel</a>
	</div>
</div>
@endsection