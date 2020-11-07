<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktivasiBansosModel extends Model
{
    protected $table = 'tbl_aktivasi_bansos';

    public $timestamps = false;
    protected $fillable =
    [
        'status',
        'keterangan'
    ];
}
