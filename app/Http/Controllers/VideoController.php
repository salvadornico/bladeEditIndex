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
		$video = Video::inRandomOrder()->first();
		$recent_videos = Video::orderBy('id', 'desc')->take(4)->get();
		$tags = Tag::inRandomOrder()->get();
	    return view("index", compact("title", "video", "recent_videos", "tags"));
	}

	function displayAllVideos() {
		$title = "Videos";
		$all_videos = Video::inRandomOrder()->get();
		$tags = Tag::inRandomOrder()->get();
	    return view("video_list", compact("title", "all_videos", "tags"));
	}

	function displayOneVideo($id) {
		$video = Video::find($id);
		$title = $video->title;
		$tags = $video->tags;
		$all_tags = Tag::all();
		return view("single_video", compact("video", "title", "tags", "all_tags"));
	}


	function test() {
		$ytVidID = "GS1Hr86sK5I";
		$vimeoVidID = "193214598";
		return view("layouts.test_partial", compact("ytVidID", "vimeoVidID"));
	}
}
