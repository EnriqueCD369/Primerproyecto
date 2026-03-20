<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Pagina;

Route::get('/', function () {
    return view('welcome');
})->name('vista_inicio');

Route::get('/contact', function(){
    $nombre = "Jesús Enrique Chan Díaz";
    return view('contact', ['nombre'=>$nombre, 'carrera'=>'LATI']);
})->name('contact');

Route::get('/principal', function(){
    $datos = ["titulo"=>"Tienda Virtual - Vista Principal",
    "mensaje"=>"Bienvenido a la vista principal"];
    return view('principal', $datos);
})->name('principal');

Route::get('/empresa', [HomeController::class, 'empresa'])->name('empresa');
Route::get('nuevoregistro',function(){
    $nuevos_usuarios = [
        [
            'name' => 'Liam (Canadá)',
            'email' => 'liam@maple.ca',
            'telefono' => '+1-416-555-0198',
            'calle' => 'Toronto, Ontario'
        ],
        [
            'name' => 'Kenji (Japón)',
            'email' => 'kenji@tokyo.jp',
            'telefono' => '+81-3-1234-5678',
            'calle' => 'Shibuya, Tokio'
        ],
        [
            'name' => 'Ivan (Rusia)',
            'email' => 'ivan@moscow.ru',
            'telefono' => '+7-495-123-4567',
            'calle' => 'Plaza Roja, Moscú'
        ],
        [
            'name' => 'Carlos (México)',
            'email' => 'carlos@cdmx.mx',
            'telefono' => '+52-55-1234-5678',
            'calle' => 'Reforma, CDMX'
        ]
    ];

    
    foreach ($nuevos_usuarios as $user) {
        $pagina = new Pagina;
        $pagina->name = $user['name'];
        $pagina->email = $user['email'];
        $pagina->email_verified_at = date('Y-m-d H:i:s');
        $pagina->password = '1234'; 
        $pagina->avatar = 'user.png';
        $pagina->telefono = $user['telefono'];
        $pagina->calle = $user['calle'];
        $pagina->is_active = 1; 
        $pagina->save();
    }
    return "¡Los 4 usuarios fueron creados con éxito!";
});

//Definido el método para buscar por el ID
Route::get('buscarpaginaid',function(){
    $post=Pagina::find(2);
    return $post;
});

//Definido el metodo para buscar por un campo determinado
Route::get('buscarxname',function(){
    $post=Pagina::where('name','Enrique')->first();
    return $post;
});

//Para recuperar más de un registro
Route::get('obtenertodos',function(){
    $posts=Pagina::all();
    return $posts;
});

Route::get('updatename',function(){
    $post=Pagina::where('name','Enrique')->first();
    $post->email='Enrique@gmail.com';
    $post->save();
    return $post;
});

Route::get('filter',function(){
    $posts=Pagina::where('calle','like','%12%')->get();
    return $posts;
});

Route::get('trescampos',function(){
    $posts=Pagina::select('name','email','telefono')->get();
    return $posts;
});

Route::get('filtroxnumreg',function(){
    $posts=Pagina::select('name','email')->orderBy('name')->take(2)->get();
    return $posts;
});

Route::get('eliminar_registro',function(){
    $post=Pagina::find(4);
    $post->delete();
    return "Registro eliminado";
});

Route::get('Obtenerfechaformato',function(){
    $post=Pagina::select('name','email','created_at')->find(2);
    return $post;
});

Route::get('Obtenerestatus',function(){
    $post=Pagina::find(1);
    dd($post->is_active);
});

Route::put('/actualizar-dato/{id}',[HomeController::class,'update'])->name('actualizar.dato');
Route::put('/eliminar-logico/{id}', [HomeController::class, 'eliminarLogico']);
Route::delete('/eliminar-fisico/{id}', [HomeController::class, 'eliminarFisico']);
