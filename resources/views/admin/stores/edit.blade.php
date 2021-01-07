@extends('layouts.app')

@section('content')
<h1>Atualizar Loja</h1>
<form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nome</label>
        <input value="{{$store->name}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input value="{{$store->description}}" type="text" name="description" class="form-control @error('description') is-invalid @enderror">
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Telefone</label>
        <input value="{{$store->phone}}" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>WhatsApp</label>
        <input value="{{$store->mobile_phone}}" type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror">
        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="div-form-group">
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="#">
        </p>
        <label>Logo loja</label>
        <input type="file" name="logo" class="form-control-file @error('logo') is-invalid @enderror">
        @error('logo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input value="{{$store->slug}}" type="text" name="slug" class="form-control">
    </div>

    <div>
        <button type="submit" class="btn btn-dark">Confirmar Edição</button>
    </div>
</form>
@endsection
