@section('title', 'Tambah data Ustadz')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Ustadz') }}
        </h2>
    </x-slot>

    <div class="py-12" id="ustadz-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Tambah Ustadz') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Lengkapi formulir di bawah untuk menambahkan data ustadz baru.") }}
                    </p>
                    <form action="{{ route('ustadz.store') }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                
                         <!-- Email Address -->
                         <div class="mt-4">
                            <x-input-label for="no_hp" :value="__('Nomor HP')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" :value="old('no_hp')" required autocomplete="no_hp" />
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                        </div>
                
                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <div class="relative">
                            <x-text-input id="password" class="block mt-1 w-full pr-10"
                                              type="password"
                                              name="password"
                                              required autocomplete="new-password" />
                                <span id="togglePassword" class="absolute inset-y-0 right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>                            
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>