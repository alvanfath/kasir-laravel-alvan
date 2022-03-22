<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table= 'transaksi';
    protected $fillable= ['nama_pelanggan','nama_menu','harga','jumlah','total_harga', 'bayar', 'kembalian','nama_pegawai','tanggal'];
    protected $appends = [
        'harga_rp',
    ];
    public function menu(){
        return $this->belongsTo(Menu::class, 'id', 'id');
    }
    public function getHargaRpAttribute()
    {
        return number_format($this->total_harga, 0 , ',' , '.');
    }
}
