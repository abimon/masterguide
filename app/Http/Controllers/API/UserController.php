<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('name','asc')->get();
    }

    public function create()
    {
        $phone = request()->contact;
        $code = '+254';
        $first = substr($phone, 0, 1);
        if ($first == '0') {
            $contact = substr_replace($phone, $code, 0, 1);
        } else {
            $contact = $code . $phone;
        }
        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'contact' => $contact,
            'institution' =>request()->inst,
            'isAssociate' => request()->ass,
            'isInvested' => request()->inv,
            'PPNo' => request()->pno,
            'about' => request()->abt,
            'avatar' => 'noimage.png',
            'birthday' => request()->btd,
            'password' => Hash::make(request()->password),
        ]);
        return response()->json('Success',200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function edit($id)
    {
        
    }
    public function update()
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    function login()
    {
        $user = User::where('email', request()->email)->first();
        if ($user && Hash::check(request()->password, $user->password)) {
            return response()->json($user, 200);
        }
        return response()->json('Wrong email or password. Please try again', 400);
    }
}
