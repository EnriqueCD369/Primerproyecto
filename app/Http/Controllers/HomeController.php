<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Pagina;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function empresa()
    {
    $datos["nombre"]="Jesús Enrique Chan Díaz";
    $datos["fecha"]="2026-02-03";  
    $datos["actividad"]="Desarrollo de software";
    $datos["Descripcion_about"]="Empresa de dicada al desarrollo de software a medida de sus clientes";
    $datos["texto_ejemplo"]="Aqui va la descripción del texto de ejemplo";

    $usuarios=new Pagina();
    $datos["listausuarios"]=$usuarios->ObtenerListado();
    return view('empresa', $datos);
    }
}
