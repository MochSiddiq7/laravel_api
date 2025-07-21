<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'tb_review';

    protected $primaryKey = 'id_review';

    public $timestamps = false;

    protected $fillable = [
        'nama_teknisi',
        'bintang',
        'keluhan',
    ];
}
