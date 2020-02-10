<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\comment;
use App\postb;
class CommentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function comment(Request $request,$id)
    {
    $request->validate([
    'comment'=>'required'
    ]);

    // post_id
    $post=postb::where('id',$id)->firstOrFail();
    // users
    $userid=Auth::id(); 
$comment= new comment();
 $comment->body=$request->input('comment');
    $comment->postb()->associate($post);
    $comment->user_id=$userid;
    $comment->save();
    return redirect()->route('posts.index',$id);

    }

}
