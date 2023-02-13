<?php
/**
 * Creator: Eric Larrea
 * E-mail: elapez@gmail.com
 * From: www.latinex.us
 * Date: 02/02/2022
 * Time: 1:16
 * Proyecto: lx_easycash.red
 */
namespace Lib\Lugares;

use Illuminate\Database\Eloquent\Model;


class Municipio extends Model
{
    protected $table = 'dir_municipios';
    public $timestamps = false;

    public function provincia()
    {
        return $this->belongsTo(Provincia::class, "provincias_id")->first();
    }

    public function zonas()
    {
        return $this->hasMany(Zona::class, "municipios_id")->get();
    }

    public function subLista()
    {
        return $this->zonas()->pluck("nombre", "id");
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