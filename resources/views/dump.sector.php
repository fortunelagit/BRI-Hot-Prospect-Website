
<div class="px-4 py-5 bg-white sm:p-6">
    <label for="sektor_industri" class="block font-medium text-sm text-gray-700">Sektor Industri</label>
    <select id="sektor_industri" name="sektor_industri" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>Pilih Sektor Industri</option>
    </select>
    @error('sektor_industri')
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
<script>
    var select = document.getElementById("sektor_industri");
    var options = ["Batubara","Buah-buahan","Bukan Logam","Cengkeh","Farmasi dan Kesehatan","Gula","Hortikultura","Jagung","Jasa Keuangan","Jasa Non Keuangan","Karet","Kedelai","Kegiatan yang Belum Jelas Batasannya","Kehutanan dan Kayu","Kelapa dan Kopra","Kelapa Sawit","Kelistrikan","Kendaraan","Keperluan Rumah Tangga","Kertas","Konstruksi","Konsumtif","Kopi","Logam","Makanan dan Minuman","Mesin","Minyak & Gas Bumi","Padi","Palawija","Perdagangan Eceran & Besar Non Komoditas","Perfilman dan Periklanan","Perhotelan","Perikanan","Peternakan","Real Estate","Rempah, Minyak Atsiri dan Komoditas Lainnya","Semen","Teh","Tekstil dan Sandang","Telekomunikasi","Tembakau","Transportasi"];

    for(var i = 0; i < options.length; i++) {
        var opt = options[i];
        var el = document.createElement("option");
        el.textContent = opt;
        el.value = opt;
        select.appendChild(el);
    }



</script>