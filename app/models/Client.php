<?php
class Client extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required'
	);
}
