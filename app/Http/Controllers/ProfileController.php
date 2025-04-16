<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        // Added a second argument to the validate method, which is an array of custom error messages
        [
            'email.unique' => 'This email address is already taken by another user.',
            'first_name.max' => 'Your first name is too long. Keep it under 255 characters.',
            'last_name.max' => 'Your last name is too long. Keep it under 255 characters.',
        ]);

        if ($request->hasFile('avatar')) {
            // Delete the old avatar from storage
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Store the file and get the path
            $path = $request->file('avatar')->store('avatars', 'public');

            // Add the path to the validated data array
            $validatedData['avatar'] = $path;
        }

        $user->update($validatedData);
        return redirect()->route('dashboard')->with('success', 'Profile updated successfully.');
    }
}
