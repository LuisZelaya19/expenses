@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 max-w-sm w-full bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-xl text-center">{{ __('Register') }}</h3>

        <form class="mt-4" method="POST" action="{{ route('register') }}">
            @csrf

            <label class="block">
                <span class="text-sm text-gray-700">{{ __('Name') }}</span>
                <input id="name" type="text" class="form-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>
            <label class="block mt-3">
                <span class="text-sm text-gray-700">{{ __('E-Mail Address') }}</span>
                <input id="email" type="email" class="form-input" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>
            <label class="block mt-3">
                <span class="text-sm text-gray-700">{{ __('Password') }}</span>
                <input id="password" type="password" class="form-input" name="password" required autocomplete="new-password">

                @error('password')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <label class="block mt-3">
                <span class="text-sm text-gray-700">{{ __('Confirm Password') }}</span>
                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
            </label>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-sm text-center text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
