<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\mainnews;
use App\category;
use App\hashtag;
use App\review;
use carbon;

class FrontController extends Controller
{
    public function index(){
        $hashtag = hashtag::all();
        $category = category::all();
    	$mainnews = mainnews::orderBy('updated_at', 'desc')->get();
        $subcategory = mainnews::all();
        $feature = mainnews::orderBy('id', 'desc')
        ->where('created_at', '>', Carbon\Carbon::now()->subMinutes(30)->toDateTimeString())
        ->get();
    	return view('front.home', compact('mainnews','category', 'hashtag','subcategory','feature'));
    }

    public function news(){
        $news = mainnews::all();
    	return view('front.news', compact('news'));
    }

    public function hashtag(Request $request){
        $hashtag = $request->get('hashtag');
        $hashtags = mainnews::orderBy('id','desc')->where('hashtag', '=', $hashtag)->get();
        return view('front.hashtag', ['hashtags' =>$hashtags]);
    }

    public function newslist($id){
        $news = DB::table('mainnews')
        ->join('categories','mainnews.category_id', 'categories.id')
        ->select('mainnews.*','categories.name')
        ->where('categories.id', '=', $id)
        ->orderBy('updated_at', 'desc')
        ->get();
    	return view('front.newslist', compact('news'));
    }

    public function shownews($id)
    {
        $reviews = review::all();
        $hashtag = hashtag::all();
        $category = category::all();
        $news = mainnews::findOrFail($id);
        $feature = mainnews::orderBy('id', 'desc')
        ->where('created_at', '>', Carbon\Carbon::now()->subMinutes(30)->toDateTimeString())
        ->get();
        return view('front.news', compact('hashtag','category','news','feature', 'reviews'));
    }

    public function searchnews(Request $request){
        $newssearch = $request->get('search');
        $search = mainnews::orderBy('id','desc')->where('keyword', 'like', '%'. $newssearch . '%')->get();
        return view('front.search', ['search' =>$search]);
    }

    public function storereview(Request $request)
    {
        $this->validate($request,[
                'news_id' => 'required',
                'name'=>'required',
                'email'=>'required',
                'description'=>'required'
            ]);

            $reviews = new review;
            $reviews->news_id = $request->news_id;
            $reviews->name = $request->name;
            $reviews->email = $request->email;
            $reviews->description = $request->description;
            $reviews->save();

            return redirect()->back();

    }
}
