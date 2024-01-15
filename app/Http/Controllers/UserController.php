<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile($name)
    {
        $user = User::where('name', $name)->firstOrFail();
        return view('user.profile', compact('user'));
    }
    

    // public function updateProfile(Request $request)
    // {
    //     $user = auth()->user();
    
    //     // Validation
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'birthday' => 'nullable|date',
    //         'about_me' => 'nullable|string',
    //         'avatar' => 'nullable|image|max:2048', 
    //     ]);
    
    //     // Handle File Upload
    //     if ($request->hasFile('avatar')) {
    //         // Ensure the directory exists
    //         Storage::disk('public')->makeDirectory('avatars');
    
    //         $avatarPath = $request->file('avatar')->store('avatars', 'public');
    //         $user->avatar = $avatarPath;
    //     }
    
    //     // Update user details
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->birthday = $request->birthday;
    //     $user->about_me = $request->about_me;
    
    //     try {
    //         $user->save();
    //     } catch (\Exception $e) {
    //         // Handle the exception
    //         return redirect()->back()->with('error', 'Error updating profile: ' . $e->getMessage());
    //     }
    
    //     return redirect()->back()->with('success', 'Profile updated successfully.');
    // }
    





}
