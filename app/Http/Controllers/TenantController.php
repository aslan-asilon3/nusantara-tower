<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{

    public function index()
    {
        $tenants = Tenant::latest()->paginate(10);
        return view('tenant.index', compact('tenants'));
    }

    public function create()
    {
        return view('tenant.create');
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
            'company'     => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'address'   => 'required'
        ]);


        $tenant = Tenant::create([
            'company'   => $request->company,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'     => $request->address,
        ]);

        if($tenant){
            //redirect dengan pesan sukses
            return redirect()->route('tenant.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tenant.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }


    public function edit(Tenant $tenant)
    {
        return view('tenant.edit', compact('tenant'));
    }


    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */

    public function update(Request $request, Tenant $tenant)
    {
        $this->validate($request, [
            'company'     => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'address'   => 'required'
        ]);

        $tenant->update([
            'company'   => $request->company,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'address'     => $request->address,
        ]);



        if($tenant){
            //redirect dengan pesan sukses
            return redirect()->route('tenant.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tenant.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $tenant = Tenant::findOrFail($id);
    $tenant->delete();

    if($tenant){
        //redirect dengan pesan sukses
        return redirect()->route('tenant.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('tenant.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }


}
