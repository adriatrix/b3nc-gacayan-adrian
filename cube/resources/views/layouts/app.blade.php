<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cube') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js" integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Icons -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-expand-md navbar-dark navbar-laravel" style="background-color: #004b8d;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Cube') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                       <!-- <li><a class="nav-link" href="{{url("/orders")}}">Orders</a></li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                           <li class="nav-item">
                              <a class="nav-link" href="{{url("/customers")}}">Customers</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="{{url("/orders")}}">Orders</a>
                           </li>
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->nickname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="text-light my-footer py-5">
        	<div class="container">
        		<div class="content text-center">
        			<div class="row justify-content-center">
        				<div class="col-9 text-left">
        					<p>Contact Me</p>
        					<dl>
        						<dt><small class="font-weight-bold">Email: </small>
        							<span class="h6">adrian.gacayan@Emerson.com</span>
        						</dt>
        						<dt><small class="font-weight-bold">Address: </small>
        							<span class="h6">16/F SM Cyber West Ave cor. EDSA, Bulacan, Project 7, Quezon City, 1105</span>
        						</dt>
        						<dt><small class="font-weight-bold">Contact No.: </small>
        							<span class="h6">(02) 479-5100</span>
        						</dt>
        					</dl>
        				</div>
        				<div class="col-3 text-center">
        					<p>Visit me at social media!</p>
        					<p class="field">
        						<a class="btn btn-md text-primary">
        							<span>
        								<i class="fab fa-facebook fa-2x"></i>
        							</span>
        						</a>
        						<a class="btn btn-md text-warning">
        							<span>
        								<i class="fab fa-instagram fa-2x"></i>
        							</span>
        						</a>
        						<a class="btn btn-md text-info">
        							<span>
        								<i class="fab fa-twitter fa-2x"></i>
        							</span>
        						</a>
        						<a class="btn btn-md text-danger">
        							<span>
        								<i class="fab fa-pinterest fa-2x"></i>
        							</span>
        						</a>
        					</p>

        				</div>
        			</div>
        			<hr>
        			<p>Copyright &copy; 2018 Adrian's Cube by <a class="is-white" href="https://github.com/adriatrix">Adrian Gacayan</a></p>
        		</div>
        	</div>
        </footer>
    </div>
    @yield('scripts')
</body>
</html>
