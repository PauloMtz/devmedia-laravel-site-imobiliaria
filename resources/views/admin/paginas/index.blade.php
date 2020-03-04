@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Lista de páginas</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Lista de páginas</a>
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
				<th>Tipo</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				@foreach($pagina as $p)
				<tr>
					<td>{{ $p->id }}</td>
					<td>{{ $p->titulo }}</td>
					<td>{{ $p->descricao }}</td>
					<td>{{ $p->tipo }}</td>
					<td style="text-align:center">
						<a href="{{ route('admin.paginas.editar', $p->id) }}" title="Editar"><img src="{{ asset('img/edit.png') }}"></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection