<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }


    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'password'   => 'required'
        ]);


        $user = User::create([
            'name'   => $request->name,
            'email'     => $request->email,
            'password'     => md5($request->password),
        ]);

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'password'   => 'required'
        ]);

        $user->update([
            'name'   => $request->name,
            'email'     => $request->email,
            'password'     => md5($request->password),
        ]);



        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

    if($user){
        //redirect dengan pesan sukses
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }




}
