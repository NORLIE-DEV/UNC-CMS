<div class="w-60 shadow-2xl h-screen sticky top-0 bg-blue-500">
    <h1 class=" font-black text-2xl text-center p-5 text-white mt-6"><span class="p-1"><i
                class="fa-solid fa-staff-snake text-white"></span></i>UNC-CMS</h1>
    <div class="p-7">
        <ul class="p-2 leading-loose">

            <li class="p-2 bg-blue-900 text-white rounded-lg font-bold"><a href="/admin/home"><span class="px-3"><i
                            class="fa-brands fa-dropbox"></i></span>Overview</a></li>
            <li class="p-2 mt-4 text-white"><a href="/admin/student"><span class="px-3"><i class="fa-solid fa-user"></i></span>
                    Student</a></li>
            <li class="p-2 mt-4 text-white"><a href="#"><span class="px-3"><i
                            class="fa-solid fa-person-digging"></i></span>Employee</a></li>
            <li class="p-2 mt-4 text-white"><a href="/admin/account"><span class="px-3"><i
                            class="fa-solid fa-users"></i></span>User Account</a></li>
            <li class="p-2 mt-4 text-white"><a href="#"><span class="px-3"><i
                            class="fa-solid fa-gear"></i></span>Setting</a></li>
            <button x-data x-on:click="$dispatch('open-signout')" type="submit" class="p-2 mt-4 text-white mx-1"><span
                    class="px-3 text-white "><i class="fa-solid fa-right-from-bracket text-white"></span></i>Sign out</button>
            <x-signoutModal></x-signoutModal>
        </ul>
    </div>
</div>
