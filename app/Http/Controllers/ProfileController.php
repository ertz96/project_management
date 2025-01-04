<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
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

    public function destroyUser(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        if ($user->name === 'admin')
            return redirect('/projects')->with('status', 'You cannot delete the Admin account');

        $user->delete();
        return redirect('/projects')->with('status', 'User deleted successfully');
    }

    public function addUser(Request $request): RedirectResponse
    {
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->email_verified_at = now();
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect('/projects')->with('status', 'User added successfully');
        } catch (\Exception $e) {
            return redirect('/projects')->with('status', 'Failed to add user: ' . $e->getMessage());
        }
    }
}
