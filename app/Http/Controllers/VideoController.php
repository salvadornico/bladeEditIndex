<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Video;
use App\Tag;
use App\Flag;

class VideoController extends Controller
{
    
    function displayHome() {
        $title = "Home";
        $video = Video::inRandomOrder()->first();
        $recent_videos = Video::orderBy('id', 'desc')->take(8)->get();
        $tags = Tag::inRandomOrder()->take(20)->get();
        return view("index", compact("title", "video", "recent_videos", "tags"));
    }

    function search(Request $request) {
        $query = $request->search;
        $title = "Results for '$query'";
        $videos = Video::search($query)->get();
        $tags = Tag::search($query)->get();

        return view("search_results", compact("query", "title", "videos", "tags"));
    }

    function showDashboard() {
        $title = "Dashboard";
        $videos = Auth::user()->videos;
        $flags = Flag::where("status", "pending")->get();
        return view("dashboard", compact("title", "videos", "flags"));
    }

    function displayAllVideos() {
		$title = "Videos";
		$videos = Video::inRandomOrder()->simplePaginate(12);
		$tags = Tag::inRandomOrder()->take(20)->get();
	    return view("video_list", compact("title", "videos", "tags"));
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

	function editVideo($id) {
		$title = "Edit video";
		$video = Video::find($id);
		return view("edit_video", compact("title", "video"));
	}

	function saveVideoEdit($id, Request $request) {
		$video = Video::find($id);
		$video->update([
			"title" => $request->title,
			"description" => $request->description,
		]);
		$video->save();
		Session::flash("message", "Changes saved");
		return redirect("/videos/".$id);
	}

	function deleteVideo(Request $request) {
		$id = $request->videoToDelete;
		$video = Video::find($id);
		$video->delete();

		Session::flash("message", "Video deleted");
		return back();
	}
}
