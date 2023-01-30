@extends('layouts.auth')

@section('content')
    <x-forms.auth-forms
        title="Главная"
        action="{{ route('logOut') }}" 
        method="POST"
    >
        @method('DELETE')

        @if(auth()->user())
        <x-forms.primary-button
            type="submit"
        >
            Выход
        </x-forms.primary-button>
        @endif


        <x-slot:socialAuth>
        </x-slot:socialAuth>

        <x-slot:buttons>
            <div class="text-xxs md:text-xs">
                <a href="{{ route('signUp') }}" class="text-white hover:text-white/70 font-bold">Регистрация</a>
            </div>
            <div class="text-xxs md:text-xs">
                <a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Войти в аккаунт</a>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection