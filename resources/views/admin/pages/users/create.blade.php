<div class="card shadow">

    <a href="#usersCreate" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false"
        aria-controls="usersCreate">
        <h6 class="m-0 font-weight-bold text-primary">Novo usuário</h6>
    </a>

    <div class="collapse show" id="usersCreate">
        <div class="card-body">
            <h5 class="card-title ">Dados de usuário</h5>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="name">Nome</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="email">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-2 col-md-6">
                        <label class="text-gray-600" for="password">Senha</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-2 col-md-6">
                        <label class="text-gray-600" for="password_confirmation">Confirmar</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password') is-invalid @enderror">

                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <div class="custom-control custom-switch">
                            <input name="admin" type="checkbox" class="custom-control-input" id="administratorSwitch"
                                {{ old('admin') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="administratorSwitch">Administrador</label>
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <div class="custom-control custom-switch">
                            <input name="active" type="checkbox" class="custom-control-input" id="activeSwitch" checked >
                            <label class="custom-control-label" for="activeSwitch">Ativado</label>
                        </div>
                    </div>
                </div>

                <hr>

                <h5 class="card-title">Dados da Empresa</h5>

                <div class="form-row">
                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="company_name">Nome da Empresa</label>
                        <input type="text" name="company_name" id="company_name"
                            class="form-control @error('company_name') is-invalid @enderror"
                            value="{{ old('company_name') }}">
                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="company_cnpj">CNPJ</label>
                        <input type="text" name="company_cnpj" id="company_cnpj"
                            class="form-control @error('company_cnpj') is-invalid @enderror"
                            value="{{ old('company_cnpj') }}">
                        @error('company_cnpj')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="company_address">Endereço</label>
                        <input type="text" name="company_address" id="company_address"
                            class="form-control @error('company_address') is-invalid @enderror"
                            value="{{ old('company_address') }}">
                        @error('company_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="company_address">Site</label>
                        <input type="text" name="company_site" id="company_site"
                            class="form-control @error('company_site') is-invalid @enderror"
                            value="{{ old('company_site') }}">
                        @error('company_site')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                        <label class="text-gray-600" for="company_contact">Telefone para contato</label>
                        <input type="text" name="company_contact" id="company_contact"
                            class="form-control @error('company_contact') is-invalid @enderror"
                            value="{{ old('company_contact') }}">
                        @error('company_contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-12 col-md-12">
                        <label class="text-gray-600" for=""></label>
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


</div>
