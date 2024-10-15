<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function user_login(){
        // dd(config('captcha.sitekey'), config('captcha.secret'));
        return view('auth.login');
    }

    public function captcha(){
        $builder = new CaptchaBuilder;
        $builder->build();
    
        // Store the CAPTCHA value in the session
        session(['captcha' => $builder->getPhrase()]);
    
        // Return the CAPTCHA image
        return response()->stream(function() use ($builder) {
            echo $builder->output();
        }, 200, ['Content-Type' => 'image/jpeg']);
    }

    public function login(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required',
        ];
    
        // Define custom error messages (optional)
        $messages = [
            'captcha.required' => 'Please enter the CAPTCHA code.',
        ];
    
        // Create a Validator instance
        $validator = validator::make($request->all(), $rules, $messages);
    
        // Check if CAPTCHA matches the value stored in the session
        $validator->after(function ($validator) use ($request) {
            if ($request->input('captcha') !== session('captcha')) {
                $validator->errors()->add('captcha', 'The CAPTCHA is incorrect.');
            }
        });
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed
            $request->session()->forget('captcha'); // Clear CAPTCHA session after successful login
            $user = Auth::user();
            session(['user_details' => $user]);

            if(Auth()->user()->user_type == 0){
                return redirect()->route('user.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }
    
        // Authentication failed, return back with an error
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function user_logout(){
        Auth::logout();
        Session::flush();   
        return redirect()->route('user.login');
    }

    public function user_registration(Request $request){
        return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all());
        $rules = [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'password' => 'required|string|min:8|confirmed',
        ];
    
        $messages = [
            'captcha.required' => 'Please enter the CAPTCHA code.',
        ];
    
        $validator = validator::make($request->all(), $rules, $messages);
    
        $validator->after(function ($validator) use ($request) {
            if ($request->input('captcha') !== session('captcha')) {
                $validator->errors()->add('captcha', 'The CAPTCHA is incorrect.');
            }
        });
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $directory = 'uploads/profile_images';
            
            if (!is_dir(public_path($directory))) {
                mkdir(public_path($directory), 0755, true); 
            }

            $imageName = str_replace(' ', '_', clean_single_input($request->name)) . '_profile_image_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path($directory), $imageName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName 
        ]);


        return redirect()->route('user.login')->with('success','Registration successful! You can now log in.');
    }

}
