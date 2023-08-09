
<div class="px-4 py-5 bg-white sm:p-6">
    <label for="unit" class="block font-medium text-md text-gray-700" >Unit</label>
    <select  id="unit-dd" name="unit" style="width:400px"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Pilih Unit</option>
        @foreach ($units as $unit)
            <option value="{{ $unit->nama_unit }}">{{ $unit->nama_unit }} - {{ $unit->kode_unit }} </option>
        @endforeach
    </select>
</div>
