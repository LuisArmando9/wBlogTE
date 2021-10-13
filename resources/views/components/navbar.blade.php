<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        @Auth
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('post.index') }}">{{ __('Post') }}</a>
                                </li>
                                
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('category.index') }}">{{ __('Categorias') }}</a>
                                </li>
                                <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('registro') }}</a>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group dropleft">
                                        <a  class=" mr-3 btn btn-bell-n dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bell text-primary" aria-hidden="true"></i>
                                            <span class="bg-primary counter text-light">{{$comments->count()}}</span>
                                        </a>
                                        <div class="dropdown-menu bg-primary" >
                                            @foreach($comments as $comment)
                                                <a class="dropdown-item text-white notification-hover" href="{{route('comment.edit', $comment->id)}}">
                                                <i class="fa fa-comment pr-2" aria-hidden="true"></i>
                                                    @php
                                                        $positionFirtName = 0;
                                                        $firstName = explode(" ",$comment->userName)[$positionFirtName];
                                                    @endphp
                                                    <b>{{$firstName}}</b> publico un comentario
                                                </a>
                                                <div class="dropdown-divider"></div>
                                            @endforeach
                                            
                                        </div>
                                    </div>   
                                </li>
                                
                                
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @endAuth
                    </ul>
                </div>
            </div>
        </nav>