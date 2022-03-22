<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
Use Alert;
use Illuminate\Support\Facades\DB;


class ManagerController extends Controller
{
    public function indexm()
    {
        $menu = Menu::all();
        $stok = Menu::where('ketersediaan', '<=', 1)->get();


        return view('manager.index', compact('menu','stok'));
    }

    // public function searchmenu(Request $request){
    //     $keyword= $request->search;
    //     $menu = Menu::where('nama_menu', 'like', "%" . $keyword . "%")
    //     ->orWHERE('harga', 'like', "%" . $keyword . "%")
    //     ->orWHERE('deskripsi', 'like', "%" . $keyword . "%")
    //     ->orWHERE('ketersediaan', 'like', "%" . $keyword . "%")
    //     ->paginate(10);
    //     $stok = Menu::where('ketersediaan', '<=', 1)->get();
    //     return view('manager.index', compact('menu','stok'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|min:0',
            'deskripsi' ,
            'ketersediaan' => 'required|min:1',
        ]);
        $store= Menu::create($request->all());

        if($store){
            return redirect()->route('indexm')
            ->with('success','Berhasil Menambah Menu !');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }

    public function edit(Request $request)
    {
        $data = Menu::findOrFail($request->get('id'));
        echo json_encode($data);
    }

    public function updatem(Request $request)
    {
        $data= Menu::find($request->id);

        $store= $data->update($request->all());

        if($store){
            return redirect()->route('indexm')
            ->with('success','Berhasil Mengedit !');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }

    public function destroym($id)
    {
        $data= Menu::find($id);
        $delete= $data->delete();

        if($delete){
        return redirect()->route('indexm')
        ->with('success','Berhasil Menghapus!');
        }else{
            Alert::error('error', 'Opss sepertinya ada yang salah');
            return back();
        }
    }

    public function laporan(){
        $report = Transaksi::latest()->paginate(20);
        $total = Transaksi::select(DB::raw('SUM(total_harga) as total'))->get()->first()->total;
        return view('manager.laporan', compact('report','total'));
    }

    public function search(Request $request){
        $from = $request->from;
        $to = $request->to;
        $report = Transaksi::whereBetween('tanggal', array($from,$to))->paginate(20);
        $total = Transaksi::select(DB::raw('SUM(total_harga) as total'))->whereBetween('tanggal', array($from,$to))->get()->first()->total;
        // dd($report,$store);
        return view('manager.laporan', compact('report','total'));
    }

    public function PrintAll(){
        $all= Transaksi::all();
        $total = Transaksi::select(DB::raw('SUM(total_harga) as total'))->get()->first()->total;
        return view('manager.print-all', compact('all', 'total'));

    }

    public function PrintCustom(Request $request){
        $from = $request->from;
        $to = $request->to;
        $iya = Transaksi::whereBetween('tanggal', array($from,$to))->get();
        $total = Transaksi::select(DB::raw('SUM(total_harga) as total'))->whereBetween('tanggal', array($from,$to))->get()->first()->total;
        return view('manager.print-custom', compact('iya','total','from', 'to'));
    }
}
