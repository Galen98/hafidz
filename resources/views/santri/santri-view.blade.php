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
                    <div class="mt-3">
                        <x-input-label for="name" :value="__('Nama lengkap')" />
                        <x-text-input id="name" name="nama" value="{{$santri->nama}}" type="text" class="mt-1 block w-full" required autofocus autocomplete="nama" readonly/>
                        <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                    </div>
                    <div class="mt-3">
                        <x-input-label for="tgl_lahir" :value="__('Tanggal lahir')" />
                        <x-text-input id="tgl_lahir" name="tgl_lahir" type="date" class="mt-1 block w-full" required autofocus autocomplete="tgl_lahir" disabled value="{{$santri->tgl_lahir}}"/>
                        <x-input-error class="mt-2" :messages="$errors->get('tgl_lahir')" />
                    </div>
                    <div class="flex items-center gap-4 mt-4 edit-btn">
                        <x-primary-button><i class="far fa-edit"></i> {{ __('Edit') }}</x-primary-button>
                    </div>
                    </div>
                    @include('profile.partials.santri-delete-form', ['id' => $santri->id])
                </div>
            </div>
        </div>   
        
    </div>
</x-app-layout>