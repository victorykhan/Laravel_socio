<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Socio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
           
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>SOCIO</b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    

                    
                        <!-- Authentication Links -->
                        @guest
                        <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                              
                                <li><a class="nav-link" href="{{ url('textpost') }}">{{ __('Post') }}</a></li>
                                <li><a class="nav-link" href="{{ url('video') }}">{{ __('Video') }}</a></li>
                                <li><a class="nav-link" href="{{ url('picture') }}">{{ __('Picture') }}</a></li>

                            </ul>
                        <!-- Right Side Of Navbar -->
                          <ul class="navbar-nav ml-auto">
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                          </ul>

                            @else
                           
                             @if (Auth::user()->hasRole('ROLE_ADMIN') || Auth::user()->hasRole('ROLE_SUPERADMIN'))
                          
                             <ul class="navbar-nav mr-auto">
                                <li><a class="nav-link" href="{{ url('category') }}">{{ __('Category') }}</a></li>
                                <li><a class="nav-link" href="{{ url('textpost') }}">{{ __('Post') }}</a></li>
                                <li><a class="nav-link" href="{{ url('video') }}">{{ __('Video') }}</a></li>
                                <li><a class="nav-link" href="{{ url('picture') }}">{{ __('Picture') }}</a></li>

                             </ul>

                           


                             
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link " href="{{route('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;"/>
                            </a>
                            </li>
                            <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ url('/home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  
                                    {{ Auth::user()->fname }}  {{ Auth::user()->lname }} <span class="caret"></span> 
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                     <a class="dropdown-item" href="{{ url('/home') }}">
                                        {{ __('Dashboard') }}
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                    
                                     <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('User Profile') }}
                                        </a>

                                         
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>

                            @else


                             <ul class="navbar-nav mr-auto">
                               
                                <li><a class="nav-link" href="{{ url('textpost') }}">{{ __('Post') }}</a></li>
                                <li><a class="nav-link" href="{{ url('video') }}">{{ __('Video') }}</a></li>
                                <li><a class="nav-link" href="{{ url('picture') }}">{{ __('Picture') }}</a></li>

                             </ul>

                           


                             
                          <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link " href="{{route('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%;margin-right:10px;"/>
                            </a>
                            </li>
                            <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  
                                    {{ Auth::user()->fname }}  {{ Auth::user()->lname }} <span class="caret"></span> 
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/home') }}">
                                        {{ __('Dashboard') }}
                                        </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        </a>
                                    
                                     <a class="dropdown-item" href="{{ url('/profile') }}">
                                        {{ __('User Profile') }}
                                        </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>



                     
                    @endif

            @endguest
                </div>

                 
           
        </nav>

        <main class="py-4">
            @yield('content')
        </main>


      
    </div>
    @yield('scripts')
</body>
</html>
