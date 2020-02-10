<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\verify_user;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\mail;
use App\mail\sureing;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

$verfiy=new verify_user();
$verfiy->user_id=$user->id;
$verfiy->token=Str_random(50);
$verfiy->save();
mail::to($user->email)->send(new sureing($user));
        return $user;
    }
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect()->route('login')->with('success','your created acount you need check email to  verfiy ');
    }
    public function verfiy($token)
    {
        $verify_user=verify_user::where('token',$token)->firstorfail();

        if($verify_user->user->verfiyed){
                    return redirect()->route('login')->with('error','this email aready verfiy ');

        }else{
            $verify_user->user->verfiyed=true;
              $verify_user->user->save();
            return redirect()->route('login')->with('success','now can login site');
        } 
    }
}
