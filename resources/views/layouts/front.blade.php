<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Market Place</title>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .front.row {
            margin-bottom: 40px;
        }

        body{
            background-color: #f5f5f5;
        }
    </style>
    @yield('stylesheets')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">Market Place</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
{{--            <li class="nav-item @if(request()->is('/')) active @endif">--}}
{{--                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}

            <div class="dropdown ml-2">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>

{{--            @if($stores->count())--}}
{{--            <div class="dropdown ml-2">--}}
{{--                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Lojas Parceiras--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                    @foreach($stores as $store)--}}
{{--                        <a href="{{route('store.single', ['slug' => $store->slug])}}" class="dropdown-item">{{$store->name}}</a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endif--}}
        </ul>
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-link mr-3" href="{{route('cart.index')}}">
                        @if(session()->has('cart'))
                            <span class="badge badge-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span>
                        @endif
                        <i class="fa fa-shopping-cart"></i>
                        Carrinho
                    </a>
                        @auth

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
                                    <a href="{{route('user.orders')}}" class="dropdown-item">Meus pedidos</a>
                                    <a href="{{route('admin.stores.index')}}" class="dropdown-item">Minha loja</a>

                            </div>
                        @endauth


                    </div>
                </ul>
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
