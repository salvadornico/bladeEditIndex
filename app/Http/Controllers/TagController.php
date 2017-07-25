<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    function addTag(Request $request, $id) {
        $passedTag = Tag::where("name", $request->tagInput);
		$video = Video::find($id);

        if (!$passedTag->count()) {
            $newTag = new Tag();
            $newTag->name = $request->tagInput;
            $newTag->save();

    		$video->addTagTovideo($newTag);
        }

		$tags = $video->tags;
        $all_tags = Tag::all();

		return view("tags_list", compact("tags"));
	}
}
