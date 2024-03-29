@extends('master')

@section('app')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
                                    </div>

                                    @if (session('error'))
                                        <div class="text-center">
                                            <div class="alert alert-danger  fade show" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" placeholder="Informe seu endereço de e-mail"
                                                autofocus />
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Password" autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input class="custom-control-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="custom-control-label" for="remember">
                                                    {{ __('Permanecer conectado') }}
                                                </label>


                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            Acessar
                                        </button>
                                        <hr>

                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                                    </div>

                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Cria uma conta!</a>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <a href="{{ route('validar.certificado') }}"
                                            class="btn btn-sm btn-light btn-icon-split">
                                            <span class="text">Valide seu certificado</span>
                                            <span class="icon text-gray-600">
                                                <i class="fas fa-check"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
