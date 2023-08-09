<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit prospect
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
            @can('permission', 'edit_prospect')
                
                <form method="post" action="{{ route('prospect.update', $prospect->id) }}" x-data="{status_prospek: 5}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nama_CPP" class="block font-medium text-sm text-gray-700">Nama CPP</label>
                            <input  name="nama_CPP" id="nama_CPP" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('nama_CPP', $prospect->nama_CPP) }}" />
                            @error('nama_CPP')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jenis_usaha" class="block font-medium text-sm text-gray-700">Jenis Usaha</label>
                            <input type="text" name="jenis_usaha" id="jenis_usaha"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('jenis_usaha', $prospect->jenis_usaha) }}" />
                            @error('jenis_usaha')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <livewire:section-dropdown-edit :item="$prospect->sektor_industri" >
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="alamat_usaha" class="block font-medium text-sm text-gray-700">Alamat Usaha</label>
                            <input type="text" name="alamat_usaha" id="alamat_usaha"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('alamat_usaha', $prospect->alamat_usaha) }}" />
                            @error('alamat_usaha')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="sumber_pipeline" class="block font-medium text-sm text-gray-700">Sumber Pipeline</label>
                            <select id="sumber_pipeline" name="sumber_pipeline" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                                <option value="Business as Usual / Canvasing" {{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Business as Usual / Canvasing" ? 'selected' : '' }}>Business as Usual / Canvasing</option>
                                <option value="Lunas Putus" {{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Lunas Putus" ? 'selected' : '' }}>Lunas Putus</option>
                                <option value="Debitur Naik Kelas"{{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Debitur Naik Kelas" ? 'selected' : '' }}>Debitur Naik Kelas</option>
                                <option value="Nasabah Simpanan" {{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Nasabah Simpanan" ? 'selected' : '' }}>Nasabah Simpanan</option>
                                <option value="Brispot Simpanan" {{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Brispot Simpanan" ? 'selected' : '' }}>Brispot Simpanan</option>
                                <option value="Link 5" {{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Link 5" ? 'selected' : '' }}>Link 5</option>
                                <option value="Value Chain"{{ old('sumber_pipeline', $prospect->sumber_pipeline) == "Value Chain" ? 'selected' : '' }}>Value Chain</option>
                                
                            </select>
                            @error('sumber_pipeline')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="fasilitas" class="block font-medium text-sm text-gray-700">Fasilitas</label>
                            <select id="fasilitas" name="fasilitas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Baru" {{ old('fasilitas', $prospect->fasilitas) == "Baru" ? 'selected' : '' }}>Baru</option>
                                
                                <option value="Suplesi / Tambah Fasilitas" {{ old('fasilitas', $prospect->fasilitas) == "Suplesi / Tambah Fasilitas" ? 'selected' : '' }}>Suplesi / Tambah Fasilitas</option>
                                <option value="Take Over" {{ old('fasilitas', $prospect->fasilitas) == "Take Over" ? 'selected' : '' }}>Take Over</option>
                            </select>
                            @error('fasilitas')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="segmen_kredit" class="block font-medium text-sm text-gray-700">Segmen Kredit</label>
                            <select id="segmen_kredit" name="segmen_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Kecil Non PEN" {{ old('segmen_kredit', $prospect->segmen_kredit) == "Kecil Non PEN" ? 'selected' : '' }}>Kecil Non PEN</option>
                                <option value="Kecil PEN GEN-2" {{ old('segmen_kredit', $prospect->segmen_kredit) == "Kecil PEN GEN-2" ? 'selected' : '' }}>Kecil PEN GEN-2</option>
                                <option value="KUR Kecil" {{ old('segmen_kredit', $prospect->segmen_kredit) == "KUR Kecil" ? 'selected' : '' }}>KUR Kecil</option>
                                <option value="UpperSmall Kecil" {{ old('segmen_kredit', $prospect->segmen_kredit) == "UpperSmall Kecil" ? 'selected' : '' }}>UpperSmall Kecil</option>
                                <option value="UpperSmall PEN GEN-2" {{ old('segmen_kredit', $prospect->segmen_kredit) == "UpperSmall PEN GEN-2" ? 'selected' : '' }}>UpperSmall PEN GEN-2</option>
                                <option value="Cashcol" {{ old('segmen_kredit', $prospect->segmen_kredit) == "Cashcol" ? 'selected' : '' }}>Cashcol</option>
                                <option value="Non Cashcol" {{ old('segmen_kredit', $prospect->segmen_kredit) == "Non Cashcol" ? 'selected' : '' }}>Non Cashcol</option>
                                <option value="KUR" {{ old('segmen_kredit', $prospect->segmen_kredit) == "KUR" ? 'selected' : '' }}>KUR</option>
                                <option value="Upper Small" {{ old('segmen_kredit', $prospect->segmen_kredit) == "Upper Small" ? 'selected' : '' }}>Upper Small</option>
                            </select>
                            @error('segmen_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jenis_kredit" class="block font-medium text-sm text-gray-700">Jenis Kredit</label>
                            <select id="jenis_kredit" name="jenis_kredit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="KMK" {{ old('jenis_kredit', $prospect->jenis_kredit) == "KMK" ? 'selected' : '' }}>KMK</option>
                                <option value="KI" {{  old('jenis_kredit', $prospect->jenis_kredit) == "KI" ? 'selected' : '' }}>KI</option>
                            </select>
                            @error('jenis_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="potensial_kredit" class="block font-medium text-sm text-gray-700">Potensi Kredit (juta)</label>
                            <input type="number" name="potensial_kredit" id="potensial_kredit"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('potensial_kredit', $prospect->potensial_kredit) }}" />
                            @error('potensial_kredit')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="omzet_bulanan" class="block font-medium text-sm text-gray-700">Omzet Bulanan (juta)</label>
                            <input type="number" name="omzet_bulanan" id="omzet_bulanan"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('omzet_bulanan', $prospect->omzet_bulanan) }}" />
                            @error('omzet_bulanan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="laba_bulanan" class="block font-medium text-sm text-gray-700">Laba Bulanan (juta)</label>
                            <input type="number" name="laba_bulanan" id="laba_bulanan"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('laba_bulanan', $prospect->laba_bulanan) }}" />
                            @error('laba_bulanan')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="mutasi_rekening_bri" class="block font-medium text-sm text-gray-700">Mutasi Rekening BRI (juta)</label>
                            <input type="number" name="mutasi_rekening_bri" id="mutasi_rekening_bri"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('mutasi_rekening_bri', $prospect->mutasi_rekening_bri) }}" />
                            @error('mutasi_rekening_bri')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="mutasi_rekening_bank_lainnya" class="block font-medium text-sm text-gray-700">Mutasi Rekening Bank Lainnya (juta)</label>
                            <input type="number" name="mutasi_rekening_bank_lainnya" id="mutasi_rekening_bank_lainnya"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('mutasi_rekening_bank_lainnya', $prospect->mutasi_rekening_bank_lainnya) }}" />
                            @error('mutasi_rekening_bank_lainnya')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="saldo_simpanan_bri" class="block font-medium text-sm text-gray-700">Saldo Simpanan BRI (juta)</label>
                            <input type="number" name="saldo_simpanan_bri" id="saldo_simpanan_bri"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('saldo_simpanan_bri', $prospect->saldo_simpanan_bri) }}" />
                            @error('saldo_simpanan_bri')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="saldo_simpanan_bank_lainnya" class="block font-medium text-sm text-gray-700">Saldo Simpanan Bank Lainnya (juta)</label>
                            <input type="number" name="saldo_simpanan_bank_lainnya" id="saldo_simpanan_bank_lainnya"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('saldo_simpanan_bank_lainnya', $prospect->saldo_simpanan_bank_lainnya) }}" />
                            @error('saldo_simpanan_bank_lainnya')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="segmen" class="block font-medium text-sm text-gray-700">Segmen</label>
                            <select id="segmen" name="segmen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                                <option value="Kecil" {{ old('segmen', $prospect->segmen) == "Kecil" ? 'selected' : '' }}>Kecil</option>
                                <option value="Program" {{ old('segmen', $prospect->segmen) == "Program" ? 'selected' : '' }}>Program</option>
                            </select>
                            @error('segmen')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="status_prospek" class="block font-medium text-sm text-gray-700">Status Prospek</label>
                            <select id="status_prospek" name="status_prospek" x-model="status_prospek" x-init="status_prospek = '{{$prospect->status_prospek ?? ''}}'" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                
                                <option value="Proses Pengerjaan" >Proses Pengerjaan</option>
                                <option value="Sudah Putusan" >Sudah Putusan</option>
                                <option value="Sudah Realisasi" >Sudah Realisasi</option>
                                <option value="Batal" >Batal</option>
                                <option value="Carry Over" >Carry Over</option>
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
                                <input value="{{ \Carbon\Carbon::parse($prospect->estimasi_realisasi)->format('m/d/Y') }}" datepicker id="estimasi_realisasi" name="estimasi_realisasi" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>

                            @error('estimasi_realisasi')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div id="realisasi-specific-input" x-show="status_prospek == 'Sudah Realisasi'">
                            <div  class="px-4 py-5 bg-white sm:p-6">
                                <label for="rekening_debitur" class="block font-medium text-sm text-gray-700">Nomor Rekening Debitur</label>
                                <input  name="rekening_debitur" id="rekening_debitur" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('rekening_debitur',  $prospect->rekening_debitur) }}" />
                                @error('rekening_debitur')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="cif_debitur" class="block font-medium text-sm text-gray-700">CIF Debitur</label>
                                <input type="text" name="cif_debitur" id="cif_debitur"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('cif_debitur', $prospect->cif_debitur) }}" />
                                @error('cif_debitur')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="pemilik_rekening" class="block font-medium text-sm text-gray-700">Kepemilikan Rekening</label>
                                <input type="text" name="pemilik_rekening" id="pemilik_rekening"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('pemilik_rekening', $prospect->pemilik_rekening) }}" />
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
                                    <input datepicker value="{{ \Carbon\Carbon::parse(old($prospect->tanggal_realisasi))->format('m/d/Y') }}" id="tanggal_realisasi" name="tanggal_realisasi" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>
                                @error('tanggal_realisasi')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label for="keterangan" class="block font-medium text-sm text-gray-700">Keterangan</label>
                                <textarea name="keterangan" id="keterangan"  rows="10" cols="30" class="form-input rounded-md shadow-sm mt-1 block w-full"> {{ old('keterangan', $prospect->keterangan) }}
                                </textarea>
                                @error('keterangan')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @can('show-approval-option')
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="status_approval" class="block font-medium text-sm text-gray-700">Approval</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <input id="status_approval" type="radio" value="Disetujui" name="status_approval" {{ old('status_approval', $prospect->status_approval) == 'Disetujui' ? 'checked' : true }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="status_approval" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Disetujui</label>
                            </div>
                            
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <input id="status_approval" type="radio" value="Belum Disetujui" name="status_approval" {{ old('status_approval', $prospect->status_approval) == 'Belum Disetujui' ? 'checked' : true }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="status_approval" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum Disetujui</label>
                            </div>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <input id="status_approval" type="radio" value="Ditolak" name="status_approval" {{ old('status_approval', $prospect->status_approval) == 'Ditolak' ? 'checked' : true }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="status_approval" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ditolak</label>
                            </div>
                            @error('status_approval')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @endcan
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
                @else 
                <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow my-10"><p class="text-2xl font-small text-center">Form edit prospek ditutup sementara.</p></div>
               @endcan 
            
            </div>
        </div>
    </div>
    <script>
        // var select = document.getElementById("sektor_industri");
        // var options = ["Batubara","Buah-buahan","Bukan Logam","Cengkeh","Farmasi dan Kesehatan","Gula","Hortikultura","Jagung","Jasa Keuangan","Jasa Non Keuangan","Karet","Kedelai","Kegiatan yang Belum Jelas Batasannya","Kehutanan dan Kayu","Kelapa dan Kopra","Kelapa Sawit","Kelistrikan","Kendaraan","Keperluan Rumah Tangga","Kertas","Konstruksi","Konsumtif","Kopi","Logam","Makanan dan Minuman","Mesin","Minyak & Gas Bumi","Padi","Palawija","Perdagangan Eceran & Besar Non Komoditas","Perfilman dan Periklanan","Perhotelan","Perikanan","Peternakan","Real Estate","Rempah, Minyak Atsiri dan Komoditas Lainnya","Semen","Teh","Tekstil dan Sandang","Telekomunikasi","Tembakau","Transportasi"];

        // for(var i = 0; i < options.length; i++) {
        //     var opt = options[i];
        //     var el = document.createElement("option");
        //     el.textContent = opt;
        //     el.value = opt;
        //     select.appendChild(el);
        // }



    </script>
</x-app-layout>