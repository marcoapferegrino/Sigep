<?php namespace PosgradoService\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if ($this->auth->check())
		{
			if ($this->auth->getRol()=="admin")
			{
				return new RedirectResponse(url("logAdmin"));
			}
			elseif($this->auth->getRol()=="superAdmin")
			{
				return new RedirectResponse(url("homeSA"));
			}
			elseif($this->auth->getRol()=="alumno")
			{
				return new RedirectResponse(url("logAlumno"));
			}
			elseif($this->auth->getRol()=="docente")
			{
				return new RedirectResponse(url("homeP"));
			}

			//return new RedirectResponse(url('/home'));
		}

		return $next($request);
	}

}
