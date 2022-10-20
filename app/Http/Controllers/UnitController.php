<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::latest()->paginate(10);
        return view('unit.index', compact('units'));
    }

    public function create()
    {
        return view('unit.create');
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


        $unit = Unit::create([
            'name'   => $request->name,
            'email'     => $request->email,
            'password'     => md5($request->password),
        ]);

        if($unit){
            //redirect dengan pesan sukses
            return redirect()->route('unit.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('unit.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function edit(Unit $unit)
    {
        return view('unit.edit', compact('unit'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */

    public function update(Request $request, Unit $unit)
    {
        $this->validate($request, [
            'name'     => 'required',
            'email'   => 'required',
            'password'   => 'required'
        ]);

        $unit->update([
            'name'   => $request->name,
            'email'     => $request->email,
            'password'     => md5($request->password),
        ]);



        if($unit){
            //redirect dengan pesan sukses
            return redirect()->route('unit.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('unit.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $unit = Unit::findOrFail($id);
    $unit->delete();

    if($unit){
        //redirect dengan pesan sukses
        return redirect()->route('unit.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('unit.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}
