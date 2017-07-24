<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    function videos() {
    	return $this->belongsToMany('App\Video', 'videos_tags', 'tag_id', 'video_id');
    }
}
