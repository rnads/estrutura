@extends('layouts.admin.master')

@section('title')
{{ $form['type'] == 'edit' ? 'EDITAR USUÁRIO' : 'NOVO USUÁRIO' }}
@endsection

@section('content')
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0  text-primary">{{ $form['type'] == 'edit' ? 'Editar Usuário' : 'Novo Usuário' }}</h3>
        </div>
        <div class="card-body">
            <form
        action="{{ $form['action'] }}" method="{{ $form['method'] }}">
                @csrf
                @method($form['method'])
                <div class="row">

                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ isset($user) ? $user->name : old('name') }}" required>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">E-mail</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ isset($user) ? $user->email : old('email') }}" required>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                            <option value="">Escolha</option>
                            <option value="1"
                                {{  old('status') ? old('status') == 1 ? 'selected' : '' : '' }}
                                {{ isset($user) ? $user->status == 1 ? 'selected' : '' : '' }}>
                                Ativo
                            </option>
                            <option value="0"
                            {{ old('status') ? old('status') == 0 ? 'selected' : '' : '' }}
                            {{ isset($user) ? $user->status == 0 ? 'selected' : '' : '' }}>
                            Inativo</option>
                        </select>
                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>


                    <div class="col-12 col-md-6">
                        <label class="badge badge-primary">Permissão</label>
                        <select class="form-control @error('group_id') is-invalid @enderror" name="group_id">
                            <option value="">Escolha</option>
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}"
                                {{  old('group_id') ? old('group_id') == $group->id ? 'selected' : '' : '' }}
                                {{ isset($user) ? $user->group_id == $group->id ? 'selected' : '' : '' }}>
                                {{ $group->name }}</option>
                            @endforeach
                        </select>
                        @error('group_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <hr>
                    </div>

                    <div class="col-6 text-left">
                        <a href="{{ Route('admin.usuarios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> {{ isset($user) ? 'Salvar' : 'Criar' }}</button>
                    </div>

                    @if(isset($user))
                    <div class="col-6 text-right">
                        @can('usuarios.resetar_senha')
                        <a href="{{ Route('admin.usuarios.show', $user->id) }}" class="btn btn-warning"><i class="fas fa-key"></i> Resetar Senha Padrão</a>
                        @endcan
                    </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
</div>
<br>

@endsection
