<nav class="flex items-center overflow-hidden h-20 justify-between bg-white m-auto shadow-xl shadow-b sticky top-0 -z-1"
    style="width: 100%;">
    <div>
        {{-- name --}}
        <h1 class="text-lg font-bold text-blue-700 mx-8"><span class="mx-2"><i
                    class="fa-solid fa-chart-line"></i></span>Admin Dashboard</h1>
        <p class="mx-10 text-xs text-blue-400">Lorem ipsum dolor sit amet.</p>
    </div>
    <div class="flex items-center">
        <div class="mx-2">
            @if (auth()->user()->usertype == '2')
            <span class="mx-2">
                <h1 class=" text-blue-500 font-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                </h1>
                <p class="text-xs p-1 bg-blue-600 text-white text-center rounded-lg w-20 mx-4 font-bold">Admin</p>
            </span>

            @endif

        </div>
        <img src="{{ asset('storage/user/thumbnail/'.auth()->user()->user_image) }}" class="w-10 h-10 mr-7"
            alt="" style="border: 1px solid  rgb(0, 132, 255);">
    </div>
</nav>
