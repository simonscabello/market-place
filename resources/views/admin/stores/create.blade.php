@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Nome</label>
        <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input value="{{old('description')}}" type="text" name="description" class="form-control @error('description') is-invalid @enderror">
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Telefone</label>
        <input value="{{old('phone')}}" type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>WhatsApp</label>
        <input value="{{old('mobile_phone')}}" type="text" id="mobile_phone" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror">
        @error('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="div-form-group">
        <label>Logo loja</label>
        <input type="file" name="logo" class="form-control-file mb-5 @error('logo') is-invalid @enderror">
        @error('logo')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-dark">Criar Loja</button>
    </div>
</form>
@endsection

@section('scripts');

<script>
    // let imPhone = new Inputmask('(99) 9999-9999');
    // imPhone.mask(document.getElementById('phone'));
    //
    // let imMobilePhone = new Inputmask('(99) 99999-9999');
    // imMobilePhone.mask(document.getElementById('mobile_phone'));
    //
    // $(document).ready(function(){
    //     $('#phone').inputmask("(99) 9999-9999");
    //     $('#mobile_phone').inputmask("(99) 99999-9999");
    // });

</script>

@endsection
