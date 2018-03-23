<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
	public function create()
	{
		return view('admin.category.index', [
			'category'   => [],
			'categories' => Category::with('children')->where('parent_id', '0')->get(),
			'delimiter'  => ''
		]);
	}

	public function store(Request $request)
	{
		Category::create($request->all());
		return redirect()->route('category');
	}
}
