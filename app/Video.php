<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Auth;

class Video extends Model
{
	protected $fillable = ["title", "description"];
	use Searchable;

	function owner() {
		return $this->belongsTo('App\User', 'uploaded_by');
	}

	function tags() {
		return $this->belongsToMany('App\Tag', 'videos_tags', 'video_id', 'tag_id');
	}

	function addTagToVideo(Tag $tag) {
		$this->tags()->attach($tag->id, ['user_id' => Auth::user()->id]);
	}

	function flags() {
		return $this->hasMany('App\Flag', 'video_id');
	}

	function hasPendingFlags() {
		return $this->flags->where("status", "pending")->count();
	}
}
