<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
        {
          $user=auth()->user()['role'];
           
          if ($user=="admin")
           {
            auth()->user()->assignRole('admin');
           }
           elseif($user=="city_manager")
           {
            auth()->user()->assignRole('citymanager');
           }
           elseif($user=="gym_manager")
           {
            auth()->user()->assignRole('gymanager');
           }

        return redirect('/home');
        }

}
