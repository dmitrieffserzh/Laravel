<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $table = 'pages';
	protected $fillable = ['title', 'slug', 'content','published','created_at', 'updated_at'];
	public $timestamps = false;

}
