<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
	// Mass assigned
	protected $fillable = ['title', 'slug', 'parent_id', 'description', 'sort', 'color', 'published', 'created_at', 'updated_at'];

	// Mutators
	public function setSlugAttribute($value) {
		$this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40));
	}
	// Get children category
	public function children() {
		return $this->hasMany(self::class, 'parent_id');
	}
}
