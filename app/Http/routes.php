
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//rutas de4 ejemplo//
Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/', function () {
    return view('auth.login');
});
*/
Route::get('/home', 'HomeController@index');
Route::get('/cargando', 'HomeController@loading');

Route::auth();
//Se trata de un paquete de Laravel que registra todos los errores ocurridos en la aplicación
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
		//rutas empleado

		Route::resource('empleado','EmpleadoController');

		Route::post('empleado/search',['as'=>'empleado/search','uses'=>'EmpleadoController@search']);

		Route::put('empleado/update',['as'=>'empleado/update','uses'=>'EmpleadoController@update']);

		Route::post('empleado/store',['as'=>'empleado/store','uses'=>'EmpleadoController@store']);

//Rutas Lider Area
Route::group(['middleware'=>['auth','usuarioinstructorliderarea']],function(){
		//rutas area

		Route::resource('areaLA','AreaController');

		Route::post('areaLA/search',['as'=>'areaLA/search','uses'=>'Areacontroller@search']);


		//rutas entidad

		Route::resource('entidadLA','EntidadController');

		Route::post('entidadLA/search',['as'=>'entidadLA/search','uses'=>'Entidadcontroller@search']);

		Route::put('entidadLA/update',['as'=>'entidadLA/update','uses'=>'Entidadcontroller@update']);


		//rutas ficha

		Route::resource('fichaLA','FichaController');

		Route::post('fichaLA/search',['as'=>'fichaLA/search','uses'=>'FichaController@search']);

		Route::put('fichaLA/update',['as'=>'fichaLA/update','uses'=>'FichaController@update']);


		//rutas agenda

		Route::resource('agendaLA','AgendaController');

		Route::post('agendaLA/search',['as'=>'agendaLA/search','uses'=>'AgendaController@search']);

		Route::put('agendaLA/update',['as'=>'agendaLA/update','uses'=>'AgendaController@update']);


		//rutas programa

		Route::resource('programaformacionLA','ProgramaFormacionController');

		Route::post('programaformacionLA/search',['as'=>'programaformacionLA/search','uses'=>'ProgramaFormacionController@search']);

		Route::put('programaformacionLA/update',['as'=>'programaformacionLA/update','uses'=>'ProgramaFormacionController@update']);

		//rutas acta

		Route::resource('actaLA','ActaController');

		Route::post('actaLA/search',['as'=>'actaLA/search','uses'=>'Actacontroller@search']);

		Route::put('actaLA/update',['as'=>'actaLA/update','uses'=>'Actacontroller@update']);

		//rutas compromiso

		Route::resource('compromisoLA','CompromisoController');

		Route::post('compromisoLA/search',['as'=>'compromisoLA/search','uses'=>'Compromisocontroller@search']);

		Route::put('compromisoLA/update',['as'=>'compromisoLA/update','uses'=>'Compromisocontroller@update']);

		Route::post('compromisoLA/create',['as'=>'compromisoLA/create','uses'=>'Compromisocontroller@create']);

		//rutas invitados

		Route::resource('invitadosLA','InvitadosController');

		Route::post('invitadosLA/search',['as'=>'invitadosLA/search','uses'=>'Invitadoscontroller@search']);

		Route::put('invitadosLA/update',['as'=>'invitadosLA/update','uses'=>'Invitadoscontroller@update']);

		Route::post('invitadosLA/create',['as'=>'invitadosLA/create','uses'=>'Invitadoscontroller@create']);


		//rutas asistentes

		Route::resource('asistentesLA','AsistentesController');

		Route::post('asistentesLA/search',['as'=>'asistentesLA/search','uses'=>'Asistentescontroller@search']);

		Route::put('asistentesLA/update',['as'=>'asistentesLA/update','uses'=>'Asistentescontroller@update']);

		Route::post('asistentesLA/create',['as'=>'asistentesLA/create','uses'=>'Asistentescontroller@create']);

		
				//reporte ficha
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_fichaLA/{tipo}',
		 'pdfController@crear_reporte_por_ficha');

		//reportes ambiente
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_ambienteLA/{tipo}', 'pdfController@crear_reporte_por_ambiente');
		//reportes programa
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_programaLA/{tipo}', 'pdfController@crear_reporte_por_programa');

		//reportes aprendiz
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_aprendizLA/{tipo}', 'pdfController@crear_reporte_por_aprendiz');

		//reportes visita
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_visitaLA/{tipo}', 'pdfController@crear_reporte_por_visita');

		//reportes agendamiento
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_agendamientoLA/{tipo}', 'pdfController@crear_reporte_por_agendamiento');

		//reportes empleado
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoLA/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//reportes ficha aprendiz
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoLA/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//crear acta 
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_actaLA/{tipo}', 'pdfController@crear_acta');

		//crear bitacora
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_bitacoraLA/{tipo}', 'pdfController@crear_bitacora');

		//crear cantidad visitas por entidad
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_visitasLA/{tipo}', 'pdfController@crear_reporte_por_cantidad_visitas');


		//crear cantidad visitas por ficha
		Route::get('reportesLA', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_fichaAL/{tipo}', 'pdfController@crear_reporte_por_cantidad_ficha');

		//crear cantidad  de ambientes por entidad
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_ambienteLA/{tipo}', 'pdfController@crear_reporte_por_cantidad_ambiente');
});
//Lider Articulacion
Route::group(['middleware'=>['auth','usuarioliderarticulacion']],function(){
		Route::resource('area','AreaController');

		Route::post('area/search',['as'=>'area/search','uses'=>'Areacontroller@search']);

		Route::put('area/update',['as'=>'area/update','uses'=>'Areacontroller@update']);


		//rutas ambiente

		Route::resource('ambiente',	'AmbienteController');

		Route::post('ambiente/search',['as'=>'ambiente/search','uses'=>'Ambientecontroller@search']);

		Route::put('ambiente/update',['as'=>'ambiente/update','uses'=>'Ambientecontroller@update']);



		//rutas aprendiz

		Route::resource('aprendiz',	'AprendizController');

		Route::post('aprendiz/search',['as'=>'aprendiz/search','uses'=>'Aprendizcontroller@search']);

		Route::put('aprendiz/update',['as'=>'aprendiz/update','uses'=>'Aprendizcontroller@update']);

		Route::post('aprendiz/store',['as'=>'aprendiz/store','uses'=>'aprendizController@store']);

		//rutas entidad

		Route::resource('entidad',	'EntidadController');

		Route::post('entidad/search',['as'=>'entidad/search','uses'=>'Entidadcontroller@search']);

		Route::put('entidad/update',['as'=>'entidad/update','uses'=>'Entidadcontroller@update']);



		//rutas actividades

		Route::resource('actividades','ActividadesController');

		Route::post('actividades/search',['as'=>'actividades/search','uses'=>'ActividadesController@search']);

		Route::put('actividades/update',['as'=>'actividades/update','uses'=>'ActividadesController@update']);



		//rutas seguimiento

		Route::resource('seguimiento','SeguimientoController');

		Route::post('seguimiento/search',['as'=>'seguimiento/search','uses'=>'SeguimientoController@search']);

		Route::put('seguimiento/update',['as'=>'seguimiento/update','uses'=>'SeguimientoController@update']);


/*
		//rutas empleado

		Route::resource('empleado','EmpleadoController');

		Route::post('empleado/search',['as'=>'empleado/search','uses'=>'EmpleadoController@search']);

		Route::put('empleado/update',['as'=>'empleado/update','uses'=>'EmpleadoController@update']);


*/
		//rutas centro formacion

		Route::resource('centroformacion','CentroFormacionController');

		Route::post('centroformacion/search',['as'=>'centroformacion/search','uses'=>'CentroFormacionController@search']);

		Route::put('centroformacion/update',['as'=>'centroformacion/update','uses'=>'CentroFormacionController@update']);



		//rutas ficha

		Route::resource('ficha','FichaController');

		Route::post('ficha/search',['as'=>'ficha/search','uses'=>'FichaController@search']);

		Route::put('ficha/update',['as'=>'ficha/update','uses'=>'FichaController@update']);



		//rutas acta

		Route::resource('acta','ActaController');

		Route::post('acta/search',['as'=>'acta/search','uses'=>'Actacontroller@search']);

		Route::put('acta/update',['as'=>'acta/update','uses'=>'Actacontroller@update']);

		Route::post('acta/store',['as'=>'acta/store','uses'=>'ActaController@store']);
		

		//rutas compromiso

		Route::resource('compromiso','CompromisoController');

		Route::post('compromiso/search',['as'=>'compromiso/search','uses'=>'Compromisocontroller@search']);

		Route::put('compromiso/update',['as'=>'compromiso/update','uses'=>'Compromisocontroller@update']);



		//rutas invitados

		Route::resource('invitados','InvitadosController');

		Route::post('invitados/search',['as'=>'invitados/search','uses'=>'Invitadoscontroller@search']);

		Route::put('invitados/update',['as'=>'invitados/update','uses'=>'Invitadoscontroller@update']);



		//rutas asistentes

		Route::resource('asistentes','AsistentesController');

		Route::post('asistentes/search',['as'=>'asistentes/search','uses'=>'Asistentescontroller@search']);

		Route::put('asistentes/update',['as'=>'asistentes/update','uses'=>'Asistentescontroller@update']);



		//rutas requisito

		Route::resource('requisito','RequisitoController');

		Route::post('requisito/search',['as'=>'requisito/search','uses'=>'Requisitocontroller@search']);

		Route::put('requisito/update',['as'=>'requisito/update','uses'=>'Requisitocontroller@update']);



		//rutas programa

		Route::resource('programaformacion','ProgramaFormacionController');

		Route::post('programaformacion/search',['as'=>'programaformacion/search','uses'=>'ProgramaFormacionController@search']);

		Route::put('programaformacion/update',['as'=>'programaformacion/update','uses'=>'ProgramaFormacionController@update']);




		//rutas agenda

		Route::resource('agenda','AgendaController');

		Route::post('agenda/search',['as'=>'agenda/search','uses'=>'AgendaController@search']);

		Route::put('agenda/update',['as'=>'agenda/update','uses'=>'AgendaController@update']);



		//rutas rol

		Route::resource('rol','RolController');

		Route::post('rol/search',['as'=>'rol/search','uses'=>'rolcontroller@search']);

		Route::put('rol/update',['as'=>'rol/update','uses'=>'rolcontroller@update']);
		
		//reportes del sistema

		//reporte ficha
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_ficha/{tipo}',
		 'pdfController@crear_reporte_por_ficha');

		//reportes ambiente
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_ambiente/{tipo}', 'pdfController@crear_reporte_por_ambiente');
		//reportes programa
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_programa/{tipo}', 'pdfController@crear_reporte_por_programa');

		//reportes aprendiz
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_aprendiz/{tipo}', 'pdfController@crear_reporte_por_aprendiz');

		//reportes visita
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_visita/{tipo}', 'pdfController@crear_reporte_por_visita');

		//reportes agendamiento
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_agendamiento/{tipo}', 'pdfController@crear_reporte_por_agendamiento');

		//reportes empleado
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_empleado/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//reportes ficha aprendiz
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_empleado/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//crear acta 
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_acta/{tipo}', 'pdfController@crear_acta');

		//crear bitacora
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_bitacora/{tipo}', 'pdfController@crear_bitacora');

		//crear cantidad visitas por entidad
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_visitas/{tipo}', 'pdfController@crear_reporte_por_cantidad_visitas');


		//crear cantidad visitas por ficha
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_ficha/{tipo}', 'pdfController@crear_reporte_por_cantidad_ficha');

		//crear cantidad  de ambientes por entidad
		Route::get('reportes', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_ambiente/{tipo}', 'pdfController@crear_reporte_por_cantidad_ambiente');
	});

