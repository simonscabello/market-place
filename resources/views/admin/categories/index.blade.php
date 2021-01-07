@extends('layouts.app')

@section('content')

    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success">Criar Categoria</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post" class="d-inline">
                            @csrf @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
