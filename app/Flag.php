<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    protected $fillable = ['status'];

    function owner() {
    	return $this->belongsTo('App\User', 'user_id');
    }

    function video() {
    	return $this->belongsTo('App\Video', 'video_id');
    }

    function markRead() {
    	$this->update(['status' => 'read']);
    }

    function markDismissed() {
    	$this->update(['status' => 'dismissed']);
    }
}
