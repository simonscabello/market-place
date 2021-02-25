@extends('layouts.app')

@section('content')
    @if(auth()->user()->role == 'ROLE_OWNER')
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success mb-5">Novo Produto</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{$p->id}}</td>
                    <td>{{$p->name}}</td>
                    <td>R$ {{number_format($p->price, 2, ',', '.')}}</td>
                    <td>{{$p->store->name}}</td>
                    <td>
                        <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{route('admin.products.destroy', ['product' => $p->id])}}" method="post" class="d-inline">
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-sm btn-dark">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{--{{$products->links()}}--}}
@endsection
