@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Imagens</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de imóveis</a>
					<a class="breadcrumb">Imagens</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Título</th>
				<th>Descrição</th>
				<th>Imagem</th>
				<th>Ordem</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->descricao }}</td>
					<td><img width="100" src="{{ asset($registro->imagem) }}"></td>
					<td>{{ $registro->ordem }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.galerias.editar', $registro->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.galerias.excluir', $registro->id) }}'
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
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.galerias.add', $imovel->id) }}" 
			style="width:170px">Adicionar galeria</a><!-- $imovel->id vem do controller [GaleriaController] -->
		<span style="margin-left:40px"></span>
		<a class="btn grey lighten-1" href="{{ route('admin.imoveis') }}" 
			style="width:170px">Voltar</a>
	</div>
</div>
@endsection