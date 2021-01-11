@extends('layouts.front')


@section('content')
   <div class="row front">
       <div class="col-4">
           @if($store->logo)
               <img class="img-fluid" src="{{asset('storage/' . $store->logo)}}" alt="Logo da loja {{$store->name}}">
           @else
               <img class="img-fluid" src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo">
           @endif
       </div>
       <div class="col-8">
           <h2>{{$store->name}}</h2>
           <p>{{$store->description}}</p>
           <p>
               <strong>Contatos:</strong>
               <span>{{$store->phone}}</span> | <span>{{$store->mobile_phone}}</span>
           </p>
       </div>
       <div class="col-12">
           <hr>
           <h3 class="mb-3">Produtos</h3>
       </div>
           @forelse($store->products as $key => $product)
               <div class="col-md-4 front">
                   <div class="card mb-4 text-center" style="width: 98%">
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
                           <h2 class="card-title">{{$product->name}}</h2>
                           <p class="card-text">{{$product->description}}</p>
                           <h3>
                               R${{number_format($product->price, '2', ',', '.')}}
                           </h3>
                           <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-outline-success">
                               Ver produto
                           </a>
                       </div>
                   </div>
               </div>
               @if(($key + 1) % 3 == 0) </div><div class="row front"> @endif
           @empty
               <div class="col-12">
                   <h3 class="alert alert-warning">Nenhum produto encontrado para esta loja. :/</h3>
               </div>
           @endforelse
   </div>
@endsection
