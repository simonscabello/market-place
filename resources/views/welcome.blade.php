@extends('layouts.front')


@section('content')
   <div class="row front">
       @foreach($products as $key => $product)
            <div class="col-md-4 front">
                <div class="card text-center mb-4" style="width: 98%">
                    @if($product->photos->count())
                        <div class="text-center mt-2">
                            <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
                        </div>
                    @else
                        <div class="text-center mt-2">
                            <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
                        </div>
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{$product->name}}</h3>
                        <p class="card-text">{{$product->description}}</p>
                        <h3>
                            R${{number_format($product->price, '2', ',', '.')}}
                        </h3>
                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-outline-primary">
                            Ver produto
                        </a>
                    </div>
                </div>
            </div>
           @if(($key + 1) % 3 == 0) </div><div class="row front"> @endif
       @endforeach
   </div>
    <div class="text-center">
        {{$products->links()}}
    </div>



{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <h2>Lojas Destaque</h2>--}}
{{--            <hr>--}}
{{--        </div>--}}
{{--        @foreach($stores as $store)--}}
{{--        <div class="cod-4 mb-5">--}}
{{--            @if($store->logo)--}}
{{--                <img class="img-fluid" style="max-width:230px; height:auto;" src="{{asset('storage/' . $store->logo)}}" alt="Logo da loja {{$store->name}}">--}}
{{--            @else--}}
{{--                <img class="img-fluid" src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo">--}}
{{--            @endif--}}
{{--            <h3>{{$store->name}}</h3>--}}
{{--            <p>{{$store->description}}</p>--}}
{{--                <a href="{{route('store.single', ['slug' => $store->slug])}}" class="btn btn-sm btn-success">Ver Loja</a>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
@endsection
