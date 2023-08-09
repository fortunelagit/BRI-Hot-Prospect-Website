<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambahkan Prospek
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('prospects.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="rekening_debitur" class="block font-medium text-sm text-gray-700">Nomor Rekening Debitur</label>
                            <input  name="rekening_debitur" id="rekening_debitur" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('rekening_debitur', '') }}" />
                            @error('rekening_debitur')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="CIF_debitur" class="block font-medium text-sm text-gray-700">CIF Debitur</label>
                            <input type="text" name="CIF_debitur" id="CIF_debitur"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('CIF_debitur', '') }}" />
                            @error('CIF_debitur')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="pemilik_rekening" class="block font-medium text-sm text-gray-700">Kepemilikan Rekening</label>
                            <input type="text" name="pemilik_rekening" id="pemilik_rekening"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('pemilik_rekening', '') }}" />
                            @error('pemilik_rekening')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="keterangan" class="block font-medium text-sm text-gray-700">Keterangan</label>
                            
                            <textarea name="keterangan" id="keterangan" rows="10" cols="30" class="form-input rounded-md shadow-sm mt-1 block w-full"></textarea>
                            @error('keterangan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>