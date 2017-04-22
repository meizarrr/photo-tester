<?php

namespace App\Http\Controllers;

use App\Frontdesk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class FrontDeskController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/upload';

  public function __construct()
  {
    $this->middleware('guest', ['except' => 'logout']);
  }

  public function index()
  {
    return view('frontdesk');
  }

  public function authenticate(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');

    if (auth()->guard('frontdesk')->attempt(['email' => $email, 'password' => $password ]))
    {
      flash('Welcome Aboard!');
      return redirect()->intended('upload');
    }
    else
    {
      return redirect()->intended('frontdesk')->with('status', 'Invalid Login Credentials !');
    }
  }

  public function logout()
  {
    auth()->guard('frontdesk')->logout();
    return redirect()->intended('frontdesk');
  }
}
