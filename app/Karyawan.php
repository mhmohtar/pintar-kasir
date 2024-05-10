<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'reimbursement';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_reimbursement', 'deskripsi', 'status', 'file',
    ];
}
