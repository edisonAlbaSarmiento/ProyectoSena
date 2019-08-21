<?php

namespace App\Http\Middleware;
use App\Models\Aprendiz as Aprendiz;
use Closure;

class MDAprendiz
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
        $Aprendiz = Aprendiz::select('aprendizs.*')
                    ->where('aprendizs.fkuser','=',\Auth::user()->id)
                    ->get();
                    foreach ($Aprendiz as $aprendiz ) {
                        if ($aprendiz->) {
                        
                            return $next($request);
                            
                        }
                        else{
                            abort('503');
                        }
                    }
    }
}
