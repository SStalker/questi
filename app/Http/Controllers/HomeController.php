<?php namespace App\Http\Controllers;
use App\Question;
use App\Area;
use Input;
use Redirect;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = Input::all();

		$areas = Area::all()->lists('name', 'id');
		if(isset($input['area_id'])){
			$questions = Question::where('area_id', '=', $input['area_id'])->get();
			$currentArea = $input['area_id'];
		}else{
			$firstarea = Area::first();
			
			if(!empty($firstarea)){
				$questions = Question::where('area_id', '=', $firstarea->id)->get();
				$currentArea = Area::first()->id;
			}else{
				$questions = [];
				$currentArea = -1;
			}
		}
		
		
		return view('home')
			->with('questions', $questions)
			->with('areas', $areas)
			->with('currentArea', $currentArea);

	}
}
