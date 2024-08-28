<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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

    public function profile() : View {
        return view('dashboard.user.index');
    }

    public function profile_update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'nationality' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'phone_number' => 'numeric|nullable',
        ]);

        try {
            DB::beginTransaction();

            if (!empty($validated['phone_number'])) {
                $validated['phone_number'] = $this->parsePhoneNumber($validated['phone_number']);
            }

            $user = User::findOrFail($id);

            $user->update($validated);

            // dd($validated);
            DB::commit();
            return redirect('dashboard')->with('success', 'user Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'Errors' => 'An error occurred while updating the user: ' . $e->getMessage()
            ]);
        }
    }
}
