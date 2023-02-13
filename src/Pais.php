<?php
/**
 * Creator: Eric Larrea
 * E-mail: elapez@gmail.com
 * From: www.latinex.us
 * Date: 02/02/2022
 * Time: 1:11
 * Proyecto: lx_easycash.red
 */
namespace Lib\Lugares;

use Illuminate\Database\Eloquent\Model;


class Pais extends Model
{
    protected $table = 'dir_paises';
    public $timestamps = false;

    public function provincias()
    {
        return $this->hasMany(Provincia::class, "paises_id")->get();
    }

    public function subLista()
    {
        return $this->provincias()->pluck("nombre", "id");
    }

    public function subListaJson()
    {
        return $this->subLista()->toJson();
    }

    public function subListaArray()
    {
        return $this->subLista()->toArray();
    }

    /**
     *      MÉTODOS ESTÁTICOS
     */
    public static function listaArray()
    {
        return self::where("usar", 1)->get()->pluck("nombre", "id")->toArray();
    }

    public static function listaJson()
    {
        return self::where("usar", 1)->get()->pluck("nombre", "id")->toJson();
    }
}