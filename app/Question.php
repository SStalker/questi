<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class Question extends Model {

	protected $fillable = [
		'question',
		'answer',
		'imagelink',
		'area_id'
	];

	public function area()
	{

		return $this->belongsTo('App\Area');
	}
}
