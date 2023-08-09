<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notifikasi
        </h2>
    </x-slot>

    <div class="divide-y divide-gray-100 dark:divide-gray-700" >
        @foreach ($logs as $log)
        <div class="lg:w-5/5 sm:w-5/5 bg-gray-100 dark:bg-gray-800 rounded-xl mx-auto ">
            <a href="{{ route('notifications-detail', $log->id) }}" class="flex px-4 py-3 
            hover:bg-gray-100 
            dark:hover:bg-gray-700 ">
                <div class="mt-1 px-6 py-4 bg-white rounded-lg shadow w-full {{ old('read', $log->read) == 0 ? 'bg-sky-500/[.06]' : '' }}">
                        <div class="w-full pl-3" >
                            <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"> <span class="font-semibold text-gray-900 dark:text-white">{{$log->nama}} ({{$log->PN}}) </span>telah {{$log->aksi}} {{$log->tabel_target}} dengan ID {{$log->id_target}}.</div>
                            <div class="text-xs text-blue-600 dark:text-blue-500">{{$log->created_at}}</div>
                        </div>
                    
                </div>
            </a>
        </div>
        @endforeach

    </div>
</x-app-layout>