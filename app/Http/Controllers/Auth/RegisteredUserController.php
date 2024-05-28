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

class RegisteredUserController extends Controller
{
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
    public function store(Request $request): RedirectResponse
    {
        // Validação dos dados
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:191', 'unique:' . User::class],
            'usertype' => ['required', 'string', 'max:191'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'O campo de nome é obrigatório.',
            'email.required' => 'O campo de email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.unique' => 'Este email já está sendo usado por outra conta.',
            'usertype.required' => 'O campo de tipo de usuário é obrigatório.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.confirmed' => 'A confirmação de senha não corresponde.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ]);

        // Criar o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);

        // Emitir evento de registro
        event(new Registered($user));

        // Fazer login do usuário
        Auth::login($user);

        // Redirecionar com base no tipo de usuário
        if ($user->usertype === 'admin') {
            return redirect(route('admin/dashboard'));
        } else {
            return redirect(route('dashboard'));
        }
    }
}
