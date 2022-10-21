<?php

namespace App\Http\Controllers;

use Auth;
use File;
use Image;
use Session;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all();
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        $this->validate($request, [
            'site_logo' => 'image|nullable|max:300',
            'footer_logo' => 'image|nullable|max:300',
            'copy_right' => 'required',
        ]);

        $setting->site_title = $request->site_title;
        $setting->footer_des = $request->footer_des;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->youtube = $request->youtbe;
        $setting->linkedin = $request->linkedin;
        $setting->pinterest = $request->pinterest;
        $setting->copy_right = $request->copy_right;

        if($request->hasFile('site_logo')){
            if(File::exists($request->old_image)){
                File::delete($request->old_image);
            }
            $site_logo = $request->site_logo;
            $newName = 'Site Logo'.'.'.$site_logo->getClientOriginalExtension();
            $site_logo->move('public/media/', $newName);
            $setting->site_logo = 'public/media/' . $newName;
        }
        if($request->hasFile('footer_logo')){
            if(File::exists($request->old_image)){
                File::delete($request->old_image);
            }
            $footer_logo = $request->footer_logo;
            $newName = 'Footer Logo'.'.'.$footer_logo->getClientOriginalExtension();
            $footer_logo->move('public/media/', $newName);
            $setting->footer_logo = 'public/media/' . $newName;
        }

        $setting->save();

        Session::flash('success', 'Setting Updated successfully!');
        return redirect()->route('setting.index');
    }
}
