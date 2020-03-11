<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="titulo" class="validate"
		value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
		<!-- o $registro vem do controller -->
	<label>Título</label>
</div>