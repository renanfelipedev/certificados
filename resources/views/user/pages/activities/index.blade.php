@extends('user.layouts.app')

@section('page-title', 'Gestão de Atividades')

@section('page-title-content')

    <a href="{{ route('activities.create') }}" class="btn  btn-success">
        <i class="fa fa-plus"></i> Nova Atividade
    </a>

@endsection

@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Atividades</li>
        </ol>
    </nav>

    @if (count($activities) < 1)
        <div class="alert alert-primary">
            <i class="fa fa-info-circle"></i> Nenhuma atividade cadastrada
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
                                <th>Tipo</th>
                                <th>Título</th>
                                <th>Carga horária</th>
                                <th>Data de início</th>
                                <th>Data de término</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->type }}</td>
                                    <td>{{ $activity->title }}</td>
                                    <td>{{ $activity->workload }} Horas</td>
                                    <td>{{ date('d/m/Y', strtotime($activity->start)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($activity->end)) }}</td>
                                    <td>
                                        <a href="{{ route('student.create', $activity->id) }}" class="btn btn-primary btn-icon-split m-1">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-user-plus"></i>
                                            </span>
                                            <span class="text">Cadastrar alunos</span>
                                        </a>

                                        <button class="btn btn-secondary btn-icon-split m-1" data-toggle="modal"
                                            data-target="#activitiesShowModal-{{ $activity->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-search"></i>
                                            </span>
                                            <span class="text">
                                                Detalhes
                                            </span>
                                        </button>


                                        <a href="{{ route('activities.edit', $activity->id) }}"
                                            class="btn btn-secondary btn-icon-split m-1 ">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                            <span class="text">
                                                Editar
                                            </span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split m-1 " data-toggle="modal"
                                            data-target="#deleteModal-{{ $activity->id }}">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                            <span class="text">
                                                Excluir
                                            </span>
                                        </a>

                                        @include('user.pages.activities.show')

                                        <x-delete-modal modalId="deleteModal-{{ $activity->id }}"
                                            message="Deseja realmente excluir?" btnText="Excluir"
                                            formAction="{{ route('activities.destroy', $activity->id) }}"
                                            formName="deleteForm{{ $activity->id }}" />
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
