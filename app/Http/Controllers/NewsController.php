<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\mainnews;
use App\category;
use App\subcategory;
use App\review;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
       $this->middleware('auth:web');
    }

    public function index()
    {
        $mainnews = mainnews::orderBy('id', 'desc')->get();
        return view('admin.news_list', compact('mainnews'));
    }

    public function category(){
        $categories = DB::table('categories')->pluck("name","id");
        return view('admin.addnews',compact('categories'));
    }

    public function subcategory($id) 
    {        
        $subcategories = DB::table("subcategories")->where("category_id",$id)->pluck("name","id");
        return json_encode($subcategories);
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
       
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
     
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }

    public function review()
    {
        $reviews = review::all();
        return view('admin.review', compact('reviews'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addnews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);

        $image = null;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image = mt_rand(1001,99999).'_'.$file->getClientOriginalName();
            $file->move('user/image',$image);
        }

        $category = DB::table('categories');

        mainnews::create([
            'title'=>$request->get('title'),
            'image'=>$image,
            'description'=>$request->get('description'),
            'category_id' => $request->get('category_id'),
            'subcategory_id'=>$request->get('subcategory_id'),
            'editor'=>$request->get('editor'),
            'status'=>$request->get('status'),
            'keyword'=>$request->get('keyword'),
            'hashtag'=>$request->get('hashtag')
        ]);

        $request->session()->flash('msg','Data added successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = DB::table('categories')->pluck("name","id");
        $news = mainnews::where('id',$id)->first();
        return view('admin.edit-news', compact('news', 'categories'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required'
        ]);

        $updatenews = mainnews::find($id);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $image= mt_rand(1001,99999).'_'.$file->getClientOriginalName();
            $file->move('user/image',$image);
            $updatenews->image=$image;
        }

        $updatenews->update([
            'title'=>$request->get('title'),
            'description'=>$request->get('description'),
            'category_id' => $request->get('category_id'),
            'subcategory_id'=>$request->get('subcategory_id'),
            'editor'=>$request->get('editor'),
            'status'=>$request->get('status'),
            'keyword'=>$request->get('keyword'),
            'hashtag'=>$request->get('hashtag')
        ]);

        $request->session()->flash('msg', 'Data updated succesfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deletereview($id)
    {
        $del=review::find($id);
        $del->delete();
        return redirect()->back();
        $request->session()->flash('msg','Data deleted successfully');
    }

    public function destroy($id)
    {
        mainnews::where('id', $id)->delete();
        return redirect()->back();
    }
}
