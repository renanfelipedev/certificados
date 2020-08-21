@extends('layouts.master')

@section('app')
    {{-- Page Wrapper --}}
    <div id="wrapper">


        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content --}}
            <div id="content">

                {{-- Topbar --}}
                @include('layouts.partials.topbar')

                {{-- Page Content --}}
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('page-title', 'Dashboard')</h1>

                    </div>

                    @yield('page-content')

                </div>
                {{-- End Page Content --}}

            </div>
            {{-- End Main Content --}}

            @include('layouts.partials.footer')

        </div>
        {{-- End Content Wrapper --}}
    </div>
    {{-- End Page Wrapper --}}

@endsection
