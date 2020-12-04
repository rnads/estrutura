<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(auth()->user()->id);

        $groupModel = Config::get('acl.model.group');

        $group = $groupModel::find($user->group_id);

        return view('admin.profile.index', compact('user', 'group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password == $request->newpassword) {

            $senha = Hash::make($request->password);

            User::whereId(auth()->user()->id)
                ->update(['password' => $senha]);

            notify()->success('Senha Alterada Com Sucesso', 'Sucesso');
            return back();
        } else {
            notify()->error('As senhas não coincidem', 'Erro ao alterar senha');
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!isset($request->img)) {

            $update = User::whereId($id)
                ->update($request->except('_token', '_method', 'img'));

            notify()->success('Salvo com sucesso', 'Perfil');

            return redirect()->route('admin.perfil.index');
        }

        $name = Str::slug(auth()->user()->name) . '-' . auth()->user()->id . '.' . $request->file('img')->extension();

        $path = $request->file('img')
            ->storeAs('users', $name);

        $request['img_profile'] = $name;

        $update = User::whereId($id)
            ->update($request->except('_token', '_method', 'img'));

        notify()->success('Salvo com sucesso', 'Perfil');
        return redirect()->route('admin.perfil.index');
    }
}
