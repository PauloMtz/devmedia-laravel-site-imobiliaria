@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Slides</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Slides</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>Ordem</th>
				<th>Título</th>
				<th>Descrição</th>
				<th>Publicado</th>
				<th>Imagem</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->ordem }}</td>
					<td>{{ $registro->titulo }}</td>
					<td>{{ $registro->descricao }}</td>
					<td>{{ $registro->publicado }}</td>
					<td><img width="100" src="{{ asset($registro->imagem) }}"></td>
					<td style="text-align:center">
						<a href="{{ route('admin.slides.editar', $registro->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						<span style="margin-left:40px"></span>
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.slides.excluir', $registro->id) }}'
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
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.slides.add') }}" 
			style="width:170px">Adicionar slide</a>
	</div>
</div>
@endsection