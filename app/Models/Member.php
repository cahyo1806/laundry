<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'member';
    
    protected $fillable = [
        'no_identitas',
        'nama_member',
        'password',
        'alamat',
        'no_hp',
        'tgl_join',
    ];
}