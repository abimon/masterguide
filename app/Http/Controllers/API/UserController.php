<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('name','asc')->get();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
}
