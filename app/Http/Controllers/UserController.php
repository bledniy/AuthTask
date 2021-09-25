<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.update')->with(compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->name = request('name');

        if (request('password') == true){
            $user->password = Hash::make(request('password'));
            $user->save();
        }else{
            $user->save();
        }
        return redirect('/home');
    }

}
