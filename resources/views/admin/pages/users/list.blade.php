@if (count($users) > 0)
    <div class="card shadow ">

        <a href="#usersList" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false"
            aria-controls="usersList">
            <h6 class="m-0 font-weight-bold text-primary">Lista de usuários</h6>
        </a>


        <div class="collapse show" id="usersList">
            <div class="card-body table-responsive-md">
                <table class="table table-hover table-borderless table-sm">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Data de Cadastro</th>
                            <th class="float-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if (auth()->user()->id != $user->id)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->active)
                                            <span class="badge badge-success">Ativado</span>
                                        @else
                                            <span class="badge badge-danger">Desativado</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->admin)
                                            <span class="badge badge-primary">Administrador</span>
                                        @else
                                            <span class="badge badge-secondary">Usuário padrão</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ date('d/m/Y', strtotime($user->created_at)) }}
                                    </td>
                                    <td class="float-right">

                                        <form action="{{ route('users.toggleActive', $user->id) }}" method="POST"
                                            id="toggleUserActivationForm-{{ $user->id }}">
                                            @csrf
                                        </form>

                                        <div>

                                            @if ($user->active)

                                                <button type="submit" class="btn btn-danger btn-icon-split btn-sm"
                                                    form="toggleUserActivationForm-{{ $user->id }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <span class="text">
                                                        Desativar
                                                    </span>
                                                </button>

                                            @else

                                                <button type="submit" class="btn btn-success btn-icon-split btn-sm"
                                                    form="toggleUserActivationForm-{{ $user->id }}">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-minus"></i>
                                                    </span>
                                                    <span class="text">
                                                        Ativar
                                                    </span>
                                                </button>

                                            @endif

                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-icon-split btn-sm m-1">
                                                <span class="icon">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                                <span class="text">
                                                    Editar
                                                </span>
                                            </a>

                                            <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal"
                                                data-target="#deleteModal-{{ $user->id }}">
                                                <span class="icon text-white-50">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                                <span class="text">
                                                    Excluir
                                                </span>
                                            </a>

                                            <x-delete-modal modalId="deleteModal-{{ $user->id }}"
                                                message="Deseja realmente excluir?" btnText="Excluir"
                                                formAction="{{ route('users.destroy', $user->id) }}"
                                                formName="deleteForm{{ $user->id }}" />



                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-primary">
        <i class="fa fa-info-circle"></i> Nenhum usuário cadastrado
    </div>
@endif
