<?php namespace PosgradoService\Http\Controllers;

use PosgradoService\Http\Requests;
use PosgradoService\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProfesorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('homeProfesor');
	}



}
