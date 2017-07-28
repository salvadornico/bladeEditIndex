<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Flag;

class FlagController extends Controller
{
    function addFlag(Request $request) {
    	$new_flag = new Flag();

		$new_flag->video_id = $request->video_id;
		$new_flag->user_id = Auth::user()->id;
		$new_flag->message = $request->message;
		$new_flag->status = "pending";
		$new_flag->save();

		Session::flash("message", "Video flagged");
		return back();
    }

    function markFlagRead(Request $request) {
    	$flag = Flag::find($request->flag_id);
    	$flag->markRead();

    	Session::flash("message", "Flag marked read");
        return redirect("/dashboard");
    }

    function markFlagDismissed(Request $request) {
    	$flag = Flag::find($request->flag_id);
    	$flag->markDismissed();

    	Session::flash("message", "Flag marked dismissed");
        return redirect("/dashboard");
    }
}
