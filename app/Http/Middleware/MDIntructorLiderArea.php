<?php

namespace App\Http\Middleware;
use App\Models\Empleado as Empleado;
use App\Models\Rol as Rol;
use Closure;

class MDIntructorLiderArea
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)//se encarga de las peticion donde la clausula trae la restriccion de las rutas
    {
        //trae el rol del usuario loguedo 
        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)//usuario logueado
                    ->get();
                    //trae la variable rolsempleado y le damos un alias
        foreach ($rolsEmpleado as $roles) {
            //usa el alias con el atributo de la tabla rol para que me muestre el nombre
            if ($roles->nombrerol == 'Instructor Lider Area'){//el == es para verificar si es verdadero o falso o si se cumple como un boolean 
                //retorna a la peticion de las rutas 
                return $next($request);

            }
            else {
                //error si no se realiza lo del if
                abort('503');
            
            }   
        }
    }
}
