<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $categorias_id
 * @property string $condutor
 * @property string $placa
 * @property Categoria $categoria
 * @property Entrada[] $entradas
 */
class Veiculo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['condutor', 'placa'];

    public $timestamps = false;

    public function setPlacaAttribute($value)
    {
        $this->attributes['placa'] = strtoupper($value);
    }

    public function getPlacaAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categorias_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entrada()
    {
        return $this->hasMany('App\Entrada', 'veiculos_id');
    }
}
