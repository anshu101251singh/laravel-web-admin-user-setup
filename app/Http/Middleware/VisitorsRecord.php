<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;

class VisitorsRecord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $visitors_ip = $request->ip();
        $result = Visitor::where('visitors_ip', $visitors_ip)->first();

        if($result){
            $visitors_count = $result->visitors_count + 1;
            $result->update(['visitors_count' => $visitors_count, 'visited_at' => date('Y-m-d H:i:s')]);
        }else{
            Visitor::create([
                'visitors_ip' => $visitors_ip,
                'visitors_count' => 1,
                'page_name' => '',
                'visited_at' => date('Y-m-d H:i:s')
            ]);
        }

        return $next($request);
    }
}
