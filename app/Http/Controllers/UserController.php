<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Post,Category,User};
use Session;
use Hash;
use Auth;

use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(20);

        // $users = Auth()->user();
        // if($users->role > 0){
        //     $users = User::latest()->paginate(20);
        //     return view('admin.user.index', compact('users'));
        // }
        // else{
        //     $users = Auth()->user();
        //     return view('admin.user.index', compact('users'));
        // }

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
            'phone' => 'unique:users',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            //'slug' => Str::of($request->name),
            //'description' => $request->description,
            //'image' => $request->image,
            'role' => $request->role,
        ]);

        Session::flash('success', 'User Created Successfully.');
        return redirect()->back();
    }

    public function show(User $user){

    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' =>"unique:users,name, $user->id",
            'email' => "unique:users,email, $user->id",
            'phone' => "unique:users,phone, $user->id",
        ]);

        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> phone = $request->phone;
        $user -> password = Hash::make($request->password);
        //$user -> slug = Str::of($request->name);
        //$user -> description = $request->description;
        $user->save();

        Session::flash('success', 'User Created Successfully.');
        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        if($user){
            $user->delete();
            Session::flash('success', 'User Deleted Successfully.');
        }
        return redirect()->back();
    }
}

