@section('title', 'Lihat santri')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat santri') }}
        </h2>
    </x-slot>

    <div class="py-12" id="santri-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Informasi Data Santri') }}
                    </h2>
            
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Update informasi data santri dibawah ini, QR Code untuk kebutuhan presensi.") }}
                    </p>
                    
                    <div class="mt-4 mb-7">
                    {!! QrCode::size(200)->generate($santri->nis) !!}
                    <h2 class="text-lg font-medium text-gray-900 mt-2">NIS: {{$santri->nis}}</h2>
                    <form action="{{route('santri.download')}}" method="GET" class="mt-2">
                    <input type="hidden" name="nisqr" value="{{$santri->nis}}">
                    <x-light-button><i class="fa-solid fa-download"></i> {{ __('Download') }}</x-light-button>
                    </form>
                    <hr class="mt-3">
                    <form action="{{route('santri.update', $santri->id)}}" method="POST" class="mt-2">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Nama lengkap')" />
                        <x-text-input id="name" name="nama" value="{{$santri->nama}}" type="text" class="mt-1 block w-full" required autofocus autocomplete="nama" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="no_hp_wali" :value="__('No HP Wali')" />
                        <x-text-input id="no_hp_wali" name="no_hp_wali" value="{{$santri->no_hp_wali}}" type="text" class="mt-1 block w-full" required autofocus autocomplete="no_hp_wali" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('no_hp_wali')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="tgl_lahir" :value="__('Tanggal lahir')" />
                        <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full" required autofocus autocomplete="tgl_lahir" disabled value="{{$santri->tgl_lahir}}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tgl_lahir')" />
                    </div>
                    <div class="flex items-center gap-4 mt-4">
                        <x-primary-button class="edit-btn" type="button"><i class="far fa-edit"></i> {{ __('Edit') }}</x-primary-button>
                        <x-primary-button class="edit-btn-submit" style="display:none"><i class="fas fa-save"></i> {{ __('Simpan') }}</x-primary-button>
                    </div>
                    </form>
                    </div>
                    @if(Auth::user()->role == '0')
                        @include('profile.partials.santri-delete-form', ['id' => $santri->id])
                    @endif
                </div>
            </div>
        </div>   
        
    </div>
</x-app-layout>