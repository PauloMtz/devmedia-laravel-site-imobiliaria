<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!--Import Google Icon Font [Fonte: https://materializecss.com/getting-started.html] -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- configuração do Materialize [ ver no rodapé da página configurações jQuery ] -->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/materialize/dist/css/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}"><!-- CTRL + SHIFT + D duplica linha -->

</head>
<body id="app-layout">
    <header>
        @include('layouts.site._nav')
    </header>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="#">Home</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Contato</a></li>
    </ul>
    <main>
        @yield('content')
    </main>

    <footer class="page-footer blue-grey lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Footer Content</h5>
                    <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="{{ route('site.home') }}">Home</a></li>
                        <li><a class="grey-text text-lighten-3" href="{{ route('site.sobre') }}">Sobre</a></li>
                        <li><a class="grey-text text-lighten-3" href="{{ route('site.contato') }}">Contato</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &copy; Todos os direitos reservados | 2017 - <?php echo date('Y') ?>
                <a class="grey-text text-lighten-4 right" target="_blank" href="https://www.devmedia.com.br/curso/laravel-criando-um-website-completo/1930">Curso de Laravel - DevMedia</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script><!-- CTRL + SHIFT + D duplica linha -->

</body>
</html>
