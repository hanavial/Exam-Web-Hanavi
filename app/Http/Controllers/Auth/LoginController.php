<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:guru')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    // Guru
    public function showLoginFormGuru()
    {
        return view('auth.login', ['route' => route('guru.login_view'), 'title'=>'Guru']);
    }

    public function loginGuru(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (\Auth::guard('guru')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/guru');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    // Admin
    public function showLoginFormAdmin()
    {
        return view('auth.login', ['route' => route('admin.login_view'), 'title'=>'Admin']);
    }

    public function loginAdmin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (\Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
