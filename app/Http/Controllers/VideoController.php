<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Video;
use App\Tag;

class VideoController extends Controller
{
    function displayHome() {
		$title = "Layout Test";
	    return view("index", compact("title"));
	}

	function test() {
		dd(Auth::user()->tags());
	}
}
