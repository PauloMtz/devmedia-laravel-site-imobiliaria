@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h2>Adicionar slide</h2>
		<nav>
			<div class="nav-wrapper blue-grey lighten-2">
				<div class="col s12">
					<a href="{{ route('admin.home') }}" class="breadcrumb">Início</a>
					<a href="{{ route('admin.slides') }}" class="breadcrumb">Slides</a>
					<a class="breadcrumb">Adicionar slide</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admin.slides.salvar') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }} <!-- gera um token de validação do formulário -->
			@include('admin.slides._form')
			<button class="btn blue-grey lighten-2" style="width:140px">Adicionar</button>
		</form>
	</div>
</div>
@endsection