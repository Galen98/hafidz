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
                <h2 class="text-xl font-semibold mb-4">Data Ustadz</h2>
                <div class="flex items-center gap-4 mb-4 flex-wrap">
                    {{-- Dropdown per_page --}}
                    <form method="GET" action="{{ route('ustadz.index') }}" class="flex items-center">
                        <label for="per_page" class="mr-2 text-sm">Tampilkan</label>
                        <select name="per_page" id="per_page" onchange="this.form.submit()" class="text-sm border-gray-300 py-1 rounded">
                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                        </select>
                    </form>
                
                    {{-- Search bar --}}
                    <form action="{{ route('ustadz.index') }}" method="GET" class="flex">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari data.."
                            class="text-sm px-3 py-1 border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-indigo-500"
                        />
                        <button
                            type="submit"
                            class="bg-sky-600 text-white px-3 py-1 rounded-r-md text-sm hover:bg-sky-700 transition"
                        >
                            <i class="fa fa-search" aria-hidden="true"></i> Cari
                        </button>
                    </form>
                </div>   
                <form action="{{ route('ustadz.add') }}" method="GET">
                    <x-light-button><i class="fa-solid fa-plus"></i> {{ __('Tambah ustadz baru') }}</x-light-button>
                </form>
                <div class="overflow-x-auto mt-3">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No.Telpon</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($data as $index => $datas)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}.</td>
                                <td class="px-6 py-4 text-sm text-gray-900 capitalize">{{ $datas->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $datas->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $datas->no_hp }}</td>
                                <td class="px-6 py-4 text-sm relative">
                                <form action="" method="GET">
                                    <x-primary-button>{{ __('Lihat') }}</x-primary-button>
                                </form>
                                </td> 
                                </tr>
                            @endforeach
                            @if($data->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Data kosong</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
