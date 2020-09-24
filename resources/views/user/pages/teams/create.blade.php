@extends('user.layouts.app')

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

@section('page-title', '')

@section('page-content')

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item " aria-current="page">
                <a href="{{ route('turmas.index') }}">Turmas</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Turma</li>
        </ol>
    </nav> --}}


    <div class="card shadow">

        {{-- <a href="#teamsCreate" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="teamsCreate">
            <h6 class="m-0 font-weight-bold text-primary">Cadastro de Nova atividade</h6>
        </a> --}}

        <div class="collapse show" id="teamsCreate">
            <div class="card-body">
                <br>
                <form action="{{ route('turmas.store') }}" method="POST">
                    @csrf

                    <div class="form-group row align-items-center">
                        <label for="activity_id" class="text-gray-700 col-lg-3 col-md-5 col-form-label">
                            <strong>Selecione a
                                atividade</strong>
                        </label>
                        <div class="col-lg-9 col-md-7">
                            @empty($activities)
                                <a href="{{ route('activities.create') }}" class="btn btn-light">Cadastre sua primeira
                                    atividade</a>
                            @else

                                <select name="activity_id" id="activity_id"
                                    class="custom-select @error('activity_id') is-invalid @enderror">
                                    <option value="" selected disabled>Selecione a atividade</option>
                                    @foreach ($activities as $activity)
                                        <option value="{{ $activity->id }}"
                                            {{ old('activity_id') == $activity->id ? 'selected' : '' }}>
                                            {{ $activity->title }} - {{ $activity->workload }} Horas
                                        </option>
                                    @endforeach
                                </select>

                            @endempty

                            @error('activity_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <hr>

                    <div class="form-row">

                        <div class="form-group col-lg-12">
                            <label for="title">Identificação da turma</label>
                            <input type="text" name="title" id="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="start" class="text-gray-700">Data de início</label>
                            <input type="date" name="start" class="form-control @error('start') is-invalid @enderror"
                                id="start" value="{{ old('start') }}">
                            @error('start')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="end" class="text-gray-700">Data de Término</label>
                            <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" id="end"
                                value="{{ old('end') }}">
                            @error('end')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12 my-4">
                            <label for="certificate_text">Texto do certificado</label>
                            <textarea name="certificate_text" id="certificate_text" class="form-control" cols="30"
                                rows="10">{{ old('certificate_text') }}</textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label class="text-gray-600" for=""></label>
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">
                                    Cadastrar Nova Turma
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
