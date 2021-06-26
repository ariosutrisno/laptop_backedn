<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    protected $table='input_data_kebutuhan';
    protected $primaryKey = 'idx_kebutuhan';
    protected $fillable = [
        'kebutuhan_nama',
        'keterangan',
    ];
}
