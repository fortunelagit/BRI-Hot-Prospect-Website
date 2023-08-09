<x-app-layout>
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Permission
        </h2>
    </x-slot>
    
    
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
            
                <form method="post" action="{{ route('permission-update') }}" >
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                    
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="add_prospect" class="block font-medium text-sm text-gray-700">Izinkan User Menambahkan Prospek?</label>
                            <br>
                            <div>
                                <label class="flex items-center relative w-max cursor-pointer select-none">
                                    
                                    <input id="add" type="checkbox" value="1" name="add" {{ old('add', $add->value) ? 'checked' : '' }} class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" />
                                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> NO </span>
                                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> YES </span>
                                    <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                                </label>
                            </div>
                            @error('')
                                <p class="text-sm text-red-600">{{ $add }}</p>
                            @enderror
                        </div>
                    
                        
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="add_prospect" class="block font-medium text-sm text-gray-700">Izinkan User Mengubah Prospek?</label>
                            <br>
                            <div>
                                <label class="flex items-center relative w-max cursor-pointer select-none">
                                
                                    <input id="edit" type="checkbox" value="1" name="edit" {{ old('edit', $edit->value) ? 'checked' : '' }} class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" />
                                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> NO </span>
                                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> YES </span>
                                    <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
                                </label>
                            </div>
                            @error('')
                                <p class="text-sm text-red-600">{{ $edit }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Change
                            </button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <style>
  body {
    background-color: #171717 !important; /* bg-true-gray-900 */
    color: white !important;
  }
  
  input:checked {
    background-color: #22c55e !important; /* bg-green-500 */
    
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem !important; /* translate-x-7 */
  }

  
</style>

</x-app-layout>