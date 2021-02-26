@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="w-full max-w-sm p-6 bg-white shadow rounded-md">
        <h3 class="text-xl text-center text-gray-700">{{ __('Login') }}</h3>

        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf

            <label class="block">
                <span class="text-sm text-gray-700">{{ __('E-Mail Address') }}</span>
                <input type="email" id="email" name="email" class="w-full mt-1 form-input" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <label class="block mt-3">
                <span class="text-sm text-gray-700">{{ __('Password') }}</span>
                <input id="password" type="password" class="form-input" name="password" required autocomplete="current-password">
                @error('password')
                <span class="text-sm text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </label>

            <div class="flex items-center justify-between mt-4">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="mx-2 text-sm text-gray-600">{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <div>
                    @if (Route::has('password.request'))
                    <a class="block text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 text-sm text-center text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
