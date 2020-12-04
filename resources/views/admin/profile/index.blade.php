@extends('layouts.admin.master')

@section('title')
PERFIL
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0  text-primary">Meu Perfil</h3>
        </div>
        <div class="card-body">
            <form action="{{ Route('admin.perfil.update', $user->id) }}" method="POST" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-6 text-center">
                        <img src="{{ asset('users').'/'.$user->img_profile }}" class="img-fluid img-profile"
                            alt="Foto Perfil"><br>
                        <input type="file" name="img" class="@error('img') is-invalid @enderror">
                        @error('img') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') ? old('name') : $user->name }}" required>
                        @error('name') <span class="error">{{ $message }}</span> @enderror

                        <label class="badge badge-primary">E-mail</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') ? old('email') : $user->email }}" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <hr>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#senha"><i class="fas fa-key"></i> Alterar Senha</button>
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Salvar</button>
            </form>

            <form action="{{ Route('admin.perfil.store') }}" method="POST">
                @csrf
                @include('layouts.admin._passwordReset')
            </form>
        </div>
    </div>
</div>
<br>

@endsection
