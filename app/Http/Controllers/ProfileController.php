<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\UpdateUserRequest;
use App\Http\Resources\Profile\UserEditResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ProfileController extends Controller
{
    public function edit(): InertiaResponse
    {
        $user = new UserEditResource(Auth::user());
        return Inertia::render('profile/edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request): RedirectResponse
    {
        $data = [
            'name' => $request->name,
        ];

        $data += $request->filled('password') ? ['password' => $request->password] : [];
        $request->user()->update($data);

        return back()->with('success', 'Дані профілю успішно оновлено!');
    }
}
