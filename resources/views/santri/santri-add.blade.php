@section('title', 'Tambah santri')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Santri') }}
        </h2>
    </x-slot>

    <div class="py-12" id="santri-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Tambah data santri') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Lengkapi formulir di bawah untuk menambahkan data santri baru.") }}
                    </p>

                    <form action="{{ route('santri.store') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <x-input-label for="nis" :value="__('NIS (Nomor Induk Siswa)')" />
                            <x-text-input id="nis" name="nis" type="text" class="mt-1 block w-full" required autofocus autocomplete="nis" readonly/>
                            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="angkatan" :value="__('Angkatan')" />
                            <x-select-option id="angkatan" name="angkatan" 
                                :options="['7' => 'Angkatan 7', '8' => 'Angkatan 8', '9' => 'Angkatan 9']" 
                                class="mt-1 block" />
                        
                            <x-input-error class="mt-2" :messages="$errors->get('angkatan')" />
                        </div>
                        
                        <div class="mt-3">
                            <x-input-label for="name" :value="__('Nama lengkap')" />
                            <x-text-input id="name" name="nama" type="text" class="mt-1 block w-full" required autofocus autocomplete="nama" />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="tgl_lahir" :value="__('Tanggal lahir')" />
                            <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full" required autofocus autocomplete="tgl_lahir" />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_lahir')" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="no_hp_wali" :value="__('No hp wali')" />
                            <x-text-input id="no_hp_wali" name="no_hp_wali" type="text" class="mt-1 block w-full" required autofocus autocomplete="no_hp_wali" />
                            <x-input-error class="mt-2" :messages="$errors->get('no_hp_wali')" />
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