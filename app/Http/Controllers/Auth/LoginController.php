<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class LoginController extends Controller
{
    public function create(): InertiaResponse
    {
        return Inertia::render('auth/login');
    }

    public function store(StoreLoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $request->session()->regenerate();

            return to_route('dashboard');
        }
        return back()
            ->with('error', 'Надані облікові дані не відповідають нашим записам.')
            ->onlyInput('email');
    }


}
