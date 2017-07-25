<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Video extends Model
{
    function owner() {
    	return $this->belongsTo('App\User', 'uploaded_by');
    }

    function tags() {
    	return $this->belongsToMany('App\Tag', 'videos_tags', 'video_id', 'tag_id');
    }

    function addTagToVideo(Tag $tag) {
		$this->tags()->attach($tag->id, ['user_id' => Auth::user()->id]);
	}
}
