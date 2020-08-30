@extends('user.layouts.app')

@section('page-title', '')

@section('page-before-title-content')
    <a href="{{ url()->previous() }}" class="btn btn-light btn-icon-split m-1">
        <span class="icon text-white-50">
            <i class="fa fa-arrow-left"></i>
        </span>
        <span class="text">
            Voltar
        </span>
    </a>
@endsection

@section('page-content')

    <div class="card border-0">
        <div class="card-header">
            <h4>
                <strong>Turma {{ $team->title }} - {{ $team->activity->title }}</strong>
            </h4>
        </div>
        <div class="card-body">
            <strong>Informações sobre o evento:</strong>

            <div class="mt-4">
                <p>
                    <strong>Período de Realização:</strong>
                    <span class="text-gray-600">
                        {{ date('d/m/Y', strtotime($team->start)) }} -
                        {{ date('d/m/Y', strtotime($team->end)) }}
                    </span>
                </p>
                <p>
                    <strong>Carga horária:</strong>
                    <span class="text-gray-600">
                        {{ $team->activity->workload }} Horas
                    </span>
                </p>
                <p>
                    <strong class="mr-2">Modelo de certificado: </strong>
                    <span>
                        <a href="#" class="badge badge-info p-2">
                            Visualizar
                        </a>

                        <a href="#" class="badge badge-info p-2">
                            Alterar Modelo
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>

    <br>

    <div class="card border-0">
        <div class="card-body">
            <strong>Participantes: </strong>
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-secondary m-1">
                    Adicionar Participante
                </button>

                <button class="btn btn-secondary m-1">
                    Importar Participantes
                </button>

                <button class="btn btn-secondary m-1">
                    Enviar Certificado por E-mail
                </button>
            </div>

            <div class="d-flex mt-1">
                <button class="btn btn-danger btn-icon-split m-1">
                    <span class="icon text-white-50">
                        <i class="fa fa-trash"></i>
                    </span>
                    <span class="text">
                        Remover selecionados
                    </span>
                </button>
            </div>

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

                        @for ($i = 0; $i <= 20; $i++)

                            <tr class="text-gray-600">
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"
                                            value="option1">
                                    </div>
                                </td>
                                <td>Renan Felipe Brito Dantas</td>
                                <td>renan.fb.dantas@gmail.com</td>
                                <td class="">000.123.123-00</td>
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
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
