<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model {

	protected $table = 'makers';

	protected $fillable = ['name', 'phone'];

	protected $hidden = ['id', 'created_at', 'updated_at'];

	public function vehicle() {
		return $this->hasMany('App\Vehicle');
	}

}