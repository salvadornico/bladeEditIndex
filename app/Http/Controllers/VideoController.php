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
		$random_video = Video::inRandomOrder()->first();
		$recent_videos = Video::orderBy('created_at', 'desc')->take(4)->get();
		$all_tags = Tag::all();
	    return view("index", compact("title", "random_video", "recent_videos", "all_tags"));
	}

	function displayAllVideos() {
		$title = "Videos";
		$all_videos = Video::all();
	    return view("video_list", compact("title", "all_videos"));
	}


	function test() {
		$ytVidID = "GS1Hr86sK5I";
		$vimeoVidID = "193214598";
		return view("layouts.test_partial", compact("ytVidID", "vimeoVidID"));
	}
}
