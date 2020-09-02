<div class="table-responsive">
    <table class="table table-striped table-borderless table-sm mt-4 p-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="text-gray-600">
                    <td>
                        <div class="form-check">
                            <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                value="option1">
                        </div>
                    </td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td class="">{{ $student->cpf }}</td>
                    <td class="float-right">
                        <button class="btn btn-secondary btn-icon-split m-1">
                            <span class="icon text-white-50">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span class="text">
                                Editar
                            </span>
                        </button>
                        <button class="btn btn-secondary btn-icon-split m-1">
                            <span class="icon text-white-50">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Imprimir
                            </span>
                        </button>
                    </td>
                </tr>
            @empty
                <br>
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> Nenhum participante cadastrado
                </div>
            @endforelse
        </tbody>
    </table>
</div>

