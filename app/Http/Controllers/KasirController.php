<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Menu;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
Use Alert;

class KasirController extends Controller
{
    public function indexk()
    {
        $trans = Transaksi::orderBy('bayar', 'asc')->get();
        $menu= Menu::all();
        return view('kasir.index', compact('trans','menu'));
    }

    public function createk()
    {
        
    }

    public function storek(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');
        $request->validate([
            'nama_pelanggan' => 'required',
            'nama_menu' => 'required',
            'jumlah' => 'required|min:1',
        ]);
        $menu= Menu::whereNamaMenu($request->nama_menu)->first();
        if(!$menu){
            return back()->with('error', 'menu tidak ada');
        }

        $valid= $menu->ketersediaan < $request->jumlah;

        if($valid){
            Alert::warning('warning', 'Maaf Menu sudah habis');
            return back()->with('warning','Maaf '. $request->nama_pelanggan. ' Menu '. $request->nama_menu.' Hanya Tersisa: '  .$menu->ketersediaan);
        }else{
            Transaksi::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'nama_menu' => $request->nama_menu,
                'jumlah' => $request->jumlah,
                'harga' => $menu->harga,
                'total_harga' => $menu->harga * $request->jumlah,
                'nama_pegawai' => auth()->user()->nama,
                'tanggal' => $tanggal,
            ]);
            $menu->update([
                'ketersediaan' => $menu->ketersediaan - $request->jumlah,
            ]);
            return redirect()->route('indexk')
            ->with('success',
             'Customer: '. $request->nama_pelanggan.
             '<br>'.
             'Menu: '. $request->nama_menu.
             '<br>'.
             'Harga: RP. '. number_format($menu->harga).
             '<br>'.
             'Jumlah: '. number_format($request->jumlah).
             '<br>'.
             'Total: RP. '. number_format($menu->harga * $request->jumlah).
             '<br>'.
             'Pegawai: '. auth()->user()->nama,
        );
        }
    }
    public function edit(Request $request)
    {
        $data = Transaksi::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function update(Request $request){
        $data = Transaksi::findOrFail($request->id);
        $valid= $request->bayar < $data->total_harga;
        if($valid){
            Alert::warning('Maaf', 'Dana Anda kurang');
            return back();
        }else{
            $data->update([
                'bayar' => (int) $request->bayar,
                'kembalian' => (int)$request->bayar - $data->total_harga,
            ]);
            return redirect()->route('indexk')
            ->with('success',
             'Tunai: '. number_format($request->bayar).
             '<br>'.
             'kembalian: '. number_format($data->kembalian),
            );
            }
    }

    public function destroyt($id){
        $data= Transaksi::find($id);
        $delete= $data->delete();

        if($delete){
        return redirect()->route('indexk')
        ->with('success','Berhasil Menghapus!');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }
}
