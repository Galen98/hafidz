@section('title', 'Dashboard')
<x-landing-layout>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8 justify-center">
        <div class="col-span-2 flex justify-center">
            <form action="{{ url('/search') }}" method="GET" class="w-full max-w-xl">
                <div class="flex items-center border-gray-300 rounded-full shadow-sm">
                    <input
                        type="text"
                        name="cari_nis"
                        placeholder="Ketik NIS Santri"
                        class="w-full px-5 py-3 focus:outline-none text-gray-700 rounded-l-full"
                    />
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-3 hover:bg-blue-700 transition-all rounded-r-full"
                    > <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-landing-layout>