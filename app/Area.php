<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Area extends Model {

	protected $fillable = [
		'name'
	];

	/*public function questions()
	{
		return $this->belongsTo('App\Question');
	}*/
}
