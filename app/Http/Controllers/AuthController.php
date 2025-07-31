<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): RedirectResponse
    {
        $validatedRequest = $request->validated();

        $validatedRequest['password'] = Hash::make($validatedRequest['password']);

        $user = User::create($validatedRequest);

        Auth::login($user);

        return redirect('/', 302);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request
            ->session()
            ->regenerate();

        return redirect('/', 302);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/', 302);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect('/', 302);
    }
}
