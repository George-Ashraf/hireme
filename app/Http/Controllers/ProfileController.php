<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
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


            $request->user()->phone = $request->phone;
            $request->user()->company = $request->company;
            $request->user()->skills = $request->skills;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = $image->store('', 'profileimage');

            if ($request->user()->image && Storage::disk('profileimage')->exists($request->user()->image)) {
                Storage::disk('profileimage')->delete($request->user()->image);
            }

            $request->user()->image = "profiles/$imagename";
        }

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumename = $resume->store('', 'resumefile');

            if ($request->user()->resume && Storage::disk('resumefile')->exists($request->user()->resume)) {
                Storage::disk('resumefile')->delete($request->user()->resume);
            }

            $request->user()->resume = "resumes/$resumename";
        }
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    public function download()
    {
        $user = User::find(Auth::id());

        $resume = $user->resume;
        $filepathname = storage_path('app/public/' . $resume);
        return response()->download($filepathname);
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
    $user->application()->delete();
    $user->comment()->delete();
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
