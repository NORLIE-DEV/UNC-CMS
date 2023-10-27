<div x-data="{show : false }" x-show="show" x-on:open-signout.window="show=true" x-on:close-signout.window="show=false"
    x-on:keydown.escape.window="show-false" style="display:none;" x-transition. class="fixed z-100 inset-0">
    <div x-on:click="show = false" class="z-100 bg-gray-500 opacity-40 "></div>
    <div class= "rounded m-auto fixed inset-0 shadow-2xl" style="max-height:250px; width:400px;background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(118,184,236,1) 0%, rgba(73,114,255,1) 100%);">
        <div class="p-5">
           <h1 class="text-center"><i class="fa-solid fa-triangle-exclamation fa-2xl text-white"></i></h1>
            <h1 class="text-center font-bold text-2xl text-white mt-5">Are you sure, <br> you want to logout?</h1>
        </div>
        <div class="flex justify-between p-4">
            <button
                x-on:click="$dispatch('close-signout')"class=" text-white p-2 w-28 rounded-lg font-bold ml-12 border-2 border-white">Cancel</button>
            <form action="/admin/logout" method="POST">
                @csrf
                <button type="submit" class="bg-white text-blue-500 p-2 w-28 rounded-lg font-bold mr-12 border-2 border-white">Logout</button>
            </form>
        </div>
    </div>
</div>
