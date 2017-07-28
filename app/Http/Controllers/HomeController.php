<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Video;
use App\Tag;
use App\Flag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    function displayHome() {
        $title = "Home";
        $video = Video::inRandomOrder()->first();
        $recent_videos = Video::orderBy('id', 'desc')->take(4)->get();
        $tags = Tag::inRandomOrder()->get();
        return view("index", compact("title", "video", "recent_videos", "tags"));
    }

    function showDashboard() {
        $title = "Dashboard";
        $videos = Auth::user()->videos;
        $flags = Flag::where("status", "pending")->get();
        return view("dashboard", compact("title", "videos", "flags"));
    }

    function search(Request $request) {
        $query = $request->search;
        $title = "Results for '$query'";
        $videos = Video::search($query)->get();
        $tags = Tag::search($query)->get();

        return view("search_results", compact("query", "title", "videos", "tags"));
    }

    function test() {
        $search = Video::search('chihiro')->raw();
        dd($search);
    }
}
