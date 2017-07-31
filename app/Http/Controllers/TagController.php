<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Tag;
use Session;

class TagController extends Controller
{
    function displayAllTags() {
        $title = "Search by Tag";
        $tags = Tag::simplePaginate(100);
        return view("tags_list", compact("title", "tags"));
    }

    function displayTag($id) {
        $tag = Tag::find($id);
        $title = "Videos tagged: " . $tag->tag;
        $videos = $tag->videos;
        return view("single_tag", compact("tag", "title", "videos"));
    }

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

    function deleteTag(Request $request) {
        $id = $request->tagToDelete;
        $tag = Tag::find($id);
        $tag->delete();

        Session::flash("message", "Tag deleted");
        return redirect("/");
    }
}
