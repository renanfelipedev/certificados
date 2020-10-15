<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }} - Validar certificado</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html,
        body,
        main {
            height: 100%;
            background-color: #f5f5f5;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .form-validar-certificado {
            border-radius: 4px;
            width: 100%;
            max-width: 400px;

            margin: auto;
        }

        .form-validar-certificado .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-validar-certificado .form-control:focus {
            z-index: 2;
        }

        .form-validar-certificado input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-validar-certificado input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>

    @stack('styles')
</head>

<body>
    <main>
        <div class="container">
            <form action="{{ route('verificar.certificado') }}" class="form-validar-certificado" method="POST">
                @csrf

                <h1 class="h4 mb-3 text-center font-weight-normal">Informe o código de validação</h1>
                <div class="form-group">

                    <label for="code" class="sr-only">Password</label>
                    <input class="form-control form-control-user" type="text" id="code" name="code"
                        placeholder="Código de validação" autofocus required>
                </div>

                <div class="form-group">
                    <button class="btn btn-block btn-success mt-3" type="submit">
                        <i class="fa fa-check mr-2"></i> Validar
                    </button>
                </div>
                @if ($errors->verify->first())
                    <div class="alert alert-danger text-center">{{ $errors->verify->firsT() }}</div>

                @endif
                <hr>
                <div class="form-group">
                    <a href="{{ route('login') }}" class="btn btn-block btn-sm btn-light mt-3" type="submit">
                        <i class="fa fa-arrow-left mr-2"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
