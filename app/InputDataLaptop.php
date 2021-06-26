<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputDataLaptop extends Model
{
    protected $table='input_data_laptop';
    protected $primaryKey = 'idx_dataLaptop';
    protected $fillable = [
        'nomor_laptop',
        'nama_laptop',
    ];
}
