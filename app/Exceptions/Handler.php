<?php namespace PosgradoService\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Session;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param  \Exception  $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ($this->isHttpException($e))
		{
			return $this->renderHttpException($e);
		}
		else
		{
			return parent::render($request, $e);
		}
	}
	//by Marco
	public static function checkQueryError(QueryException $e)
	{
		$errorCode = $e->errorInfo[1];
		if($errorCode == 1451){
			Session::flash('error',"No puedes borrarlo. Está asociado a otras registros.");
		}
		else
		{
			Session::flash('error',"Paso algo extraño lo sentimos");
		}
	}

}