Route::group(['middleware' => ['auth','usuarioinstructor']], function () {
		//rutas entidad

		Route::resource('entidadI',	'EntidadController');

		Route::post('entidadI/search',['as'=>'entidadI/search','uses'=>'Entidadcontroller@search']);

		Route::put('entidadI/update',['as'=>'entidadI/update','uses'=>'Entidadcontroller@update']);


		//rutas centro formacion

		Route::resource('centroformacionI','CentroFormacionController');

		Route::post('centroformacionI/search',['as'=>'centroformacionI/search','uses'=>'CentroFormacionController@search']);

		Route::put('centroformacionI/update',['as'=>'centroformacionI/update','uses'=>'CentroFormacionController@update']);

		//rutas programa

		Route::resource('programaformacionI','ProgramaFormacionController');

		Route::post('programaformacionI/search',['as'=>'programaformacionI/search','uses'=>'ProgramaFormacionController@search']);

		Route::put('programaformacionI/update',['as'=>'programaformacionI/update','uses'=>'ProgramaFormacionController@update']);

        //Ruta Aprendiz

        Route::resource('aprendizI',	'AprendizController');

		Route::post('aprendizI/search',['as'=>'aprendizI/search','uses'=>'Aprendizcontroller@search']);

		Route::put('aprendizI/update',['as'=>'aprendizI/update','uses'=>'Aprendizcontroller@update']);

				//rutas acta

		Route::resource('actaI','ActaController');

		Route::post('actaI/search',['as'=>'actaI/search','uses'=>'Actacontroller@search']);

		Route::put('actaI/update',['as'=>'actaI/update','uses'=>'Actacontroller@update']);

		//rutas compromiso

		Route::resource('compromisoI','CompromisoController');

		Route::post('compromisoI/search',['as'=>'compromisoI/search','uses'=>'Compromisocontroller@search']);

		Route::put('compromisoI/update',['as'=>'compromisoI/update','uses'=>'Compromisocontroller@update']);

		Route::post('compromisoI/create',['as'=>'compromisoI/create','uses'=>'Compromisocontroller@create']);

		//rutas invitados

		Route::resource('invitadosI','InvitadosController');

		Route::post('invitadosI/search',['as'=>'invitadosI/search','uses'=>'Invitadoscontroller@search']);

		Route::put('invitadosI/update',['as'=>'invitadosI/update','uses'=>'Invitadoscontroller@update']);

		Route::post('invitadosI/create',['as'=>'invitadosI/create','uses'=>'Invitadoscontroller@create']);


		//rutas asistentes

		Route::resource('asistentesI','AsistentesController');

		Route::post('asistentesI/search',['as'=>'asistentesI/search','uses'=>'Asistentescontroller@search']);

		Route::put('asistentesI/update',['as'=>'asistentesI/update','uses'=>'Asistentescontroller@update']);

		Route::post('asistentesI/create',['as'=>'asistentesI/create','uses'=>'Asistentescontroller@create']);

//reportes del sistema

		//reporte ficha
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_fichaI/{tipo}',
		 'pdfController@crear_reporte_por_ficha');

		//reportes ambiente
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_ambienteI/{tipo}', 'pdfController@crear_reporte_por_ambiente');
		//reportes programa
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_programaI/{tipo}', 'pdfController@crear_reporte_por_programa');

		//reportesI aprendiz
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_aprendizI/{tipo}', 'pdfController@crear_reporte_por_aprendiz');

		//reportesI visita
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_visitaI/{tipo}', 'pdfController@crear_reporte_por_visita');

		//reportesI agendamiento
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_agendamientoI/{tipo}', 'pdfController@crear_reporte_por_agendamiento');

		//reportesI empleado
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoI/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//reportesI ficha aprendiz
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoI/{tipo}', 'pdfController@crear_reporte_por_empleado');

		//crear acta 
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_actaI/{tipo}', 'pdfController@crear_acta');

		//crear bitacora
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_bitacoraI/{tipo}', 'pdfController@crear_bitacora');

		//crear cantidad visitas por entidad
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_visitasI/{tipo}', 'pdfController@crear_reporte_por_cantidad_visitas');


		//crear cantidad visitas por ficha
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_fichaI/{tipo}', 'pdfController@crear_reporte_por_cantidad_ficha');

		//crear cantidad  de ambientes por entidad
		Route::get('reportesI', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_ambienteI/{tipo}', 'pdfController@crear_reporte_por_cantidad_ambiente');

});

