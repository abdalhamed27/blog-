<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\mail\contactus;
class pr extends Controller
{
    public function index()
    {
    	$data='new data';
    
    //	return view('pages.index')->with('ata',$data);
    //	return view('pages.index',['ata'=>$data]);
    	return view('pages.index',compact('data'));
    }
    public function about(){

    	return view('pages.about');
    }
    public function contactus(){

    	return view('pages.contactus');
    }
    public function desend(Request $request )
    {
        
            $request->validate([
            'name'=>'required',
         'Email'=>'required|Email',
      'subject'=>'required',
             'body'=>'required|min:3']);
     $name=$request->input('name'); 
      $Email=$request->input('Email');      
       $subject=$request->input('subject');
        $body=$request->input('body');
mail::to("mohamedabdhiamed2@gamil.com")->send(new contactus($name,$Email,$subject,$body));
return redirect('contactus')->with('success','tosend');
    }
    
}
