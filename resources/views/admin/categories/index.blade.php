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
                        @if(auth()->user()->role == 'ROLE_ADMIN')
                        <a href="{{route('admin.categories.edit', ['category' => $c->id])}}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $c->id])}}" method="post" class="d-inline">
                            @csrf @method("DELETE")
                            @if($c->products->count())
                                <button type="submit"
                                        class="btn btn-sm btn-dark"
                                        title="Categorias com produtos cadastrados não podem ser excluidas."
                                        disabled>
                                    Delete
                                </button>
                            @else
                                <button type="submit" class="btn btn-sm btn-dark">Delete</button>
                            @endif
                        </form>
                        @else
                            Somente o Admin pode editar e excluir categorias.
                        @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
