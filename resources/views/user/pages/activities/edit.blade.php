@extends('user.layouts.app')

@section('page-title', 'Editar Atividade')



@section('page-content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('activities.index') }}">Atividades</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Editar Atividade</li>
        </ol>
    </nav>


    <div class="card shadow">

        <a href="#activitiesCreate" class="d-block card-header py-3" data-toggle="collapse" role="button"
            aria-expanded="false" aria-controls="activitiesCreate">
            <h6 class="m-0 font-weight-bold text-primary">Editar atividade</h6>
        </a>

        <div class="collapse show" id="activitiesCreate">
            <div class="card-body">
                <h5 class="card-title">Dados de atividade</h5>

                <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-row">

                        <div class="form-group col-lg-3 col-md-4">
                            <label for="type" class="text-gray-700">Tipo </label>
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
                                id="type" autofocus value="{{ old('type', $activity->type) }}">
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Curso | Treinamento | Oficina
                            </small>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6 col-md-8">
                            <label for="title" class="text-gray-700">Título da atividade</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                id="title" value="{{ old('title', $activity->title) }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-3 col-md-4">
                            <label for="workload" class="text-gray-700">Carga Horária</label>
                            <div class="input-group">
                                <input type="text" name="workload"
                                    class="form-control @error('workload') is-invalid @enderror" id="workload"
                                    value="{{ old('workload', $activity->workload) }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Horas</span>
                                </div>
                            </div>

                            <small class="form-text text-muted">
                                Somente números
                            </small>

                            @error('workload')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <hr>

                    <div class="form-row">
                        <div class="form-group col-lg-2 col-md-4 col-sm-6">
                            <label for="start" class="text-gray-700">Data de início</label>
                            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror"
                                id="start" value="{{ old('start', $activity->start) }}">
                            @error('start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-2 col-md-4 col-sm-6">
                            <label for="end" class="text-gray-700">Data de Término</label>
                            <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" id="end"
                                value="{{ old('end', $activity->end) }}">
                            @error('end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="editor" class="text-gray-700">Conteúdo Programático</label>
                            <textarea name="content" id="editor" rows="5"
                                class="form-control">{{ old('content', $activity->content) }}</textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label class="text-gray-600" for=""></label>
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Cadastrar Atividade
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
