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
				<li><a href="{{ route('admin.sair') }}">Sair</a></li>
				@endif
			</ul>
		</div>
	</div>
</nav>