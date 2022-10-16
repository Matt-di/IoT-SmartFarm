<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = RouteServiceProvider::HOME;
  // protected function authenticated($request,$user){
  //     if($user->role == 1){
  //         return redirect()->intended('admin.dashboard'); //redirect to admin panel
  //     }elseif($user->role == 2){
  //         return redirect()->intended('merchant.dashboard'); //redirect to admin panels
  //     }

  //     return redirect()->intended('/'); //redirect to standard user homepage
  // }
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
    // dd('fsfs');

    if (auth()->attempt($request->only('email', 'password'))) {
      if (auth()->user()->role == 1) {
        // dd(auth()->user());

        return redirect()->route('admin.dashboard');
      } elseif (auth()->user()->role == 3)
        return redirect()->route('home', auth()->user()->id);
      else
        return redirect()->route('dashboard', auth()->user()->id);
    }
    return back()->with('message', 'Invalid login credentials');
  }

  public function register(Request $request)
  {
    # code...
    $this->validate($request, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
    ]);
    // dd($request);

    $created = User::create([
      'id' => Str::uuid(),
      'name' => $request->name,
      'email' => $request->email,
      'password' => bcrypt($request->password),

    ]);
    if ($created) {
      return redirect()->route('/');
    }
    return redirect()->back()->with('message', "Error!");
  }

  public function logout(Request $request)
  {
    Session::flush();

    Auth::logout();

    return redirect('/');
  }
}
