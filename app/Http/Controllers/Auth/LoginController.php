<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function __construct()
    
    {
        $this-> middleware(['guest']);
    }

    public function index()
    {
        
        return view('auth.login');
    }

    public function store(Request $request ){

        // dd($request-> remember);

       $this->validate($request,[
       
        'email'=>'required|email|',
        'password'=>'required',
    ]);

    if(!Auth::attempt($request->only('email', 'password'),$request-> remember))
    {
        return back()->with ('status', 'Invalid login details');
    }

      return redirect()-> route('dashboard');
    }
}
