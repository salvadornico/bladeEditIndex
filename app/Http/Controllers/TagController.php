<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tag;

class TagController extends Controller
{
    function addTag(Request $request, $id) {
        $passedTag = Tag::where("tag", $request->tagInput);
		$video = Video::find($id);

        if (!$passedTag->count()) {
            $newTag = new Tag();
            $newTag->tag = $request->tagInput;
            $newTag->save();

    		$video->addTagTovideo($newTag);
        } else {
        	$video->addTagTovideo($passedTag->first());
        }

		$tags = $video->tags;

		return view("layouts.tags_list_partial", compact("tags"));
	}
}
