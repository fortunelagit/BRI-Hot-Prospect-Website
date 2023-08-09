<div class="px-4 py-5 bg-white sm:p-6">
    <label for="sector" class="block font-medium text-sm text-gray-700" >Sektor Industri</label>
    <select  id="sector-dd" style="width:400px"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Sector</option>
                            @foreach ($sectors as $data)
                            <option value="{{$data->id}}">
                                {{$data->industrial_sector}}
                            </option>
                            @endforeach
                        </select>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <label for="subsector" class="block font-medium text-sm text-gray-700">Sub Sektor Industri</label>
    <select id="subsector-dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <label for="definisi" class="block font-medium text-sm text-gray-700">Definisi</label>
    <select id="definition-dd" name="sektor_industri" class="break-normal normal-case bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>
    <p id="display-definition"></p>
</div>

<div class="px-4 py-5 bg-white sm:p-6">
    <div class="flex">
        <div class="flex-1">
            <label class="block font-medium text-sm text-gray-700">Warna LPG</label>
            <input id="warna_lpg_input" style="width:100px" type="text" disabled class=" form-input rounded-md shadow-sm mt-1 block w-full"/>
        </div>
        <div class="flex-1">
            <label class="block font-medium text-sm text-gray-700">%MS</label>
            <input  id="persen_MS_input" style="width:100px" type="text" disabled class="bg-gray-50 form-input rounded-md shadow-sm mt-1 block w-full"/>
        </div>
        <div class="flex-1">
            <label class="block font-medium text-sm text-gray-700">%DPK</label>
            <input  id="persen_DPK_input" style="width:100px" type="text" disabled class="bg-gray-50 form-input rounded-md shadow-sm mt-1 block w-full"/>
        </div>
        <div class="flex-1">
            <label class="block font-medium text-sm text-gray-700">%NPL</label>
            <input Id="persen_NPL_input" style="width:100px" type="text" disabled class="bg-gray-50 form-input rounded-md shadow-sm mt-1 block w-full"/>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#definition-dd').change(function () {
            $('#display-definition').html($('#definition-dd :selected').text());
        });
        $('#sector-dd').on('change', function () {
            var idSector = this.value;
            $("#subsector-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-subsector')}}",
                type: "POST",
                data: {
                    sector_id: idSector,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#subsector-dd').html('<option value="">Select Sub Sector</option>');
                    $.each($(result['sub-sectors']), function (key, value) {
                        $("#subsector-dd").append('<option value="' + value.id + '">' + value.industrial_sub_sector + '</option>');});
                    $('#definition-dd').html('<option value="">Select Definition</option>');
                }
            });
        });
        $('#subsector-dd').on('change', function () {
            var idSubSector = this.value;
            $("#definition-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-definition')}}",
                type: "POST",
                data: {
                    sub_sector_id: idSubSector,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#definition-dd').html('<option value="">Select Definition</option>');
                    $.each($(res['definitions']), function (key, value) {
                        $("#definition-dd").append('<option value="' + value.industrial_code + '">' + value.industrial_code + " - " + value.industrial_definition + '</option>');
                    });

                }
            });

            
        });
        $('#definition-dd').on('change', function () {
            var indCode = this.value;
            //$("#definition-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-lpg')}}",
                type: "POST",
                data: {
                    sektor_industri: indCode,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $.each($(res['lpgs']), function (key, values) {
                        document.getElementById("warna_lpg_input").value = values.warna_lpg;
                        document.getElementById("persen_MS_input").value = values.persen_MS + ' %';
                        document.getElementById("persen_DPK_input").value = values.persen_DPK + ' %';
                        document.getElementById("persen_NPL_input").value = values.persen_NPL + ' %';
                        //document.getElementById("warna_lpg_input").class = values.color;
                        $('#warna_lpg_input').addClass(values.color);
                    });
                }
            });
        });
    });
</script>

<style>

</style>