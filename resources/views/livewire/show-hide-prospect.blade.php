
    <tr class="border-b">
        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            ID Prospek
        </th>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
            {{ $progress->prospect_id }}
            <button type="button" wire:click="toggle('{{$showDiv}}')" class="bg-white hover:bg-blue-100 text-gray border border-black py- px-4 rounded-full">
                
                <a href="{{ route('prospect.show', $progress->prospect_id) }}">Show</a>
            </button>
        </td>
    </tr>

    @if ( $showDiv )
    <tbody>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama CPP
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->nama_CPP }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Jenis Usaha
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->jenis_usaha }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Alamat Usaha
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->alamat_usaha }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Sumber Pipeline
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->sumber_pipeline }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fasilitas
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->fasilitas }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Segmen Kredit
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->segmen_kredit }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Potensi Kredit (juta)
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->potensial_kredit }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Segmen
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->segmen }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status Prospek
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                {{ $progress->status_prospek }}
            </td>
        </tr>
        <tr class="border-b">
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Approval
            </th> 
            @if ($progress->status_approval) 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    Disetujui
                </td>
            @else 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                    -
                </td>
            @endif
            
        </tr>
    </tbody>
    @endif


