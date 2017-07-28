<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Tag extends Model
{
    use Searchable;

    function videos() {
    	return $this->belongsToMany('App\Video', 'videos_tags', 'tag_id', 'video_id');
    }
}
