@extends('layouts.auth')

@section('title', 'Сброс пароля')

@section('content')
    <x-forms.auth-forms
        title="Сброс пароля"
        action="{{ route('password.update') }}"
        method="POST"
    >
        <input type="hidden" name="token" value="{{ $token }}" >

        <x-forms.text-input
            type="email"
            name="email"
            placeholder="E-mail"
            value="{{ request('email') }}"
            required
            :isError="$errors->has('email')"
        />
        @error('email')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror


        <x-forms.text-input
            type="password"
            name="password"
            placeholder="Пароль"
            required
            :isError="$errors->has('password')"
        />
        @error('password')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror

        <x-forms.text-input
            type="password"
            name="password"
            placeholder="Пароль"
            required
            :isError="$errors->has('password_confirmation')"
        />
        @error('password_confirmation')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror
        
        <x-forms.primary-button
            type="submit"
        >
            Сбросить пароль
        </x-forms.primary-button>

        
        <x-slot:socialAuth>
        </x-slot:socialAuth>
        
        <x-slot:buttons>
        <div class="text-xxs md:text-xs">
            <a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Войти в аккаунт</a>
        </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection