<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaundryMember extends Model
{
    use HasFactory;

    protected $table = 'datalaundry_member';
    
    protected $fillable = [
        'tgl_transaksi',
        'member_id',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi_kirim',
    ];
}