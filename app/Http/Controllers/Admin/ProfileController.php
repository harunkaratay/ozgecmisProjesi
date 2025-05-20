<?php

// app/Http/Controllers/Admin/ProfileController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $users = Auth::user();

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $users->profile_photo = $path;
        }

        $users->save();

        return redirect()->back()->with('success', 'Profil fotoğrafı güncellendi.');
    }
}
