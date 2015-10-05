<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Area;
use Input;
use Redirect;

class AreaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = Area::all();
		return view('area.index')
			->with('areas', $list);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('area.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		Area::create( $input );
 		
		return Redirect::route('areas.index')->with('message', 'Bereich erstellt');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$area = Area::find($id);
		return view('area.show')->with('area', $area);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$area = Area::find($id);

		return view('area.edit')->with('area', $area);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$area = Area::find($id);
		$input = array_except(Input::all(), '_method');
		$area->update($input);
 
		return Redirect::route('areas.show')->with('message', 'Bereich geupdated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$area = Area::find($id);
		$area->delete();
 		//dd('nya');
		return Redirect::route('areas.index')->with('message', 'Bereich gelöscht.');
	}

}
