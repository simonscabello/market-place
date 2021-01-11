@extends('layouts.front')


@section('content')
   <div class="row front">
       <div class="col-12">
           <h2>{{$category->name}}</h2>
           <hr>
       </div>
           @forelse($category->products as $key => $product)
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
                   <h3 class="alert alert-warning">Nenhum produto encontrado para esta categoria. :/</h3>
               </div>
           @endforelse
   </div>
@endsection
