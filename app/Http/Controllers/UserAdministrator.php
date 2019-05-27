<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserAdministrator extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withTrashed()->where('id','<>',auth()->id())->get();


        //dd($users);

        return view('user_administration.index',[
            'users'=>$users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_administration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole('User');

        return redirect()->route('user.administrator.index')->with('success','Usuario creado Exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();

        return view('user_administration.edit',[
            'user'=>$user,
        ]);   
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['string', 'min:8','nullable'],
        ]);

        $user = User::where('id',$id)->first();

        if (!$user) {

            return abort(404);
        }

        if($user->email != $request->email) {

            $validatedData = $request->validate([
                'email' => 'required|unique:users'
            ]);
        }

        $password = $user->password;

        if ($request->input('password')) {

            $password = Hash::make($request->input('password'));
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
        ]);

        return back()->with('success','Usuario editado Exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();

        return back();
    }

    public function addPermission($id, $permission)
    {
        $user = User::withTrashed()->where('id',$id)->first();

        if (!$user) {
            return abort(404);
        }

        $user->givePermissionTo($permission);

        return back()->with('success','permiso agregado exitosamente');

    }

    public function deletePermission($id, $permission)
    {
        $user = User::withTrashed()->where('id',$id)->first();

        if (!$user) {
            return abort(404);
        }

        $user->revokePermissionTo($permission);

        return back()->with('success','permiso eliminado exitosamente');
    }

    public function restore($id)
    {
        User::where('id',$id)->restore();

        return back();
    }
}
