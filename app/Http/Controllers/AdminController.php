<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AdminController extends Controller
{
    Public function admin_dashboard(){
        return view('admin.dashboard');
    }

    public function admin_view_profile(){
        $admin_details = Auth::user();
        return view('admin.view_profile', compact('admin_details'));
    }

    public function admin_edit_profile(){
        $admin_details = Auth::user();
        return view('admin.edit_profile', compact('admin_details'));
    }

    public function admin_update_profile(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'status' => 'required'
        ], [
            'image.mimes' => 'The image should be less than 2MB.' 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // $user = User::findOrFail($id);
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');

        $folderPath = 'uploads/profile_images';

        if ($request->hasFile('image')) { 
            if (!is_dir(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0755, true); 
            }

            $imageName = str_replace(' ','_',clean_single_input($request->name)). '_profile_image_' .time() . '.' . $request->image->extension();
            $request->image->move(public_path($folderPath), $imageName);

            $user->image = $imageName;
         }

        $user->save();
        return redirect()->route('admin.view.profile')->with([
            'admin_details' => $user,
            'success' => 'User updated successfully'
        ]);
    }
}
