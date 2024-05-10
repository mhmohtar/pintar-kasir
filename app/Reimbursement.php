<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model
{
    protected $table = 'reimbursement';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_reimbursement', 'deskripsi', 'status', 'file',
    ];

}
