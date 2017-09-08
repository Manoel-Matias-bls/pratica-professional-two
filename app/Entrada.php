<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $veiculos_id
 * @property string $entrada
 * @property string $saida
 * @property float $total
 * @property Veiculo $veiculo
 */
class Entrada extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['entrada', 'saida', 'total'];
    public $timestamps = false;

    protected $dates = ['entrada', 'saida'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo', 'veiculos_id');
    }
}