//Rutas Instructor Etapa pro
Route::group(['middleware'=>['auth','usuarioinstructoretapapro']],function(){
	//rutas agenda

		Route::resource('agendaE','AgendaController');

		Route::post('agendaE/search',['as'=>'agendaE/search','uses'=>'AgendaController@search']);

		Route::put('agendaE/update',['as'=>'agendaE/update','uses'=>'AgendaController@update']);

	//rutas entidad

		Route::resource('entidadE',	'EntidadController');

		Route::post('entidadE/search',['as'=>'entidadE/search','uses'=>'Entidadcontroller@search']);

		Route::put('entidadE/update',['as'=>'entidadE/update','uses'=>'Entidadcontroller@update']);

	//rutas acta

		Route::resource('actaE','ActaController');

		Route::post('actaE/search',['as'=>'actaE/search','uses'=>'Actacontroller@search']);

		Route::put('actaE/update',['as'=>'actaE/update','uses'=>'Actacontroller@update']);

		//rutas compromiso

		Route::resource('compromisoE','CompromisoController');

		Route::post('compromisoE/search',['as'=>'compromisoE/search','uses'=>'Compromisocontroller@search']);

		Route::put('compromisoE/update',['as'=>'compromisoE/update','uses'=>'Compromisocontroller@update']);

		Route::post('compromisoE/create',['as'=>'compromisoE/create','uses'=>'Compromisocontroller@create']);

		//rutas invitados

		Route::resource('invitadosE','InvitadosController');

		Route::post('invitadosE/search',['as'=>'invitadosE/search','uses'=>'Invitadoscontroller@search']);

		Route::put('invitadosE/update',['as'=>'invitadosE/update','uses'=>'Invitadoscontroller@update']);

		Route::post('invitadosE/create',['as'=>'invitadosE/create','uses'=>'Invitadoscontroller@create']);


		//rutas asistentes

		Route::resource('asistentesE','AsistentesController');

		Route::post('asistentesE/search',['as'=>'asistentesE/search','uses'=>'Asistentescontroller@search']);

		Route::put('asistentesE/update',['as'=>'asistentesE/update','uses'=>'Asistentescontroller@update']);

		Route::post('asistentesE/create',['as'=>'asistentesE/create','uses'=>'Asistentescontroller@create']);


	//reporte ficha
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_fichaE/{tipo}',
		 'pdfController@crear_reporte_por_ficha');

	//reportesE ambiente
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_ambienteE/{tipo}', 'pdfController@crear_reporte_por_ambiente');
	
	//reportesE programa
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_programaE/{tipo}', 'pdfController@crear_reporte_por_programa');

	//reportesE aprendiz
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_aprendizE/{tipo}', 'pdfController@crear_reporte_por_aprendiz');

	//reportesE visita
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_visitaE/{tipo}', 'pdfController@crear_reporte_por_visita');

	//reportesE agendamiento
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_agendamientoE/{tipo}', 'pdfController@crear_reporte_por_agendamiento');

	//reportesE empleado
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoE/{tipo}', 'pdfController@crear_reporte_por_empleado');

	//reportesE ficha aprendiz
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_empleadoE/{tipo}', 'pdfController@crear_reporte_por_empleado');

	//crear acta 
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_actaE/{tipo}', 'pdfController@crear_acta');

	//crear bitacora
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_bitacoraE/{tipo}', 'pdfController@crear_bitacora');

	//crear cantidad visitas por entidad
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_visitasE/{tipo}', 'pdfController@crear_reporte_por_cantidad_visitas');


	//crear cantidad visitas por ficha
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_fichaE/{tipo}', 'pdfController@crear_reporte_por_cantidad_ficha');

	//crear cantidad  de ambientes por entidad
		Route::get('reportesE', 'pdfController@index');
		Route::get('crear_reporte_por_cantidad_ambienteE/{tipo}', 'pdfController@crear_reporte_por_cantidad_ambiente');

});
Route::group(['middleware'=>['auth','usuarioaprendiz']],function(){
		//rutas bitacora

		Route::resource('bitacoraA','BitacoraController');

		Route::post('bitacoraA/search',['as'=>'bitacoraA/search','uses'=>'Bitacoracontroller@search']);

		Route::put('bitacoraA/update',['as'=>'bitacoraA/update','uses'=>'Bitacoracontroller@update']);

		//rutas entidad

		Route::resource('entidadA',	'EntidadController');

		Route::post('entidadA/search',['as'=>'entidadA/search','uses'=>'Entidadcontroller@search']);

		Route::put('entidadA/update',['as'=>'entidadA/update','uses'=>'Entidadcontroller@update']);

		//rutas programa

		Route::resource('programaformacionA','ProgramaFormacionController');

		Route::post('programaformacionA/search',['as'=>'programaformacionA/search','uses'=>'ProgramaFormacionController@search']);

		Route::put('programaformacionA/update',['as'=>'programaformacionA/update','uses'=>'ProgramaFormacionController@update']);
});

//rutas login
/*
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
*/