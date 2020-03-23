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

<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
			<span>Selecionar imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
	<div class="file-field input-field col m6 s12">
		@if(isset($registro->imagem))
		<img width="120px" src="{{ asset($registro->imagem) }}">
		@endif
	</div>
</div>

<div class="row">
	<div class="file-field input-field col m6 s12">
		<select name="status">
			<option value="venda" {{ (isset($registro->status) && $registro->status == 'venda' ? 'selected' : '' )}}>Venda</option>
			<option value="aluguel" {{ (isset($registro->status) && $registro->status == 'aluguel' ? 'selected' : '' )}}>Aluguel</option>
		</select>
		<label>Status</label>
	</div>

	<div class="file-field input-field col m6 s12">
		<select name="tipo_id">
			@foreach($tipos as $tipo)
			<option value="{{ $tipo->id }}" {{ isset($registro->tipo_id) && $registro->tipo_id == $tipo->id ? 'selected' : '' }}>{{ $tipo->titulo }}</option>
			@endforeach
		</select>
		<label>Tipo de imóvel</label>
	</div>
</div>

<div class="row">
	<div class="input-field col m6 s12">
		<input type="text" name="endereco" class="validate"
			value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
		<label>Endereço</label>
	</div>

	<div class="input-field col m3 s12">
		<input type="text" name="cep" class="validate"
			value="{{ isset($registro->cep) ? $registro->cep : '' }}">
		<label>CEP</label>
	</div>

	<div class="input-field col m3 s12">
		<select name="cidade_id">
			@foreach($cidades as $cidade)
			<option value="{{ $cidade->id }}" {{ isset($registro->cidade_id) && $registro->cidade_id == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome }}</option>
			@endforeach
		</select>
		<label>Cidade</label>
	</div>
</div>

<div class="input-field col s12">
	<input type="text" name="valor" class="validate"
		value="{{ isset($registro->valor) ? $registro->valor : '' }}">
	<label>Valor</label>
</div>

<div class="row">
	<div class="input-field col m4 s12">
		<input type="text" name="dormitorios" class="validate"
			value="{{ isset($registro->dormitorios) ? $registro->dormitorios : '' }}">
		<label>Dormitórios</label>
	</div>

	<div class="input-field col m4 s12">
		<input type="text" name="detalhes" class="validate"
			value="{{ isset($registro->detalhes) ? $registro->detalhes : '' }}">
		<label>Detalhes</label>
	</div>

	<div class="input-field col m4 s12">
		<select name="publicar">
			<option value="sim" {{ isset($registro->publicar) && $registro->publicar == 'sim' ? 'selected' : '' }}>Sim</option>
			<option value="nao" {{ isset($registro->publicar) && $registro->publicar == 'nao' ? 'selected' : '' }}>Não</option>
		</select>
		<label>Publicar?</label>
	</div>
</div>

<div class="input-field col s12">
	<textarea name="mapa" class="materialize-textarea">
		{{ isset($registro->mapa) ? $registro->mapa : '' }}
	</textarea>
	<label>Mapa <b>[cole o iframe do Google Maps]</b></label>
</div>
