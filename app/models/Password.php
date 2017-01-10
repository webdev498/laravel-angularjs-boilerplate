<?php
namespace App\Models;
class Password extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
}
