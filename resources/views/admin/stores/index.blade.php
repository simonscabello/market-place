@extends('layouts.app')

@section('content')
    @if(!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Nova Loja</a>
    @endif
    <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post" class="d-inline">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    </tbody>
</table>
@endsection
