@extends('layouts.auth')

@section('title', 'Забыли пароль')

@section('content')
    <x-forms.auth-forms
        title="Забыли пароль"
        action="{{ route('password.email') }}" 
        method="POST"
    >
        <x-forms.text-input
            type="email"
            name="email"
            placeholder="E-mail"
            required
            :isError="$errors->has('email')"
        />
        @error('email')
            <x-forms.error>
                {{ $message }}
            </x-forms.error>
        @enderror
        
        <x-forms.primary-button
            type="submit"
        >
            Отправить
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