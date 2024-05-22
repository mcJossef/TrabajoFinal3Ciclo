<x-guest-layout>

    <div class="flex flex-row w-full bg-personalized shadow-2xl" style="height: 100vh" >
        <img id="img-logo" class="w-1/2" src="{{asset('img/login.jpg')}}">
        <x-authentication-card>
            <x-slot name="logo">
                <img style="width: 380px;" src="{{asset('img/bolsa-tec.png')}}" alt="">
            </x-slot>
    
            <div class="w-full text-center">
                <h2 class="text-2xl font-bold text-slate-800 mb-5">Login</h2>
            </div>
            <x-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>
    
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>
    
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('register'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                           No tienes una cuenta?
                        </a>
                    @endif
    
                    <x-button class="ms-4">
                        Iniciar sesión
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </div>
</x-guest-layout>
