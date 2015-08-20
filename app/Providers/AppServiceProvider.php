<?php namespace PosgradoService\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		Validator::extend('differenceDate', function($field,$value,$parameters){
			$total = strtotime($parameters[0]) - strtotime($value);
			//dd($field,$value,$parameters);
			//dd($total);
			if($total == 5400)
			{
				return true;
			}
			else return false;
		});

		Validator::extend('biggerDate', function($field,$value,$parameters){
			$horaFin      = strtotime($parameters[0]);
			$horaInicial  = strtotime($value);
			//dd($field,$value,$parameters);
			//dd($total);
			if($horaInicial<$horaFin)
			{
				return true;
			}
			else return false;
		});


	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'PosgradoService\Services\Registrar'
		);
	}

}
