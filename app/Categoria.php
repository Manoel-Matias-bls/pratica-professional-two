<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $valor
 * @property string $nome
 * @property Veiculo[] $veiculos
 */
class Categoria extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['valor', 'nome'];
    public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function veiculo()
    {
        return $this->hasMany('App\Veiculo', 'categorias_id');
    }
}
