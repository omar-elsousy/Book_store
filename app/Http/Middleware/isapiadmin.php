<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isapiadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->api_token!=null)
        {
            $user=User::where('api_token',$request->api_token)->first();
            if($user!=null && $user->is_admin==1)
             return $next($request);
        }
        return redirect('api/notvalid');
    }
}
