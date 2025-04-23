@section('title', 'Santri')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Santri') }}
        </h2>
    </x-slot>

    <div class="py-12" id="santri-page">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Data Santri</h2>
                    @if(Auth::user()->role == '0')
                    <form action="{{route('santri.add')}}" method="GET">
                    <x-light-button><i class="fa-solid fa-plus"></i> {{ __('Tambah santri baru') }}</x-light-button>
                    </form>
                    @endif
                    
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
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 text-sm text-gray-900">Ahmad</td>
                                <td class="px-6 py-4 text-sm text-gray-900">123456</td>
                                <td class="px-6 py-4 text-sm text-gray-900">2005-07-15</td>
                                <td class="px-6 py-4 text-sm text-gray-900">2023</td>
                                <td class="px-6 py-4 text-sm relative">
                                    <x-primary-button>{{ __('Lihat') }}</x-primary-button>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>