<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ trans('installer_messages.title') }}</title>
        <link href="{{ asset('/css/argon.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/fa.css') }}" rel="stylesheet">
        @yield('style')
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!}
        </script>
    </head>
    <body class="bg-default">
        <div class="main-content">
            <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark"></nav>
            <div class="header bg-gradient-primary py-7 py-lg-8">
                <div class="container">
                    @if (session('message'))
                        <div class="alert alert-warning text-center">
                            <strong>
                                @if(is_array(session('message')))
                                    {{ session('message')['message'] }}
                                @else
                                    {{ session('message') }}
                                @endif
                            </strong>
                        </div>
                    @endif
                    @if(session()->has('errors'))
                        <div class="alert alert-danger" id="error_alert">
                            <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                            <h4>
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                {{ trans('installer_messages.forms.errorTitle') }}
                            </h4>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="header-body text-center mb-7">
                        <h3 class="text-light">Welcome to Saturn's Installer!</h3>
                        <p class="text-light">If you need any assistance let us know!</p>
                    </div>
                </div>
            </div>

            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-5">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-5">
                                <nav class="nav nav-pills nav-fill">
                                        @if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                                            <a class="nav-item bg-primary card-link nav-link shadow-none" href="{{ route('LaravelInstaller::requirements') }}">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-white">
                                                    <i class="fas fa-list fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-white">Requirements</h5>
                                                </div>
                                            </a>
                                        @else
                                            <a class="nav-item card-link nav-link shadow-none disabled" href="#">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-dark">
                                                    <i class="fas fa-list fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-dark">Requirements</h5>
                                                </div>
                                            </a>
                                            @endif

                                        @if(Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                                            <a class="nav-item bg-primary card-link nav-link shadow-none" href="{{ route('LaravelInstaller::permissions') }}">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-white">
                                                    <i class="fas fa-key fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-white">Permissions</h5>
                                                </div>
                                            </a>
                                        @else
                                            <a class="nav-item card-link nav-link shadow-none disabled" href="#">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-dark">
                                                    <i class="fas fa-key fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-dark">Permissions</h5>
                                                </div>
                                            </a>
                                            @endif
                                        @if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') )
                                            <a class="nav-item bg-primary card-link nav-link shadow-none" href="{{ route('LaravelInstaller::environment') }}">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-white">
                                                    <i class="fas fa-cog fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-white">Environment</h5>
                                                </div>
                                            </a>
                                            @else
                                            <a class="nav-item card-link nav-link shadow-none disabled" href="#">
                                                <div class="d-flex flex-column justify-content-center align-items-center text-dark">
                                                    <i class="fas fa-cog fa-fw fa-1x"></i>
                                                    <h5 class="card-link text-dark">Environment</h5>
                                                </div>
                                            </a>
                                            @endif
                                </nav>
                            </div>
                            <div class="card-body">
                                @yield('container')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('scripts')
        <script type="text/javascript">
            let x = document.getElementById('error_alert');
            let y = document.getElementById('close_alert');
            y.onclick = function() {
                x.style.display = "none";
            };
        </script>
        <script src="{{ asset('/js/jquery.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.js') }}"></script>
        <script src="{{ asset('/js/argon.js') }}"></script>
    </body>
</html>
