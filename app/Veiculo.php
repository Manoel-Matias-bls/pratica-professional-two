<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'condutor',
        'placa'
    ];

    public $timestamps = false;

    public function entrada()
    {
        return $this->hasMany('App\Entrada', 'veiculos_id'  );
    }

    public function valore()
    {
        return $this->belongsTo('App\Valore');
    }

}
