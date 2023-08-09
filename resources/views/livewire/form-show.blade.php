<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Unit Kerja
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->unit }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Kantor Cabang
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->branch }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        PN
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->PN }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        RM
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->nama}}
    </td>
</tr><tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        ID Prospect
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->prospect_id }}
        <button type="button"  class="bg-white hover:bg-blue-100 text-gray border border-black py- px-4 rounded-full">
            
            <a href="{{ route('prospect.show', $item->prospect_id) }}">Show</a>
        </button>
    </td>
</tr>
<!-- <tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Nama CPP
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->nama_CPP }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Jenis Usaha
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->jenis_usaha }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Alamat Usaha
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->alamat_usaha }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Sumber Pipeline
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->sumber_pipeline }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Fasilitas
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->fasilitas }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Segmen Kredit
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->segmen_kredit }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Potensi Kredit (juta)
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->potensial_kredit }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Segmen
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->segmen }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Status Prospek
    </th>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
        {{ $item->status_prospek }}
    </td>
</tr>
<tr class="border-b">
    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
        Approval
    </th> 
    @if ($item->status_approval) 
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
            Disetujui
        </td>
    @else 
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
            -
        </td>
    @endif
    
</tr>
 -->