<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Progress
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('realisasi.update', $realisasi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="rekening_debitur" class="block font-medium text-sm text-gray-700">Rekening Debitur</label>
                            <input type="text" name="rekening_debitur" id="rekening_debitur"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('rekening_debitur', $realisasi->rekening_debitur) }}" />
                            @error('rekening_debitur')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="cif_debitur" class="block font-medium text-sm text-gray-700">CIF Debitur</label>
                            <input type="text" name="cif_debitur" id="cif_debitur"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('cif_debitur', $realisasi->cif_debitur) }}" />
                            @error('cif_debitur')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="pemilik_rekening" class="block font-medium text-sm text-gray-700">Pemilik Rekening</label>
                            <input type="text" name="pemilik_rekening" id="pemilik_rekening"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('pemilik_rekening', $realisasi->pemilik_rekening) }}" />
                            @error('pemilik_rekening')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="tanggal_realisasi" class="block font-medium text-sm text-gray-700">Tanggal Realisasi</label>
                                
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker value="{{ \Carbon\Carbon::parse($realisasi->tanggal_realisasi)->format('m/d/Y') }}" id="tanggal_realisasi" name="tanggal_realisasi" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>

                                @error('tanggal_realisasi')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="keterangan" class="block font-medium text-sm text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="10" cols="30" class="form-input rounded-md shadow-sm mt-1 block w-full" 
                                     >{{ old('keterangan', $realisasi->keterangan) }}</textarea>
                            @error('keterangan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>