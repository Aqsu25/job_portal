<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\imageUploadTrait;
use App\Models\Profileimage;

class ProfileController extends Controller
{
    use imageUploadTrait;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profileshow()
    {
        $profile = Auth::user()->profile;
        return view('users.profileedit', compact('profile'));
    }

    public function profilestore(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'designation' => 'required|string',
            'phone' => 'required|digits_between:10,16',

        ]);
        if ($validator->fails()) {
            return redirect()->route('myprofile')->withErrors($validator)->withInput();
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        profile::updateOrCreate(
            [
                'user_id' => $user->id
            ],
            [
                'designation' => $request->designation,
                'phone' => $request->phone,

            ]
        );
        return redirect()->route('myprofile')->with('success', 'Profile Updated Successfully!');
    }

    // updateprofile-pic
    public function updateProfilepic(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // required now
        ]);

        $profileImage = Profileimage::where('profile_id', $request->profile_id)->first();
        $oldImage = $profileImage?->image;

        $imageprofile = $this->uploadImage($request->file('image'), 'profile_image', $oldImage);

        Profileimage::updateOrCreate(
            ['profile_id' => $request->profile_id],
            ['image' => $imageprofile]
        );

        return redirect()->route('myprofile')->with('success', 'Profile Image Updated Successfully!');
    }
}
