@extends('layouts.app')

@section('content')

    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success mb-5">Nova Categoria</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>
                        <a href="{{route('admin.categories.edit', ['category' => $c->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $c->id])}}" method="post" class="d-inline">
                            @csrf @method("DELETE")
                            @if($c->products->count())
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        title="Categorias com produtos cadastrados não podem ser excluidas."
                                        disabled>
                                    Delete
                                </button>
                            @else
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            @endif
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
