<div class="input-field" style="width:50%">
	<input type="text" name="name" class="validate"
		value="{{ isset($u->name) ? $u->name : '' }}">
	<label>Nome</label>
</div>

<div class="input-field" style="width:50%">
	<input type="text" name="email" class="validate"
		value="{{ isset($u->email) ? $u->email : '' }}">
	<label>E-mail</label>
</div>

<div class="input-field" style="width:50%">
	<!-- não atualiza a senha aqui, por isso não tem o 'value' -->
	<input type="password" name="password" class="validate">
	<label>Senha</label>
</div>