@extends('layouts.app')

@section('content')
    <a href="{{route('admin.owners.create')}}" class="btn btn-lg btn-success mb-5">Novo Usuário</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{$owner->id}}</td>
                <td>{{$owner->name}}</td>
                <td>{{$owner->store->name ?? 'Loja não cadastrada.'}}</td>
                {{--                <td>{{$owner->store->name}}</td>--}}
                <td>
                    <a href="{{route('admin.owners.edit', ['owner' => $owner->id])}}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{route('admin.owners.destroy', ['owner' => $owner->id])}}" method="post" class="d-inline">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-sm btn-dark">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
