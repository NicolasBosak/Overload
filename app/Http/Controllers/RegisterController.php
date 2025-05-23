<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.registrer');
    }
    

    public function store(Request $request, User $user) 
    {
        
        // dd($request);
        // dd($request->get('email'));


        // Validacion

        $allowedDomains = ['outlook.com', 'gmail.com'];

        $this->validate($request, [
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => [
                    'required', 'email', 'unique:users,email', 'max:60',
                    function ($attribute, $value, $fail) use ($allowedDomains) {
                        $domain = substr(strrchr($value, "@"), 1);
                            if (!in_array($domain, $allowedDomains)) {
                                $fail("El dominio del correo no es válido. Solo se permiten los dominios: " . implode(', ', $allowedDomains));
                        }
                    }
                ],
            'password' => 'required|confirmed|min:8|regex:/[a-z]/|regex:/[A-Z]/'
        ]);
        
        User::create([
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => Str::lower($request->email),
            'password' => Hash::make($request->password)
        ]);

        //Auth

        auth()->attempt([
             'email' => $request->email,
             'password' => $request->password

        ]);

        // Another way to make Auth

        // auth()->attempt($request->only('email', 'password'));
        
        return redirect()->route('posts.index', auth()->user()->username);
        }
    }