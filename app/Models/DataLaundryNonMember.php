<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaundryNonMember extends Model
{
    use HasFactory;

    protected $table = 'datalaundry_nonmember';
    
    protected $fillable = [
        'tgl_transaksi',
        'nama_customer',
        'alamat',
        'no_telp',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
    ];
}