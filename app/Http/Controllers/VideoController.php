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
    function displayAllVideos() {
		$title = "Videos";
		$all_videos = Video::inRandomOrder()->simplePaginate(12);
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
