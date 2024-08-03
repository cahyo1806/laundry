<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBarang extends Model
{
    use HasFactory;

    protected $table = 'pembelian_barang';  // Tambahkan ini jika nama tabel tidak sesuai dengan konvensi

    protected $fillable = [
        'kode_barang',
        'id_pegawai',
        'tanggal',
        'jumlah',
    ];

    protected $primaryKey = 'id';

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
    public function barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
