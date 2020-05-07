@if(isset($registro->imagem))
<div class="row">
	<div class="file-field input-field col m6 s12">
		<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
		<input type="text" name="titulo" class="validate"
			value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
			<!-- o $registro vem do controller -->
		<label>Título</label>
	</div>

	<div class="file-field input-field col m6 s12">
		<input type="text" name="descricao" class="validate"
			value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
		<label>Descrição</label>
	</div>
</div>

<div>
	<div class="file-field input-field col m6 s12">
		<input type="text" name="link" class="validate"
			value="{{ isset($registro->link) ? $registro->link : '' }}">
		<label>Link</label>
	</div>

	<div class="file-field input-field col m3 s12">
		<input type="text" name="ordem" class="validate"
			value="{{ isset($registro->ordem) ? $registro->ordem : '' }}">
		<label>Ordem</label>
	</div>

	<div class="input-field col m3 s12">
		<select name="publicado">
			<option value="sim" {{ isset($registro->publicado) && $registro->publicado == 'sim' ? 'selected' : '' }}>Sim</option>
			<option value="nao" {{ isset($registro->publicado) && $registro->publicado == 'nao' ? 'selected' : '' }}>Não</option>
		</select>
		<label>Publicar?</label>
	</div>
</div>

<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn">
			<span>Selecione uma ou mais imagens</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
	<div class="file-field input-field col m6 s12">
		<img width="120px" src="{{ asset($registro->imagem) }}">
	</div>
</div>

@else
<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn">
			<span>Selecione uma ou mais imagens</span>
			<input type="file" multiple name="imagens[]">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
</div>
@endif
