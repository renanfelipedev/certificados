<div class="card shadow">

    <div class="card-body table-responsive-md">
        <table class="table table-hover table-borderless ">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Tipo</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if(auth()->user()->id != $user->id )
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

                            <form action="{{ route('users.toggleActive', $user->id) }}" method="POST" id="toggleUserActivationForm-{{ $user->id }}">
                                @csrf
                            </form>

                            <div>

                                <a href="#" class="btn btn-danger btn-icon-split btn-sm">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                    <span class="text">
                                        Excluir
                                    </span>
                                </a>


                                @if ($user->active)

                                <button type="submit" class="btn btn-danger btn-icon-split btn-sm" form="toggleUserActivationForm-{{ $user->id }}">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-minus"></i>
                                    </span>
                                    <span class="text">
                                        Desativar
                                    </span>
                                </button>

                                @else

                                <button type="submit" class="btn btn-success btn-icon-split btn-sm" form="toggleUserActivationForm-{{ $user->id }}">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-minus"></i>
                                    </span>
                                    <span class="text">
                                        Ativar
                                    </span>
                                </button>

                                @endif
                        </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
