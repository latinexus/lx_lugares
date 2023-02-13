<?php
/**
 * Creator: Eric Larrea
 * E-mail: elapez@gmail.com
 * From: www.latinex.us
 * Date: 02/02/2022
 * Time: 1:14
 * Proyecto: lx_easycash.red
 */
namespace Lib\Lugares;

use Illuminate\Database\Eloquent\Model;


class Provincia extends Model
{
    protected $table = 'dir_provincias';
    public $timestamps = false;

    public function pais()
    {
        return $this->belongsTo(Pais::class, "paises_id")->first();
    }

    public function municipios()
    {
        return $this->hasMany(Municipio::class, "provincias_id")->get();
    }

    public function subLista()
    {
        return $this->municipios()->pluck("nombre", "id");
    }

    public function subListaJson()
    {
        return $this->subLista()->toJson();
    }

    public function subListaArray()
    {
        return $this->subLista()->toArray();
    }
}