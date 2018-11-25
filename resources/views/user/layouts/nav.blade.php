<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <ul class="list-unstyled">
                    <li class="d-none d-xl-block d-none d-lg-block .d-xl-none"><img src="{{ asset('img/unnamed.png') }}" alt="logo" width="40px;"></li>
                </ul> 
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>PSAUrms</strong> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{request()->route()->getName() === 'class' ||
                                    request()->route()->getName() === 'users'  ||
                                    request()->route()->getName() === 'user.create'  ||
                                    request()->route()->getName() === 'user.edit'  ||
                                    request()->route()->getName() === 'class'  ||
                                    request()->route()->getName() === 'class.create'  ||
                                    request()->route()->getName() === 'class.edit' ||
                                    request()->route()->getName() === 'departments'||
                                    request()->route()->getName() === 'dept.create'||
                                    request()->route()->getName() === 'dept.edit' ||
                                    request()->route()->getName() === 'retentions' ||
                                    request()->route()->getName() === 'retention.edit' ||
                                    request()->route()->getName() === 'retention.create'
                                    ? 'active' : '' }}" href="{{ route('class')}}">
                                Management</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ 
                                    request()->route()->getName() === 'document.create'||
                                    request()->route()->getName() === 'documents'||
                                    request()->route()->getName() === 'document.edit' ||
                                    request()->route()->getName() === 'documents.pending' ||
                                    request()->route()->getName() === 'documents.search'
                                     ? 'active' : '' }}" href="{{ route('login') }}">Documents</a>
                            </li>
                            <!--  -->
                            <li class="nav-item dropdown">
                            <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i><span class="badge badge-danger" id="count"></span>
                            </a>
                                <ul class="dropdown-menu" >
                                <li class="head text-light bg-dark">
                                    <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>Notifications</span>
                                        <a href="#" class="float-right text-light" onclick="updateNotif({{Auth::id()}})">Mark all as read</a>
                                    </div>
                                </li>
                                <li class="notification-box" id="notifications">
                                </li>
                                <li class="footer bg-dark text-center">
                                    <a href="" class="text-light">View All</a>
                                </li>
                                </ul>
                            </li>
                            <!--  -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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