<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambahkan Prospek
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
             
            @can('permission', 'add_prospect')
                <form method="post" action="{{ route('prospect.store') }}" >
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                    

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nama_CPP" class="block font-medium text-sm text-gray-700">Nama CPP</label>
                            <input  name="nama_CPP" id="nama_CPP" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('nama_CPP', '') }}" />
                            @error('nama_CPP')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jenis_usaha" class="block font-medium text-sm text-gray-700">Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" id="jenis_usaha"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('jenis_usaha', '') }}" />
                            @error('jenis_usaha')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <livewire:section-dropdown>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="alamat_usaha" class="block font-medium text-sm text-gray-700">Alamat Usaha</label>
                            <input type="text" name="alamat_usaha" id="alamat_usaha"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('alamat_usaha', '') }}" />
                            @error('alamat_usaha')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="sumber_pipeline" class="block font-medium text-sm text-gray-700">Sumber Pipeline</label>
                            <select id="sumber_pipeline" name="sumber_pipeline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Sumber Pipeline</option>
                                <option value="Business as Usual / Canvasing">Business as Usual / Canvasing</option>
                                <option value="Lunas Putus">Lunas Putus</option>
                                <option value="Debitur Naik Kelas">Debitur Naik Kelas</option>
                                <option value="Nasabah Simpanan">Nasabah Simpanan</option>
                                <option value="Brispot Simpanan">Brispot Simpanan</option>
                                <option value="Link 5">Link 5</option>
                                <option value="Value Chain">Value Chain</option>
                            </select>
                            @error('sumber_pipeline')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="fasilitas" class="block font-medium text-sm text-gray-700">Fasilitas</label>
                            <select id="fasilitas" name="fasilitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Fasilitasi</option>
                                <option value="Baru">Baru</option>
                                <option value="Suplesi / Tambah Fasilitas">Suplesi / Tambah Fasilitas</option>
                                <option value="Take Over">Take Over</option>
                            </select>
                            @error('fasilitas')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="segmen_kredit" class="block font-medium text-sm text-gray-700">Segmen Kredit</label>
                            <select id="segmen_kredit" name="segmen_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Segmen Kredit</option>
                                <option value="Kecil Non PEN">Kecil Non PEN</option>
                                <option value="Kecil PEN GEN-2">Kecil PEN GEN-2</option>
                                <option value="KUR Kecil">KUR Kecil</option>
                                <option value="UpperSmall Kecil">UpperSmall Kecil</option>
                                <option value="UpperSmall PEN GEN-2">UpperSmall PEN GEN-2</option>
                                <option value="Cashcol">Cashcol</option>
                                <option value="Non Cashcol">Non Cashcol</option>
                                <option value="KUR">KUR</option>
                                <option value="Upper Small">Upper Small</option>
                            </select>
                            @error('segmen_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jenis_kredit" class="block font-medium text-sm text-gray-700">Jenis Kredit</label>
                            <select id="jenis_kredit" name="jenis_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Jenis Kredit</option>
                                <option value="KMK" >KMK</option>
                                <option value="KI" >KI</option>
                            </select>
                            @error('jenis_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="potensial_kredit" class="block font-medium text-sm text-gray-700">Potensi Kredit (juta)</label>
                            <input type="number" name="potensial_kredit" id="potensial_kredit"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('potensial_kredit', '') }}" />
                            @error('potensial_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="omzet_bulanan" class="block font-medium text-sm text-gray-700">Omzet Bulanan (juta)</label>
                            <input type="number" name="omzet_bulanan" id="omzet_bulanan"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('omzet_bulanan', '') }}" />
                            @error('omzet_bulanan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="laba_bulanan" class="block font-medium text-sm text-gray-700">Laba Bulanan (juta)</label>
                            <input type="number" name="laba_bulanan" id="laba_bulanan"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('laba_bulanan', '') }}" />
                            @error('laba_bulanan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="mutasi_rekening_bri" class="block font-medium text-sm text-gray-700">Mutasi Rekening BRI (juta)</label>
                            <input type="number" name="mutasi_rekening_bri" id="mutasi_rekening_bri"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('mutasi_rekening_bri', '') }}" />
                            @error('mutasi_rekening_bri')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="mutasi_rekening_bank_lainnya" class="block font-medium text-sm text-gray-700">Mutasi Rekening Bank Lainnya (juta)</label>
                            <input type="number" name="mutasi_rekening_bank_lainnya" id="mutasi_rekening_bank_lainnya"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('mutasi_rekening_bank_lainnya', '') }}" />
                            @error('mutasi_rekening_bank_lainnya')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="saldo_simpanan_bri" class="block font-medium text-sm text-gray-700">Saldo Simpanan BRI (juta)</label>
                            <input type="number" name="saldo_simpanan_bri" id="saldo_simpanan_bri"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('saldo_simpanan_bri', '') }}" />
                            @error('saldo_simpanan_bri')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="saldo_simpanan_bank_lainnya" class="block font-medium text-sm text-gray-700">Saldo Simpanan Bank Lainnya
 (juta)</label>
                            <input type="number" name="saldo_simpanan_bank_lainnya" id="saldo_simpanan_bank_lainnya"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('saldo_simpanan_bank_lainnya', '') }}" />
                            @error('saldo_simpanan_bank_lainnya')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="segmen" class="block font-medium text-sm text-gray-700">Segmen</label>
                            <select id="segmen" name="segmen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Segmen</option>
                                <option value="Kecil">Kecil</option>
                                <option value="Program">Program</option>
                            </select>
                            @error('segmen')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="status_prospek" class="block font-medium text-sm text-gray-700">Status Prospek</label>
                            <select id="status_prospek" name="status_prospek"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Pilih Status Prospek</option>
                                <option value="Proses Pengerjaan">Proses Pengerjaan</option>
                                <option value="Sudah Putusan">Sudah Putusan</option>
                                
                            </select>
                            @error('status_prospek')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="estimasi_realisasi" class="block font-medium text-sm text-gray-700">Estimasi Realisasi</label>
                            
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input datepicker id="estimasi_realisasi" name="estimasi_realisasi" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>

                            @error('estimasi_realisasi')
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
                @else 
                <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow my-10"><p class="text-2xl font-small text-center">Form penambahan prospek ditutup sementara.</p></div>
               @endcan 
            </div>
        </div>
    </div>

</x-app-layout>