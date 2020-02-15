<nav>
    <!-- ver tabelas de cores em: https://materializecss.com/color.html -->
    <div class="nav-wrapper blue-grey lighten-2">
        <div class="container">
            <a href="{{ route('site.home') }}" class="brand-logo"><span style="font-style: italic">INOVA<sup>+</sup> imóveis</span></a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('site.home') }}">Home</a></li>
                <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a></li>
            </ul>
            <ul class="sidenav" id="mobile-demo">
                <li><a href="{{ route('site.home') }}">Home</a></li>
                <li><a href="{{ route('site.sobre') }}">Sobre</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>