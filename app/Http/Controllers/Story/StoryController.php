<?php

namespace App\Http\Controllers\Story;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Story;
use Intervention\Image\Facades\Image;

class StoryController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {

		$stories = Story::all();

		return view('story.index', [
			'stories'=> $stories
			]);
	}

	public function createInList(Request $request) {

		if($request->ajax()) {
			Story::create( $request->all() );

			return response()->json(['code'=>200,'success' => 'Your inquire is successfully sent.']);
		} else {
			return response()->json(['code'=>200,'error' => 'Ooops!']);
		}
	}

	//Image uploader
	public function upload(Request $request) {
		$path =  public_path().'\images\\';
		$file = $request->file('file');
		$filename = str_random(20) .'.' . $file->getClientOriginalExtension() ?: 'png';
		$img = Image::make($file);
		$img->save($path . $filename);
		echo '/images/'.$filename;
	}
}