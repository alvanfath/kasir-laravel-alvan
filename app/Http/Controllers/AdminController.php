<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;


class AdminController extends Controller
{
    public function indexadmin()
    {
        $users = User::paginate(5);

        return view('admin.index', compact('users'));
    }

    public function postuser(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'foto' =>'image',
        ]);
        $image = $request->foto->getClientOriginalName();
        $request->foto->storeAs('foto',$image);
        $request['password'] = bcrypt($request['password']);
        $store= User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'role' => $request->role,
            'foto' => $image,
        ]);

        if($store){
            return redirect()->route('indexadmin')
            ->with('success','Berhasil Menyimpan !');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }

    public function show(Request $request)
    {
        $data = User::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function updateuser(Request $request, $id)
    {
        $data= User::find($id);

        $store= $data->update($request->all());

        if($store){
            return redirect()->route('indexadmin')
            ->with('success','Berhasil Mengedit !');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }

    public function destroyuser($id)
    {
        $data= User::find($id);
        $delete= $data->delete();

        if($delete){
        return redirect()->route('indexadmin')
        ->with('success','Berhasil Menghapus!');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }
}
