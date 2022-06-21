<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules=[
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required|min:6|confirmed',
         'image' => 'mimes:jpeg,jpg,png'

            
        ];
        
        $msg=[
            
            'username.required'=>'Please, enter your username',
            'username.unique'=>'Username is already taken',
            'email.required'=>'Please, enter your email',
            'email.unique'=>'Email is already taken',
            'email.email'=>'please enter valid mail',
            'fname.required'=>"Plaese, enter first name",
            'lname.required'=>"Plaese, enter last name",
            'password.required'=>"Plaese, enter password",
            'password.min'=>'min password is 6 char',
            'password.confirmed'=>'confirm password not same',
        ];
        //dd($request->all());
        $image=$request->file('image');
        $data=validator()->make($request->all(), $rules, $msg);
        if ($data->fails()) {
            return back()->withErrors($data->errors())->withInput();
        } else {
            $record=User::create($request->all());
            $record->password = bcrypt($request->password);
            if ($image != null) {
                $record->image = $request->image->store('images/users', 'public');
            }
       
            $record->save();
            return redirect()->route('index.login');
        }
    }



    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $rules=([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $message = [
            'email.required' => 'Please, enter your email',
            'email.email'=>'please enter valid mail',
            'email.exists' => 'this email is not exist in database',
            'password.required' => 'please, enter password'

        ];

        $data = validator()->make($request->all(), $rules, $message);

        if ($data->fails()) {
            return back()->withErrors($data->errors())->withInput();
        } else {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect()->route('home');
            }
            return back()->withErrors(['password' =>'Oppes! You have entered invalid password'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index.login');
    }
}