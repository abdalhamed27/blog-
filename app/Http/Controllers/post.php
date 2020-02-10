<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\postb;
use App\User;
use App\teg;
use Image;
class post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $post=postb::orderBy('id','DESC')->paginate(9);
        
        return view('posts.index',compact('post'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tegs=teg::all();
      return view('posts.create',compact('tegs'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required',
            'body'=>'required|min:3',
            'img'=>'required'
         ]);

$user_id=Auth::id();
         $add=new postb();

     $add->title=$request->input('title'); 
      $add->body=$request->input('body');
      $add->user_id=$user_id;      
      if($request->hasFile('img')){
      $img=$request->img;
$filename=time() ."_".$img->getClientOriginalName();
$localtion=public_path('image/'.$filename);
  //$img->move($localtion);
  image::make($img)->resize(800,400)->save($localtion);
 
  }

 $add->img=$filename; 
      
 $add->save();
       $add->teg()->sync($request->tegs);

       return  back();

       //redirect('posts.index')->with('s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post=postb::find($id);
         
       return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $post=postb::find($id);
    $user=Auth::id();
    if($post->user_id !== $user){

        return redirect('/posts')->with('error','yah');
    }

    $tegs=teg::all();

    return view('posts.edit',compact('post','tegs'));
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
        $up=postb::find($id);
        $up->title=$request->input('title'); 
        $up->body=$request->input('body');      
          
          if($request->file('img')  !== null){
unlink('image/'.$up->img);
      $img=$request->img;

$filename=time() ."_".$img->getClientOriginalName();
$localtion=public_path('image/'.$filename);

  //$img->move($localtion);
  image::make($img)->resize(800,400)->save($localtion);
 $up->img=$filename;
  }
  else{

    $up->img=$up->img;
  }

        $up->save();
               $up->teg()->sync($request->tegs);
  

   return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $da=postb::find($id);
        $da->delete();
        return redirect('posts');
    }
}
