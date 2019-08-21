<?php

namespace App\Http\Middleware;
use App\Models\Empleado as Empleado;
use App\Models\Rol as Rol;
use Closure;

class MDInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $rolsEmpleado = Empleado::select('rols.nombrerol')
                    ->join('det_empleado_rols','empleados.id','=','det_empleado_rols.fkEmpleado')
                    ->join('rols','rols.id','=','det_empleado_rols.fkRol')
                    ->where('empleados.fkuser','=',\Auth::user()->id)
                    ->get();   
        foreach ($rolsEmpleado as $roles) {
            if ($roles->nombrerol == 'Instructor') {

                return $next($request);

            }
            else {

                abort('503');
            
            }   
        }
        
    }
}
