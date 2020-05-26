<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="nome" class="validate"
		value="{{ isset($registro->nome) ? $registro->nome : '' }}">
		<!-- o $registro vem do controller -->
	<label>Nome</label>
</div>

<div class="input-field" style="width:50%">
	<!-- esse atributo name deve ser o mesmo do campo do banco de dados -->
	<input type="text" name="descricao" class="validate"
		value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
		<!-- o $registro vem do controller -->
	<label>Descrição</label>
</div>