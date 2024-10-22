<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // Public function user_dashboard(){
    //     $user_details = Auth::user();
    //     return view('user.dashboard', compact('user_details'));
    // }


    public function index(Request $request){
        $user_list = User::where('user_type', '0')->paginate(10);
        return view('admin.ManageUser.index', compact('user_list',));
    }

    public function edit($id){
        $data = User::where('id', $id)->first();
        return view('admin.ManageUser.edit', compact('data'));
    }

    public function update(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'status' => 'required'
        ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
            'status' => 'required'
        ], [
            'email.email' => 'The email should be in proper format' 
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->status = $request->input('status');

        $folderPath = 'uploads/profile_images';

        if ($request->hasFile('image')) {
            // if ($user->image && Storage::disk('public')->exists($folderPath . '/' . $user->image)) {
            //     Storage::disk('public')->delete($folderPath . '/' . $user->image);
            // }
 
            if (!is_dir(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0755, true); 
            }

            $imageName = str_replace(' ','_',clean_single_input($request->name)). '_profile_image_' .time() . '.' . $request->image->extension();
            $request->image->move(public_path($folderPath), $imageName);

            $user->image = $imageName;
         }

        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function show(){
        //
    }

    public function destroy($id){
        $user_list = User::where('id', $id)->delete();
        return redirect()->back()->with([
            'success'=>'User deleted successfully!'
        ]);
    }
    
}
