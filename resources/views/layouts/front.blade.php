<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .front.row {
            margin-bottom: 40px;
        }

        body{
            background-color: whitesmoke;
        }

        img{
            max-width: 180px;
            height: auto;
        }
    </style>
    @yield('stylesheets')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">

    <a class="navbar-brand" href="{{route('home')}}">MarketPlace</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('/')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            @foreach($categories as $category)
                <li class="nav-item @if(request()->is('category/' . $category->slug)) active @endif">
                    <a class="nav-link" href="{{route('category.single', ['slug' => $category->slug])}}">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>


{{--            <ul class="navbar-nav mr-auto">--}}
{{--                <li class="nav-item @if(request()->is('admin/stores*')) active @endif">--}}
{{--                    <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
{{--                <li class="nav-item @if(request()->is('admin/products*')) active @endif">--}}
{{--                    <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item @if(request()->is('admin/categories*')) active @endif">--}}
{{--                    <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item @if(request()->is('my-orders')) active @endif">
                            <a href="{{route('user.orders')}}" class="nav-link">Meus pedidos</a>
                        </li>
                        @endauth
                    <a class="nav-link" href="{{route('cart.index')}}">
                        @if(session()->has('cart'))
                            <span class="badge badge-danger">{{array_sum(array_column(session()->get('cart'), 'amount'))}}</span>
                        @endif
                        <i class="fa fa-shopping-cart"></i>
                        Carrinho
                    </a>
{{--                    <div class="dropleft">--}}
{{--                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            {{auth()->user()->name}}--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                            <a class="dropdown-item" href="#" onclick="event.preventDefault();--}}
{{--                                                              document.querySelector('form.logout').submit();">Sair</a>--}}
{{--                            <form action="{{route('logout')}}" class="logout d-none" method="post">--}}
{{--                                @csrf--}}
{{--                                @method('post')--}}
{{--                            </form>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                </ul>
            </div>


    </div>
</nav>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>
@yield('scripts')
</body>
</html>
