<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="nome" class="validate"
		value="{{ isset($registro->nome) ? $registro->nome : '' }}">
		<!-- o $registro vem do controller -->
	<label>Nome</label>
</div>

<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="estado" class="validate"
		value="{{ isset($registro->estado) ? $registro->estado : '' }}">
		<!-- o $registro vem do controller -->
	<label>Estado</label>
</div>

<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="uf" class="validate"
		value="{{ isset($registro->uf) ? $registro->uf : '' }}">
		<!-- o $registro vem do controller -->
	<label>Sigla da UF</label>
</div>