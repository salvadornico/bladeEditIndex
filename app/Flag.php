<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    function owner() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    function video() {
    	return $this->belongsTo('App\Video', 'video_id');
    }
}
