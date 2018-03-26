<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Page;

class PageController extends Controller {


	public function index() {

		$pages = Page::all();

		return view( 'admin.pages.index', [
			'pages' => $pages
		] );
	}

	public function store(Request $request)
	{
//		request()->validate([
//			'title' => 'required',
//			'slug' => 'required',
//			'content' => 'required'
//		]);
		Page::create($request->all());
		return redirect()->route('pages.index')
		                 ->with('success','Страница успешно добавлена!');
	}
	public function create($id) {

	}
	public function update(Request $request, $id) {
//		request()->validate([
//			'title' => 'required',
//			'slug' => 'required',
//			'content' => 'required'
//		]);
		Page::find($id)->update($request->all());
		return redirect()->route('admin.pages.index')
		                 ->with('success','Изменения сохранены!');
	}
	public function show($id) {
		$page = Page::find($id);
		print_r($page);
	}
	public function edit($id)
	{
		$page = Page::find($id);
		return view('admin.pages.edit',compact('page'));
	}
}

