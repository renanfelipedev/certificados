@extends('admin.layouts.app')

@section('page-title', '')

@section('page-content')

    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Usuários</li>
        </ol>
    </nav> --}}


    @include('admin.pages.users.list')
    <br>
    @include('admin.pages.users.create')

@endsection
