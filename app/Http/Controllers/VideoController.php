<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Video;
use App\Tag;

class VideoController extends Controller
{
    function displayHome() {
		$title = "Home";
		$recent_videos = Video::orderBy('created_at', 'desc')->take(4)->get();
		$tags = Tag::all();
	    return view("index", compact("title", "recent_videos", "tags"));
	}

	function test() {
		dd(Auth::user()->tags());
	}
}
