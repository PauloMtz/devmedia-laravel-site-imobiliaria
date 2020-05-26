@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Papéis</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Papéis</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<th>ID</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				<!-- $registros vem de PapelController@index -->
				@foreach($registros as $c)
				<tr>
					<td>{{ $c->id }}</td>
					<td>{{ $c->nome }}</td>
					<td>{{ $c->descricao }}</td>
					<td style="text-align:center">
						@if($c->nome != 'admin')
						<a href="{{ route('admin.papel.editar', $c->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
						@else
						<a><img src="{{ asset('img/edit.png') }}"></a>
						@endif
						<span style="margin-left:40px"></span>
						@if($c->nome != 'admin')
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.papel.excluir', $c->id) }}'
								}" title="Excluir">
							<img src="{{ asset('img/delete.png') }}">
						</a>
						@else
						<a><img src="{{ asset('img/delete.png') }}"></a>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
		<a class="btn  blue-grey lighten-2" href="{{ route('admin.papel.add') }}" style="width:170px">Adicionar papel</a>
	</div>
</div>
@endsection