<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use File;
use Session;
use Illuminate\Support\Str;
use App\Models\{Post,Category,User};
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable|max:500',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'slug' => Str::of($request->name)->slug('-'),
            //'description' => $request->description,
            'image' => 'public/uploads/profile.jpg',
            'role' => $request->role,
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $newImage = $user->slug.".".$image->getClientOriginalExtension();
            $image->move('public/uploads/', $newImage);
            $user->image = 'public/uploads/' . $newImage;
            $user->save();
        }else{
            $user->save();
        }

        Session::flash('success', 'User Created Successfully.');
        return redirect()->back();
    }

    public function show(User $user){
        return view('admin.user.show', compact('user'));
    }

    public function edit(User $user){
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' =>"unique:users,name, $user->id",
            'email' => "unique:users,email, $user->id",
            'phone' => "unique:users,phone, $user->id",
            'image' => 'max:500',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->slug = Str::of($request->name)->slug('-');
        //$user -> description = $request->description;


        if($request->hasFile('image')){
            return "true";
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public/uploads/', $image_new_name);
            $user->image = 'public/uploads/' . $image;
        }

        $user->save();

        Session::flash('success', 'User Created Successfully.');
        return redirect()->route('user.index');
    }

    public function destroy(User $user){
        if(File::exists($user->image)){
            File::delete($user->image);
            $user->delete();
        }else{
            $user->delete();
        }
        Session::flash('success', 'User Deleted Successfully.');
        return redirect()->route('user.index');
    }
}

