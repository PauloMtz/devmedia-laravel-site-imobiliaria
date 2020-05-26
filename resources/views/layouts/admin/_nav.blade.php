<nav>
	<div class="nav-wrapper  blue-grey lighten-2">
		<div class="container">
			<a href="{{ route('site.home') }}" class="brand-logo"><span style="font-style: italic">INOVA<sup>+</sup> imóveis</span></a>
			<a href="{{ route('site.home') }}" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="{{ route('admin.home') }}">Início</a></li>
				<li><a target="_blank" href="{{ route('site.home') }}">Site</a></li>
				@if(Auth::guest())
				<li><a href="{{ route('admin.login') }}">Login</a></li>
				@else
				<!-- menu-dropdown -->
				<li><a class="dropdown-trigger" data-target="dropdown_admin">Conteúdo<i class="material-icons right">arrow_drop_down</i></a></li>
				<!-- itens do menu-dropdown -->
				<ul id="dropdown_admin" class="dropdown-content">
					<li><a href="{{ route('admin.tipos') }}">Tipos de imóvel</a></li>
					<li><a href="{{ route('admin.cidades') }}">Cidades</a></li>
					<li><a href="{{ route('admin.imoveis') }}">Imóveis</a></li>
					<li><a href="{{ route('admin.slides') }}">Slides</a></li>
					<li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
					<li><a href="{{ route('admin.papel') }}">Papel</a></li>
					<li><a href="{{ route('admin.paginas') }}">Páginas</a></li>
					<li><a href="{{ route('admin.sair') }}">Sair</a></li>
				</ul>
				<!-- fim do menu-dropdown -->
				<li><a href="#">{{ Auth::user()->name }}</a></li>
				<li><a href="{{ route('admin.sair') }}">Sair</a></li>
				@endif
			</ul>
			<ul class="sidenav" id="mobile-demo">
				<li><a href="{{ route('admin.home') }}">Início</a></li>
				<li><a href="{{ route('site.home') }}">Site</a></li>
				@if(Auth::guest())
				<li><a href="{{ route('admin.login') }}">Login</a></li>
				@else
				<li><a href="#">{{ Auth::user()->name }}</a></li>
				<li><a href="{{ route('admin.tipos') }}">Tipos de imóvel</a></li>
				<li><a href="{{ route('admin.cidades') }}">Cidades</a></li>
				<li><a href="{{ route('admin.imoveis') }}">Imóveis</a></li>
				<li><a href="{{ route('admin.slides') }}">Slides</a></li>
				<li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
				<li><a href="{{ route('admin.papel') }}">Papel</a></li>
				<li><a href="{{ route('admin.paginas') }}">Páginas</a></li>
				<li><a href="{{ route('admin.sair') }}">Sair</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>