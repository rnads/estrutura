@extends('layouts.admin.master')

@section('title')
USUÁRIOS
@endsection


@section('content')
<div class="card shadow-lg">
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-md-10">
                <h4 class="m-0  text-primary">Usuários</h4>
            </div>
            <div class="col-12 col-md-2 text-right">
                @can('usuarios.criar')
                <a href="{{ Route('admin.usuarios.create') }}" class="btn btn-primary w-50">Criar</a>
                @endcan

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="DataTable">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">{!! $user->statusIcon !!}</td>
                        <td class="text-center">

                            @can('usuarios.resetar_senha')
                            <a href="{{ route('admin.usuarios.show', $user->id) }}" class="btn btn-outline-info" title="RESETAR SENHA DO USUÁRIO PARA PADRÃO DO SISTEMA">
                                <i class="fas fa-key"></i>
                            </a>
                            @endcan

                            @can('usuarios.editar')
                            <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-outline-warning">
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan

                            @can('usuarios.deletar')
                            <a href="#" class="btn btn-outline-danger modal-excluir" data-toggle="modal"
                                data-target="#modal-excluir" data-description="{{ $user->name }}"
                                data-action="{{route('admin.usuarios.destroy', ['usuario' => $user->id])}}">
                                <i class="far fa-trash-alt"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layouts.admin.modal-excluir')
@endsection

@push('scripts')
<script src="{{ asset('vendor/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/DataTable.js') }}"></script>

@endpush
