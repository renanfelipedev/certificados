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
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-validar-certificado {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-validar-certificado .checkbox {
            font-weight: 400;
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
    <div class="container">
        <form action="{{ route('validar.certificado') }}" class="form-validar-certificado" method="POST">
            @csrf

            <h1 class="h4 mb-3 text-center font-weight-normal">Informe o código de validação</h1>
            <label for="code" class="sr-only">Password</label>
            <input type="text" id="code" name="code" class="form-control" placeholder="Código de validação" autofocus required>

            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Validar</button>
        </form>
    </div>
</body>

</html>
