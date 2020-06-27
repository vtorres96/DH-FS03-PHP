@extends('layouts.app')

@section('content')
    <h1>Cadastro de Cartões</h1>

    <form method="POST" action="/cards/add" enctype="multipart/form-data">
        @csrf
        {{ method_field('POST') }}
        <div class="form-group col-md-6 col-sm-12">
            <label for="title">Título</label>
            <input type="text" name="title"  value="{{ old('title') }}" class="form-control{{$errors->has('title') ? ' is-invalid':''}}" id="title">
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        </div>

        <div class="form-group col-md-6 col-sm-12">
            <label for="content">Conteúdo</label>
            <input type="text" name="content"  value="{{ old('content') }}" class="form-control{{$errors->has('content') ? ' is-invalid':''}}" id="content">
            <div class="invalid-feedback">{{ $errors->first('content') }}</div>
        </div>

        <div class="form-group col-md-2">
            <button type="submit" class="form-control btn btn-primary">Enviar</button>
        </div>
    </form>
    @if(isset($success) && $success != "")
        <div class="alert alert-success text-center col-md-6">
            {{ $success }}
        </div>
    @endif
@endsection
