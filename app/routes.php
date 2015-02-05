<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('saludo', function(){
   return "Hola, petición procesada te saluda.";
});

Route::get('saludo/{nombre}', function($nombre){
   return 'Holaaaa $nombre';
});

Route::get('/', function()
{
   return View::make('index');
});

Route::get('listar-usuarios', function(){

	//PHPINFO(); die; 

   $users = User::where('active', true)->orderBy('real_name')->get();
   $nombres = '';
   foreach($users as $item){
      $nombres .= $item->real_name . '<br />';
   }
   return $nombres;

});


Route::any('usuario', 'UserController@enumerate');

Route::any('usuario/agregar', 'UserController@add');

Route::any('usuario/editar/{id}', 'UserController@edit');

Route::any('iniciar-sesion', 'LoginController@index');

Route::any('cerrar-session', 'LoginController@logout');




