<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\exception_for;

/**
 *@permissionResource('Usuarios')
 */
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *@permissionName('Listar')
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

     /**
     * Usado para resetar senha do usuário para a padrão do sistema.
     *@permissionName('Resetar Senha')
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            DB::beginTransaction();

                $user = User::find($id);

                $senha = Hash::make(env('SENHA_PADRAO'));

                $user->update(['password' => $senha]);

            DB::commit();

            notify()->success('Senha alterada', 'Salvo');

            return redirect()->route('admin.usuarios.edit', $id);
        } catch (\Exception $e) {
            DB::rollBack();

            notify()->error($e->getMessage(), 'Erro');

            return back()->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     *@permissionName('Criar')
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupModel = Config::get('acl.model.group');

        $groups = $groupModel::orderBy('id', 'ASC')->get();

        $form = [
            'type'   => 'create',
            'method' => 'POST',
            'action' => route('admin.usuarios.store'),
        ];

        return view('admin.users.form', compact('groups', 'form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *@permissionName('Salvar Criação')
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        try {
            DB::beginTransaction();
                $data = $request->except('_token', '_method');

                $data['password']    = Hash::make(env('SENHA_PADRAO'));

                $data['img_profile'] = 'user-padrao.png';

                User::create($data);

            DB::commit();

            notify()->success('Usuário criado com sucesso', 'Salvo');

            return redirect()->route('admin.usuarios.index');
        } catch (\Exception $e) {
            DB::rollBack();

            notify()->error($e->getMessage(), 'Erro');

            return back()->withInput();
        }
        return redirect()->route('admin.usuarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *@permissionName('Editar')
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find(auth()->user()->id);

        $groupModel = Config::get('acl.model.group');

        $groups = $groupModel::all();

        $form = [
            'type'   => 'edit',
            'method' => 'PUT',
            'action' => route('admin.usuarios.update', ['usuario' => $id]),
        ];

        return view('admin.users.form', compact('user', 'groups', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *@permissionName('Salvar Edição')
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $data = $request->except('_token', '_method');
                $user = User::find($id);

                $user->update($data);

            DB::commit();

            notify()->success('Dados alterados com sucesso', 'Salvo');

            return redirect()->route('admin.usuarios.index');
        } catch (\Exception $e) {
            DB::rollBack();

            notify()->error($e->getMessage(), 'Erro');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *@permissionName('Deletar')
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

                $user = User::find($id);

                $user->delete();

            DB::commit();

            notify()->success('Usuário deletado com sucesso', 'Pronto');

            return redirect()->route('admin.usuarios.index');
        } catch (\Exception $e) {
            DB::rollBack();

            notify()->error($e->getMessage(), 'Erro');

            return back()->withInput();
        }
    }


}
