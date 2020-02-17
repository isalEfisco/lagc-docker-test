<?php

namespace App\Modules\Clinics\Http\Middleware;

use Illuminate\Support\Facades\{
    Auth
};
use Closure;

class CheckClinicAccess
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
        $user = Auth::user();

        if($user->hasRole('lagc_admin') 
            || $user->hasRole('quality_improvement_admin')
        ){
            return $next($request);
        }
            
        if(is_null($user->clinic()->find($request->clinic_id))){
            return response()->json([
                'message' => "You don't have access for this action."
            ], 403);
        }

        return $next($request);
    }
}
