<?php
/**
 * Creator: Eric Larrea
 * E-mail: elapez@gmail.com
 * From: www.latinex.us
 * Date: 02/02/2022
 * Time: 1:17
 * Proyecto: lx_easycash.red
 */
namespace Lib\Lugares;

use Illuminate\Database\Eloquent\Model;


class Zona extends Model
{
    protected $table = 'dir_zonas';
    public $timestamps = false;

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, "municipios_id")->first();
    }
}