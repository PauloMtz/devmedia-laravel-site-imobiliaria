@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row"><!-- $papel vem PapelController->permissao() -->
		<h3>Permissão para {{ $papel->nome }}</h3>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.papel') }}" class="breadcrumb">Lista de papéis</a>
					<a class="breadcrumb">Permissões</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row"><!-- rota definida no finalzinho do arquivo routes.php [relação papel-permissão] -->
		<form action="{{ route('admin.papel.permissao.salvar', $papel->id) }}" method="post">
			{{ csrf_field() }} <!-- token de segurança do Laravel -->
			<div class="input-field" style="width:50%">
				<!-- esse name="permissao_id" foi atribuído lá em PapelController->salvarPermissao() -->
				<select name="permissao_id">
					<!-- $permissao vem de PapelController->permissao() -->
					@foreach($permissao as $valor)
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
				<th>Permissão</th>
				<th>Descrição</th>
				<th style="text-align:center">Ações</th>
			</thead>
			<tbody>
				<!-- $papel->permissoes vem do model Papel->permissoes() -->
				@foreach($papel->permissoes as $p)
				<tr>
					<td>{{ $p->nome }}</td>
					<td>{{ $p->descricao }}</td>
					<td style="text-align:center">
						<a 
							href="javascript: if(confirm('Confirma exclusão de registro?')){
									window.location.href='{{ route('admin.papel.permissao.excluir', [$papel->id, $p->id]) }}'
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