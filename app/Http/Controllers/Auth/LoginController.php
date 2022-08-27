<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  // protected $redirectTo = RouteServiceProvider::HOME;
 //   public function redirectTo(){
 //       if(Auth::user()->role_as == 'admin' && Auth::user()->status == '0' )
   //     {
  //          return 'home';
 //       }
  //      if(Auth::user()->role_as == 'user' && Auth::user()->status == '0' ){
 //           return 'user';
//
 //       }
  //      if(Auth::user()->role_as == 'provider' && Auth::user()->status == '0' ){
  //          return 'provider';

   //     }
   //     if(Auth::user()->role_as == 'handyman' && Auth::user()->status == '0' ){
   //         return 'handyman';

   //     }
   //     else
  //      {
   //         response()->json(['success'=>'User status change successfully.']);
  //      }
  //  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
