<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,User};
use Session;
use Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(20);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->phone),
            //'slug' => Str::of($request->name),
            //'description' => $request->description,
            //'image' => $request->image,
        ]);

        Session::flash('success', 'User Created Successfully.');
        return redirect()->back();
    }

    public function show(User $user){

    }

    public function edit(User $user){
        $user = User::find($user);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' => 'unique:users, $user->name',
            'email' => 'email|unique:users, $user->email',
        ]);

        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> phone = $request->phone;
        $user -> password = Hash::make($request->phone);
        $user -> slug = Str::of($request->name);
        $user -> description = $request->description;
        $user->save();

        Session::flash('success', 'User Created Successfully.');
        return redirect()->back();
    }

    public function destroy(User $user){
        if($user){
            $user->delete();
            Session::flash('success', 'User Deleted Successfully.');
        }
        return redirect()->back();
    }
}

