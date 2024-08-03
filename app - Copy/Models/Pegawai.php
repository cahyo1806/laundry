<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    
    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'password',
        'alamat',
        'no_hp',
        'jabatan',
    ];
    public function dataTambahanPembelianBarang(){
        return $this->hasOne(PembelianBarang::class,'id_pembelianbarang');
    }
    public function dataTambahanDataLaundryMember(){
        return $this->hasOne(DataLaundryMember::class,'id_datalaundrymember');
    }
    public function dataTambahanDataLaundryNonMember(){
        return $this->hasOne(DataLaundryNonMember::class,'id_datalaundrynonmember');
    }
}