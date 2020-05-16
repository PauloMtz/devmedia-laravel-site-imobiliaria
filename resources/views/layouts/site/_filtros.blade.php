<div class="row" style="margin-top:10px">
	<form action="{{ route('site.busca') }}">
		<div class="input-field col s6 m4">
			<select name="status">
				<option {{ isset($busca['status']) && $busca['status'] == 'todos' ? 'selected' : '' }} value="todos"> Aluguel e venda</option>
				<option {{ isset($busca['status']) && $busca['status'] == 'aluguel' ? 'selected' : '' }} value="aluguel">Aluguel</option>
				<option {{ isset($busca['status']) && $busca['status'] == 'venda' ? 'selected' : '' }} value="venda">Venda</option>
			</select>
			<label>Status</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="tipo_id">
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == 'todos' ? 'selected' : '' }} value="todos"> Tipo de imóvel</option>
				@foreach($tipos as $tipo)
				<option {{ isset($busca['tipo_id']) && $busca['tipo_id'] == $tipo->id ? 'selected' : '' }} value="{{ $tipo->id }}">{{ $tipo->titulo }}</option>
				@endforeach
			</select>
			<label>Tipo de imóvel</label>
		</div>
		<div class="input-field col s6 m4">
			<select name="cidade_id">
				<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == 'todos' ? 'selected' : '' }} value="todos"> Cidade</option>
				@foreach($cidades as $cidade)
				<option {{ isset($busca['cidade_id']) && $busca['cidade_id'] == $cidade->id ? 'selected' : '' }} value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
				@endforeach
			</select>
			<label>Localização</label>
		</div>
		<div class="input-field col s6 m3">
			<select name="dormitorios">
				<option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 0 ? 'selected' : '' }} value="0"> Dormitórios</option>
				<option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 1 ? 'selected' : '' }} value="1">1</option>
				<option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 2 ? 'selected' : '' }} value="2">2</option>
				<option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 3 ? 'selected' : '' }} value="3">3</option>
				<option {{ isset($busca['dormitorios']) && $busca['dormitorios'] == 4 ? 'selected' : '' }} value="4">4 ou mais...</option>
			</select>
			<label>Dormitórios</label>
		</div>
		<div class="input-field col s12 m4">
			<select name="valor">
				<option {{ isset($busca['valor']) && $busca['valor'] == 0 ? 'selected' : '' }} value="0"> Valores</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 1 ? 'selected' : '' }} value="1">Até R$ 500,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 2 ? 'selected' : '' }} value="2">Até R$ 1.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 3 ? 'selected' : '' }} value="3">Até R$ 2.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 4 ? 'selected' : '' }} value="4">Até R$ 5.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 5 ? 'selected' : '' }} value="5">Até R$ 10.000,00</option>
				<option {{ isset($busca['valor']) && $busca['valor'] == 6 ? 'selected' : '' }} value="6">Acima de R$ 10.000,00</option>
			</select>
			<label>Valores</label>
		</div>
		<div class="input-field col s12 m3">
			<input class="validate" type="text" name="bairro" value="{{ isset($busca['bairro']) ? $busca['bairro'] : '' }}">
			<label>Bairro</label>
		</div>
		<div class="input-field col s12 m2">
			<button class="btn blue-grey lighten-2 right" style="width:140px">Buscar</button>
		</div>
	</form>	
</div>