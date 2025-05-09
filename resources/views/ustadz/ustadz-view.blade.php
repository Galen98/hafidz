@section('title', 'Ustadz')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ustadz') }}
        </h2>
    </x-slot>

    <div class="py-12" id="ustadz-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informasi Data Ustadz Detail') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update informasi data ustadz dibawah ini.") }}
                    </p>
                    <div class="mt-4 mb-7">
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$ustadz->name}}" required autofocus autocomplete="name" readonly/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$ustadz->email}}" required autocomplete="username" readonly/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="no_hp" :value="__('Nomor HP')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{$ustadz->no_hp}}" required autocomplete="no_hp" readonly/>
                            <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Ganti Password')" />
                            <div class="relative">
                            <x-text-input id="password" class="block mt-1 w-full pr-10"
                                              type="password"
                                              name="password"
                                              required autocomplete="new-password" readonly/>
                                <span id="togglePassword" class="absolute inset-y-0 right-3 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                                    <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>                            
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                       
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button class="edit-btn" type="button"><i class="far fa-edit"></i> {{ __('Edit') }}</x-primary-button>
                            <x-primary-button class="edit-btn-submit" style="display:none"><i class="fas fa-save"></i> {{ __('Simpan') }}</x-primary-button>
                        </div>

                        <h2 class="text-lg font-medium text-gray-900 mt-4">
                            {{ __('Informasi Kelompok Santri') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update informasi dibawah ini.") }}
                        </p>
                        <div class="overflow-x-auto mt-3">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">NIS</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Tgl Lahir</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Angkatan</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if($santri->kelompok->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center">Data kosong</td>
                                        </tr>
                                    @endif
                                    @foreach($santri->kelompok as $index => $santris)
                                        <tr>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}.</td>
                                            <td class="px-6 py-4 text-sm capitalize text-gray-900">{{$santris->santri->nama}}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{$santris->santri->nis}}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($santris->santri->tgl_lahir)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">Angkatan {{$santris->santri->angkatan}}</td>
                                            <td class="px-6 py-4 text-sm relative">
                                            <form action="{{ route('santri.view', $santris->santri->id) }}" method="GET">
                                            <x-primary-button>{{ __('Lihat') }}</x-primary-button>
                                            <x-primary-button>{{ __('hapus') }}</x-primary-button>
                                            </form>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>