<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse{
    $request->validate([
        'name' => ['required', 'string', 'max:191'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:191', 'unique:' . User::class],
        'usertype' => ['required', 'string', 'max:191'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'usertype' => $request->usertype,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    // Verifica o tipo de usuário e redireciona para a rota apropriada
    if ($user->usertype === 'admin') {
        return redirect(route('admin/dashboard'));
    }
    else{
        return redirect(route('dashboard'));
    }


}
}
