@extends('user.layouts.app')

@section('page-title', 'Gestão de Turmas')

@section('page-title-content')

    <a href="{{ route('turmas.create') }}" class="btn  btn-success">
        <i class="fa fa-plus"></i> Nova Turma
    </a>

@endsection

@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Turmas</li>
        </ol>
    </nav>

    @if (count($teams) < 1)
        <div class="alert alert-primary">
            <i class="fa fa-info-circle"></i> Nenhuma turma cadastrada
        </div>
    @else
        <div class="card shadow">
            <a href="#activitiesList" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="activitiesList">
                <h6 class="m-0 font-weight-bold text-primary">Atividades Cadastradas</h6>
            </a>

            <div class="collapse show" id="activitiesList">

                <div class="card-body table-responsive-md">
                    <table class="table table-hover">
                        <thead cla>
                            <tr>
                                <th>Identificação da Turma</th>
                                <th>Data de Início</th>
                                <th>Data de Término</th>
                                <th>Atividade</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td>Turma {{ $team->title }}</td>
                                    <td>{{ date('d/m/Y', strtotime($team->start)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($team->end)) }}</td>
                                    <td>
                                        <strong>Tipo:</strong> {{ $team->activity->type->title }}
                                        <br>
                                        <strong>Título:</strong> {{ $team->activity->title }}
                                        <br>
                                        <strong>Carga Horária:</strong> {{ $team->activity->workload }}
                                    </td>
                                    <td>
                                        <button class="btn btn-secondary btn-icon-split m-1" data-toggle="modal"
                                            data-target="#activitiesShowModal-{{ $team->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-search"></i>
                                            </span>
                                            <span class="text">
                                                Detalhes
                                            </span>
                                        </button>

                                        <a href="{{ route('turmas.edit', $team->id) }}"
                                            class="btn btn-secondary btn-icon-split m-1 ">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            <span class="text">
                                                Editar
                                            </span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split m-1 " data-toggle="modal"
                                            data-target="#deleteModal-{{ $team->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span class="text">
                                                Excluir
                                            </span>
                                        </a>

                                        <x-delete-modal modalId="deleteModal-{{ $team->id }}"
                                            message="Deseja realmente excluir?" btnText="Excluir"
                                            formAction="{{ route('turmas.destroy', $team->id) }}"
                                            formName="deleteForm{{ $team->id }}" />

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    @endif

@endsection
