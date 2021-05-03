<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        "id",
        "ano",
        "precio",
        "cilindraje",
        "cantidadPuertas",
        "recibe",
        "negociable",
        "fechaIngreso",
        "vendido",
        "vendedorId",
        "imgPrincipal",
        "marcaId",
        "modeloId",
        "estiloId",
        "transmisionId",
        "colorExteriorId",
        "colorInteriorId",
        "combustibleId"
    ];
}
