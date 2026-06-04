<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\request;

class UserController extends Controller
{
    public function register(request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10', Rule::unique('users','name')],
            'email' => ['required', 'email', Rule::unique('users','email')],
            'password' => ['required', 'confirmed', 'min:3', 'max:200']
        ]);
        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
