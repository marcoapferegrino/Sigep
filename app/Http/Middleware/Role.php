<?php namespace Sigep\Http\Middleware;

use Closure;

class Role {
    protected $hierarchy = [
        'superAdmin'	=> 60,
        'admin' 		=> 50,
        'docente'		=> 40,
        'alumno' 		=> 30
    ];
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
     * @param $role
	 * @return mixed
	 */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        /*
         * Si el usuario logueado tiene un rol menor al que necesita la ruta entonces ruta no encontrada
         * */
        if($this->hierarchy[$user->rol] < $this->hierarchy[$role]) {
            abort(404);
        }
        return $next($request);
    }
}
