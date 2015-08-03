<?php namespace PosgradoService\Http\Controllers;

use PosgradoService\Entities\Docente;
use PosgradoService\Entities\User;
use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;

use Illuminate\Http\Request;


class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


		return view('homeAdmin');
	}




}
