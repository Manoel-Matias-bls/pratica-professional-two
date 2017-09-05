<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valore extends Model
{
    protected $fillable = [
        'valor',
        'categoria'
    ];

    public $timestamps = false;

    public function veiculo()
    {
        return $this->hasMany('App\Veiculo', 'valores_id');
    }

}
