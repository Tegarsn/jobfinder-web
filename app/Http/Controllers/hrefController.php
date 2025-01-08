<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class hrefController extends Controller
{
    public function landing(){
        if(Auth::check()) {
            return view ('landing');
        } else {
            return redirect()->route('formlogin');
        }
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
       return redirect('register')->with('success', 'Account created successfully!');
   }
   protected function validator(array $data)
   {
       return Validator::make($data, [
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
       return users::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
       ]);
   }
}
