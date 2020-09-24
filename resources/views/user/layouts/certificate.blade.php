<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <style type="text/css">
        /* Algum colorido legal */
        * {
            border: 0;
            margin: 0;
            padding: 0;
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            font-family: Roboto, sans-serif;
        }

        body,
        html {

            height: 100%;
            margin: 0;
            padding: 0
        }

        header {
            height: 242px;

        }

        main {
            margin-top: 180px;
            padding-right: 320px;
            padding-left: 40px;
        }

        footer {
            position: absolute;
            bottom: 10px;
            right: 15px;
            float: right;
            color: white;
        }

        footer strong {
            font-size: 80%;
            display: block;
        }

        footer span.code {
            font-size: 80%;
        }

    </style>

    <title>{{ $title ?? 'Certificado' }}</title>
</head>

<body style="background: url({{ storage_path('app/certificate/background.png') }})">
    <header>

    </header>
    <main>
        <div class="">
            <h2 class="text-justify">
                {{ $certificate_text ?? '' }}
            </h2>
        </div>
    </main>

    <footer>
        <strong>Código de verificação</strong>
        <span class="code">b29c85d1-d105-45fb-82bb-bfed77da9404</span>
    </footer>
</body>


</html>
