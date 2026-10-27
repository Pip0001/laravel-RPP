<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'karyawan_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'deskripsi',
        'birthday',
        'gender',
        'email',
        'phone',
    ];
}
