<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit(){
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_images'), $filename);
            $user->profile_image = 'uploads/profile_images/' . $filename;
        }
        $user->save();
        return redirect()->route('admin.profile.edit')->with('success', 'Profil güncellendi.');
    }
}
