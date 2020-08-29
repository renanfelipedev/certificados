@extends('user.layouts.app')

@section('page-content')

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="{{ route('activities.index') }}" class="card-link">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Atividades Cadastradas
                                </div>
                                <span class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ auth()->user()->activities->count() }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-copy fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>




    </div>

@endsection
