<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
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

	function addVideo() {
		$title = "Add new video";
		return view("add_video_form", compact("title"));
	}

	function saveVideo(Request $request) {
		$new_video = new Video();

		$new_video->title = $request->title;
		$new_video->description = $request->description;
		$new_video->platform = $request->platform;
		$new_video->url = $request->url;
		$new_video->uploaded_by = Auth::user()->id;
		$new_video->save();

		Session::flash("message", "Video added");
		return redirect("/videos");
	}

	function deleteVideo(Request $request) {
		$id = $request->videoToDelete;
		$video = Video::find($id);
		$video->delete();

		Session::flash("message", "Video deleted");
		return back();
	}

	function showDashboard() {
		$title = "Dashboard";
		$videos = Auth::user()->videos;
		return view("dashboard", compact("title", "videos"));
	}
}
