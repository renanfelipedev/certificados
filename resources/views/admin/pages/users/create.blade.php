<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group col-lg-4 col-md-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group col-lg-4 col-md-12">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-6">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-lg-2 col-md-6">
                    <label for="password_confirmation">Confirmar</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password') is-invalid @enderror">

                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <div class="custom-control custom-switch">
                        <input name="admin" type="checkbox" class="custom-control-input" id="administratorSwitch">
                        <label class="custom-control-label" for="administratorSwitch">Administrador</label>
                      </div>
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <div class="custom-control custom-switch">
                        <input name="active" type="checkbox" class="custom-control-input" id="activeSwitch">
                        <label class="custom-control-label" for="activeSwitch">Ativado</label>
                      </div>
                </div>

                <div class="form-group col-lg-12 col-md-12">
                    <label for=""></label>
                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa fa-user-plus"></i>
                        </span>
                        <span class="text">
                            Cadastrar usuário
                        </span>
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>