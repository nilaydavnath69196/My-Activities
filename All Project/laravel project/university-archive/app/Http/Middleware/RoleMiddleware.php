<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class RoleMiddleware
{
 public function handle(Request $request, Closure $next, string $role): Response
 {
  abort_unless($request->user() && $request->user()->role === $role, 403, 'You are not authorized to access this page.');
  return $next($request);
 }
}
