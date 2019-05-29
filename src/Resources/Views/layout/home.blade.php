@extends('wave::layout.default')
@section('layout.body')
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('wave.home') }}"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
    <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown" style="padding-right: 16px">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Gravatar::src(Auth::guard('wave')->user()->email) }}" class="img-avatar" alt="{{ Auth::guard('wave')->user()->email }}">
            </a>
        </li>
    </ul>
</header>
<div class="app-body">
    {{-- Sidebar component --}}
    @component('library::Elements.Home.Sidebar')
    <main class="main">
        @component('library::Elements.Home.Breadcrumb')
        <div class="container-fluid">
            @yield('home.body')
        </div>
    </main>
</div>
@endsection
@section('layout.footer')
    @component('library::Elements.Home.Footer')
@endsection