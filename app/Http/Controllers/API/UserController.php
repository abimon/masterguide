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
        if(request()->hasFile('avatar')){
            $extension = request()->file('avatar')->getClientOriginalExtension();
            $filename = request()->fname;
            $filenametostore = $filename . '.' . $extension;
            request()->file('avatar')->storeAs('public/profile', $filenametostore);
        }
        else{
            $filenametostore = 'noimage.png';
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
            'avatar' => $filenametostore,
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
    public function update($id)
    {
        $user = User::findOrFail($id);
        if(request()->has('name')){
            $user->name=request()->name;
        }
        if(request()->has('email')){
            $user->email=request()->email;
        }
        if(request()->has('contact')){
            $user->contact=request()->contact;
        }
        if(request()->has('institution')){
            $user->institution=request()->institution;
        }
        if(request()->has('isAssociate')){
            $user->isAssociate=request()->isAssociate;
        }
        if(request()->has('isInvested')){
            $user->isInvested=request()->isInvested;
        }
        if(request()->has('PPNo')){
            $user->PPNo=request()->PPNo;
        }
        if(request()->has('about')){
            $user->about=request()->about;
        }
        if(request()->has('avatar')){
            $user->avatar=request()->avatar;
        }
        if(request()->has('birthday')){
            $user->birthday=request()->birthday;
        }
        if(request()->has('password')){
            $user->password=Hash::make(request()->password);
        }
        if(request()->hasFile('avatar')){
            $extension = request()->file('avatar')->getClientOriginalExtension();
            $filename = time().($user->avatar);
            request()->file('avatar')->storeAs('public/profile', $filename);
            $user->avatar=$filename;
        }
        $user->update();
        return response()->json($user,200);
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
