<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function landing(){
    if (!auth()->check()) {
        return redirect()->route('formlogin'); // Ganti 'login' dengan nama route login Anda
    }

    return view('landing');
   }


    public function registerform() {
        return view('register');
    }

    public function register(Request $request)
    {
       // Validate the request data
    $this->validator($request->all())->validate();
       // Create the user
    $user = $this->create($request->all());
       // Log the user in
        auth()->login($user);
       // Redirect to home or a different page
        return redirect('login')->with('success', 'Account created successfully!');
    }
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\Models\User
    */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

