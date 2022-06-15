<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('home.login',[
            'title' => 'Login'
        ]);
    }

    
    public function username()
    {
        return 'username';
    }

    // public function authenticate(Request $request){
    //     request()->validate(
    //         [
    //             'username' =>'required',
    //             'password' => 'required',
    //         ]);

    //     $credential = $request->only('username','password');
            
    //         if (Auth::attempt($credential)) {
    //             $user = Auth::user();
    //             if ($user->is_admin == 0) {
    //                 return redirect()->intended('dasboard.student.account');
    //             }elseif ($user->is_admin == 1) {
    //                 return redirect()->intended('dashboard.admin.dashboard');
    //             }
    //             return redirect('/');
    //         }
    //     return redirect('login');

            
        
    //     // $credentials = $request->validate([
    //     //     'username'=>'required',
    //     //     'password'=>'required',
    //     // ]);

    //     // if(Auth::attempt($credentials)){
    //     //     $request->session()->regenerate();

    //     //     return redirect()->intended('dashboard.student.cart');
    //     // }
    //     // return back()->withErrors([
    //     //     'username' => 'The provided credentials do not match our records',
    //     // ]);
        
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admindashboard');
        }
 
         return back()->withErrors([
            'username' => 'The provided credentials do not match our records',
        ]);
    }
}
