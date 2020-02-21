<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
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
        @include('layouts.admin._nav')
    </header>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="#">Home</a></li>
    </ul>
    <main>
        <!-- essa 'mensagem' foi definida lá no UsuarioController -->
        @if(Session::has('mensagem'))
        <div class="container">
            <div class="row">
                <!-- 'mensagem' e ['class'] vêm de UsuarioController -->
                <div class="card {{ Session::get('mensagem')['class'] }}">
                    <div class="card-content" align="center">
                        {{ Session::get('mensagem')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @yield('content')
    </main>

    <footer class="page-footer blue-grey lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">SisAdmin</h5>
                    <p>Curso de Laravel - DevMedia</p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Links</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" target="_blank" href="{{ route('site.home') }}">Site</a></li>
                        <li><a class="grey-text text-lighten-3" href="{{ route('admin.home') }}">Início</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © Todos os direitos reservados | 2020
                <a class="grey-text text-lighten-4 right" href="#!">Mais Links...</a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('lib/materialize/dist/js/materialize.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script><!-- CTRL + SHIFT + D duplica linha -->

</body>
</html>