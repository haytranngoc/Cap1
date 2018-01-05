<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">System <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('admin.roles.index') }}">Roles</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Location <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.countries.index') }}">Country</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.cities.index') }}">City</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.schools.index') }}">School</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Student <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.candidates.index') }}">Candidate</a></li>
                                <li role="separator" class="divider"></li>
                                {{-- <li><a href="{{ route('admin.candidateTypes.index') }}">Candidate Type</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.applies.index') }}">Apply Type</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.areas.index') }}">Area</a></li>
                                <li role="separator" class="divider"></li> --}}
                                <li><a href="{{ route('admin.branches.index') }}">Branch</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.specializeds.index') }}">Specialized</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.subjects.index') }}">Subject</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.sets.index') }}">Subject Set</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Article <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.tags.index') }}">Tags</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.categories.index') }}">Category</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.posts.index') }}">Post</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lightbox.min.js') }}"></script>
    @yield('scripts')
</body>
</html>
