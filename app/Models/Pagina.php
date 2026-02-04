<?php
namespace App\Models;

use ILLUMINATE\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table='paginas';
    
    public function ObtenerListado(){
        $listadousuarios=Pagina::all();
        return $listadousuarios;
    }
}