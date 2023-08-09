<!-- Dropdown menu -->
<div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
    <div class="block px-4 py-2 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
        Notifications
    </div>
    
    <div class="divide-y divide-gray-100 dark:divide-gray-700 " >
        
        @foreach ($logs as $log)
            <a href="{{ route('notifications-detail', $log->id) }}" 
            class="flex px-4 py-3 {{ old('read', $log->read) == 0 ? 'bg-sky-500/[.06]' : '' }}
            hover:bg-gray-100 
            dark:hover:bg-gray-700 ">
                <div class="w-full pl-3" >
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"> 
                        <span class="font-semibold text-gray-900 dark:text-white">
                            {{$log->nama}} ({{$log->PN}}) </span>telah {{$log->aksi}} {{$log->tabel_target}} atas nama <span class="font-semibold text-gray-900 dark:text-white">{{$log->nama_CPP}} ({{$log->potensial_kredit}})
                        </span>.
                    </div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">{{$log->created_at}}</div>
                </div>
            </a>
        @endforeach
        
    </div>
    <a href="{{ route('notifications-all') }}" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
        <div class="inline-flex items-center ">
            <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                View all
        </div>
    </a> 

</div>

<script>
    function mark_as_read($id)
    {
        $.ajax({
            url: "/mark_read",
            type: "GET",
            data: {id:$id},
            success: function(response){ // What to do if we succeed
                if(data == "success") alert(response); 
            },
            error: function(response){
                alert('Error'+response);
            }
        });
        
        alert('pass');
    }
</script>