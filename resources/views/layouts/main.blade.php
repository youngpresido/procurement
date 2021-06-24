<x-app-layout>
    <div class="flex">
        <div class="w-46 h-screen">


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex">
                    <div class="w-64 h-screen">sidebar</div>
                    <div class="w-full flex flex-col">content</div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="flex flex-col w-46 h-screen px-4 py-8 bg-white border-r dark:bg-gray-800 dark:border-gray-600">



        <div class="flex flex-col justify-between flex-1 mt-6">
            <livewire:navbar />

            <div class="flex items-center px-4 -mx-2">
                <img class="object-cover mx-2 rounded-full h-9 w-9" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar"/>
                <h4 class="mx-2 font-medium text-gray-800 dark:text-gray-200 hover:underline">John Doe</h4>
            </div>

        </div>

    </div>
        </div>
        <div class="w-full p-2">
            @yield('content')
        </div>
    </div>

</x-app-layout>
@include('sweetalert::alert')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    window.addEventListener('swal:modal',event=>{
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });

    window.addEventListener('swal:confirm',event=>{
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            dangerMode: true
        }).then((willDelete)=>{
            if(willDelete){
                window.livewire.emit('delete', event.detail.id);
            }
        });
    });
</script>
