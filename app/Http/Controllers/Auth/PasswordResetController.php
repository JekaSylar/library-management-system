<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRestPasswordRequest;
use App\Http\Requests\Auth\UpdateRestPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Response as InertiaResponse;
use Inertia\Inertia;

class PasswordResetController extends Controller
{
    public function create(): InertiaResponse
    {
        return Inertia::render('auth/forgot-password');
    }

    public function store(StoreRestPasswordRequest $request): RedirectResponse
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with('success', __($status))
            : back()->with('error', __($status));
    }

    public function edit(Request $request): InertiaResponse
    {

        return Inertia::render('auth/reset-password',[
            'token' => $request->route('token'),
            'email' => $request->query('email'),
        ]);
    }

    public function update(UpdateRestPasswordRequest $request): RedirectResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PasswordReset
            ? redirect()
                ->route('login')
                ->with('success', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

}
