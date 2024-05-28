<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Nome -->
        <div>
            <x-input-label for="name" :value="__('Nome (*)')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email (*)')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Acesso -->
        <div class="mt-4">
            <x-input-label for="usertype" :value="__('Tipo do acesso (*)')" />
            <input type="radio" name="usertype" value="admin">
            <label for="admin">Administrador</label>
            <input type="radio" name="usertype" value="user">
            <label for="user">Usuário</label>
            <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha (*)')" />

            <x-text-input id="password" class="block mt-1 w-full"
            type="password" name="password" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a senha (*)')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
            type="password" name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já sou cadastrado') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Cadastrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
