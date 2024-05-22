<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&family=Roboto:wght@400;500&family=Rochester&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('img/bolsa-tec.png') }}" >
        <title>TECSUP GARAGE</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
         
            <nav class="bg-personalized flex justify-center">
                <div class="container flex justify-between p-1">
                  <a href="{{route('dashboard')}}">
                    <img style="width: 70px;" src="{{asset('img/bolsa-tec.png')}}" alt="">
                  </a>
                  <ul class="flex flex-row gap-x-10">
                    <a href="{{route('soporte')}}" class="items-center flex flex-col  justify-center">
                      <i class='bx bx-question-mark border border-black rounded-full'></i>
                      <li>Soperte</li>
                    </a>
                    <div class="ms-3 relative items-center flex">
                      <x-dropdown align="right" width="48">
                          <x-slot name="trigger">
                          
                              <span class="inline-flex rounded-md">
                                  <button type="button" class="flex items-center border border-transparent leading-4 font-medium rounded-md    transition ease-in-out duration-150">
                                      <div class="items-center flex flex-col  justify-center">
                                          <i class='bx bx-store-alt' ></i>
                                          <p class="my-1.5">Productos</p>
                                      </div>
                                  </button>
                              </span>
                             
                          </x-slot>
  
                          <x-slot name="content">
  
                              <x-dropdown-link href="{{route('dashboard')}}">
                                Todos los productos
                              </x-dropdown-link>
  
                              <div class="border-t border-gray-200"></div>
  
                              
                              <x-dropdown-link href="{{ route('productos.tusproductos') }}">
                                  Tus productos
                              </x-dropdown-link>
                          
                          </x-slot>
                      </x-dropdown>
                  </div>
                    <a href="{{route('productos.favoritos')}}" class="items-center flex flex-col  justify-center">
                      <i class='bx bx-heart'></i>
                      <li>Favoritos</li>
                    </a>
                    <div class="ms-3 relative items-center flex">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                            
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="flex items-center border border-transparent leading-4 font-medium rounded-md    transition ease-in-out duration-150">
                                        <div class="items-center flex flex-col  justify-center">
                                            <i class='bx bx-user-circle'></i>
                                            <p class="my-1.5">Perfil</p>
                                        </div>
                                    </button>
                                </span>
                               
                            </x-slot>
    
                            <x-slot name="content">
    
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    Ir a perfil
                                </x-dropdown-link>
    
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif
    
                                <div class="border-t border-gray-200"></div>
    
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
    
                                    <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                  </ul>
                  <div class="flex items-center">
                    <a href="{{route('productos.create')}}" class="flex h-10 px-2 items-center bg-indigo-400 rounded-full gap-x-3 text-white">
                      <i class='bx bx-plus-circle' style='color:#ffffff'  ></i>
                      Subir producto
                    </a>
                  </div>
                </div>
              </nav>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="flex flex-row justify-between px-20 py-5 mt-10 bg-personalized text-sm text-white items-center w-full">
                <div class="flex flex-col items-center text-black">
                  <img style="width: 100px;" src="{{asset('img/bolsa-tec.png')}}" alt="">
                  <p class="text-xs font-medium">Copiright @2023 Tecsup</p>
                  <p class="text-xs font-medium">Garage @ All rights reserved.</p>
                </div>
                <div class="grid gap-y-2 text-center  self-start mt-5">
                  <p class="text-base text-black font-medium">Tecsup Gagabe</p>
                  <p>Quiénes somos</p>
                  <p>Sostenibilidad</p>
                  <p>Publicidad</p>
                </div>
                <div class="grid gap-y-2 text-center  self-start mt-5">
                  <p class="text-base text-black font-medium">Soporte</p>
                  <p>Centro de ayuda</p>
                  <p>Reglas de <br>publicación</p>
                </div>
                <div class="grid gap-y-2 text-center  self-start mt-5">
                  <p class="text-base text-black font-medium">Ayuda</p>
                  <p>Centro de ayuda</p>
                  <p>Reglas de <br>publicación</p>
                </div>
                <div class="grid gap-y-2 text-center self-start mt-5">
                  <p class="text-base text-black font-medium">Comunidad</p>
                  <p>Foro</p>
                </div>
              </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
