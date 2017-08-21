   <!doctype>
   <html>
    <head><link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"></head>
   </html>
   <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}" type="text/css">
    <nav class="navbar navbar-inverse">
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
                <div>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav">
                    <li><a href="/about">About</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/posts">Blog</a></li>
                    <li><a href="/pets">Pets</a></li>
                    </ul>

                 </div>
                <!-- Right Side Of Navbar -->
                
                <ul class="nav navbar-nav navbar-right">

                {!! Form::open([Request::get('search'),'route' => 'products.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=> 'search'])  !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default-sm" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                </div>
                {!! Form::close() !!}
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}"><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                      <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout
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
