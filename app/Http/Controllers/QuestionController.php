<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Question;
use App\Area;
use Input;
use Redirect;


class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list = Question::all();
		return view('questions.index')
			->with('questions', $list);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$areas = Area::all()->lists('name', 'id');
		return view('questions.create')
			->with('areas', $areas);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		//dd($input);
		$question = Question::create( $input );
		$file = Request::file('imagelink');

		$file->move(base_path() . '/public/img/', $file->getClientOriginalName());
				
		$filename = $file->getClientOriginalName();
    	$question->imagelink = '/question/public/img/'.$filename;
    	$question->save();
 		
		return Redirect::route('questions.index')->with('message', 'Frage erstellt');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::find($id);
		return view('questions.show')->with('question', $question);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$areas = Area::all()->lists('name', 'id');
		$question = Question::find($id);

		return view('questions.edit')
			->with('question', $question)
			->with('areas', $areas);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$question = Question::find($id);
		$input = array_except(Input::all(), 'image');
		$question->update($input);

		if (Request::hasFile('imagelink'))
		{
			$file = Request::file('imagelink');

			$file->move(base_path() . '/public/img/', $file->getClientOriginalName());
					
			$filename = $file->getClientOriginalName();
			$question->imagelink = '/question/public/img/'.$filename;
			$question->save();	
		}
		

		return Redirect::route('questions.index')->with('message', 'Bereich geupdated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	
		$question = Question::find($id);
		$question->delete();

		return Redirect::route('questions.index')->with('message', 'Bereich gelöscht.');
	}

}
