@extends('layouts.app')

@section('content')
    <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar Loja</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stores as $store)
                <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->name}}</td>
                    <td>
                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post" class="d-inline">
                            @csrf @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Destroy</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

{{$stores->links()}}
@endsection
