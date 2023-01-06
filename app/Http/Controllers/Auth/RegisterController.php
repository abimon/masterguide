<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact'=> ['required', 'string', 'max:10'],
            'institution'=> ['required', 'string', 'max:255'],
            'avatar' => ['image'],
            'about'=>['string', 'max:255'],
            'birthday'=> ['required', 'date', 'max:255'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
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
        //get just ext
        $extension = request()->file('avatar')->getClientOriginalExtension();
        //file name only
        $filename = request()->name;
        //File name to store
        $filenametostore = $filename . '.' . $extension;
        //upload
        request()->file('avatar')->storeAs('public/profile', $filenametostore);
        if(request()->isAssociate==1){
            $ass=1;
        }
        else{
            $ass=0;
        }
        if(request()->isInvested==1){
            $inv=1;
        }
        else{
            $inv=0;
        }
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'contact'=>$data['contact'],
            'institution'=>$data['institution'],
            'isAssociate'=>$ass,
            'isInvested'=>$inv,
            'PPNo'=>$data['PPNo'],
            'about'=>$data['about'],
            'avatar'=>$filenametostore,
            'birthday'=>$data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
        
    }
}
