<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market Place</title>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <a class="navbar-brand" href="{{route('home')}}">Market Place</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            @auth
            <ul class="navbar-nav mr-auto">
                @if(auth()->user()->role == 'ROLE_OWNER')
                    <li class="nav-item @if(request()->is('admin/orders*')) active @endif">
                        <a class="nav-link" href="{{route('admin.orders.my')}}">Meus Pedidos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Loja<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>
                @endif
                @if(auth()->user()->role == 'ROLE_ADMIN')
                    <li class="nav-item @if(request()->is('admin/owners*')) active @endif">
                        <a class="nav-link" href="{{route('admin.owners.index')}}">Lojistas</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.all-products.index')}}">Todos os produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>
                @endif
            </ul>


            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <div class="dropleft">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{auth()->user()->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                              document.querySelector('form.logout').submit();">Sair</a>
                            <form action="{{route('logout')}}" class="logout d-none" method="post">
                                @csrf
                                @method('post')
                            </form>
                            <a class="dropdown-item" href="{{route('admin.notifications.index')}}">
                                <span class="badge badge-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                                <in class="fa fa-bell"></in>
                            </a>
                        </div>
                    </div>
                </ul>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>
