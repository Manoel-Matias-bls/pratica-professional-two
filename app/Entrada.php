<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable =[
        'entrada',
        'saida',
        'total'
    ];

    protected $dates = ['entrada', 'saida'];

    public $timestamps = false;

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }

}
