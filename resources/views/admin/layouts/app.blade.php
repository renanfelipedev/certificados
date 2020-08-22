@extends('master')

@section('app')
    {{-- Page Wrapper --}}
    <div id="wrapper">


        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content --}}
            <div id="content">

                {{-- Topbar --}}
                @include('admin.layouts.topbar')

                {{-- Page Content --}}
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('page-title', 'Dashboard')</h1>
                        @yield('page-header')

                    </div>

                    @yield('page-content')

                </div>
                {{-- End Page Content --}}

            </div>
            {{-- End Main Content --}}

            @include('admin.layouts.footer')

        </div>
        {{-- End Content Wrapper --}}
    </div>
    {{-- End Page Wrapper --}}

@endsection
