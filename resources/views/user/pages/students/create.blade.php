<div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStudentModal">Cadastro de Participante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alunos.store', $team->id) }}" method="POST" id="createStudentForm">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-lg-12">
                            <label for="name">Nome: </label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="cpf">CPF: </label>
                            <input type="text" name="cpf" id="cpf"
                                class="form-control @error('cpf') is-invalid @enderror" value="{{ old('cpf') }}">
                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="birthdate">
                                Data de nascimento:
                                <span class="badge badge-primary">opcional *</span>
                            </label>
                            <input type="date" name="birthdate" id="birthdate"
                                class="form-control @error('birthdate') is-invalid @enderror"
                                value="{{ old('birthdate') }}">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success btn-icon-split m-1" form="createStudentForm">
                    <span class="icon text-white-50">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Adicionar
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
