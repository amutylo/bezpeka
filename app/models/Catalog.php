<?php

class Catalog extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
            'catalog' => 'required|alpha|min:2|max:200|unique:catalogs,catalog'
        );
}
