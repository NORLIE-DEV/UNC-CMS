@include('partials.__header')

<div class="flex flex-row">
    <!-- left content -->
    <div class="bg-white h-screen w-60 shadow-2xl">
      <h1 class=" font-black text-2xl text-center p-5 text-gray-700 mt-6"><span class="p-1"><i class="fa-solid fa-hospital"></span></i>UNC-CMS</h1>
      <hr>
       <div class="p-7">
        <ul class="p-2 leading-loose">

            <li class="p-2 bg-slate-800 text-white rounded-lg font-bold"><span class="px-3"><i class="fa-brands fa-dropbox"></i></span>Overview </a></li>
            <li class="p-2 mt-4"><a href="#"><span class="px-3"><i class="fa-solid fa-user"></i></span> Student</a></li>
            <li class="p-2 mt-4"><a href="#"><span class="px-3"><i class="fa-solid fa-person-digging"></i></span>Employee</a></li>
            <li class="p-2 mt-4"><a href="#"><span class="px-3"><i class="fa-solid fa-users"></i></span>User Account</a></li>
            <li class="p-2 mt-4"><a href="#"><span class="px-3"><i class="fa-solid fa-gear"></i></span>Setting</a></li>
            {{-- <li class="p-2 mt-4"><a href="#"><span class="px-3"><i class="fa-solid fa-right-from-bracket"></i></span>Sign out</a></li> --}}
             <form action="/admin/logout" method="POST">
                @csrf
                <button type="submit" class="p-2 mt-4"><span class="px-3"><i class="fa-solid fa-right-from-bracket"></span></i>Sign out</button>
             </form>
        </ul>
       </div>
    </div>
    <!-- right content -->
    <div class="w-10/12">
      <nav class="p-5 grid grid-cols-3 place-items-center">
        {{-- Username Name --}}
        <div class="w-80 ">
            <h1 class="font-bold text-2xl"><span class="mx-1 font-bold text-2xl">Hello</span>{{auth()->user()->name}}👋</h1>
            <p class="text-gray-400 text-xs mx-1 mt-2">Lorem ipsum dolor sit amet consectetur!</p>
        </div>

        {{-- Search --}}
        <div class="w-96 flex items-center">
            <input type="text" class="p-2 w-full  border-2 rounded-lg outline-none text-sm text-gray-500" placeholder="Search here..">
            <form action="">
                <button type="submit" class="bg-blue-500 p-2 mx-2 w-10 rounded-lg"><span><i class="fa-solid fa-magnifying-glass text-white"></span></i></button>
            </form>
        </div>

        {{-- profile image --}}
        <div class="w-32 flex items-center ml-16 justify-center p-2 rounded-lg">
            <img src="{{asset('/assets/img/72793650_623034394895427_3607026836418068480_n.jpg')}}" alt="" class="w-10 h-10 rounded-2xl border-2 border-gray-800">
            <h4 class="mx-2 font-bold text-gray-800">Admin</h4>
        </div>
      </nav>
      <hr>
      {{-- Content --}}
      <h3 class="mx-3 p-2 text-gray-500 font-bold">Student</h3>
      <section class="grid grid-cols-4 place-items-center p-2">
        <div class="w-60 h-36 bg-blue-400 rounded-lg shadow-2xl">
         <h4 class="text-white font-bold p-4">Kinder Student</h4>
         <div class="p-1 ml-3 flex justify-between">
            <i class="fa-solid fa-school fa-xl text-white"></i>
            <h1 class="p-1 mr-5 text-white font-black text-4xl">65</h1>
         </div>
         <div class="flex justify-between p-1">
            <h5 class="text-white ml-2 font-bold">Male : <span>65</span></h5>
            <h5 class="text-white mr-2 font-bold">Female : <span>65</span></h5>
         </div>
        </div>

        <div class="w-60 h-36 bg-teal-400 rounded-lg shadow-2xl">
            <h4 class="text-white font-bold p-4">Elementary Student</h4>
         <div class="p-1 ml-3 flex justify-between">
            <i class="fa-solid fa-school fa-xl text-white"></i>
            <h1 class="p-1 mr-5 text-white font-black text-4xl">65</h1>
         </div>
         <div class="flex justify-between p-1">
            <h5 class="text-white ml-2 font-bold">Male : <span>65</span></h5>
            <h5 class="text-white mr-2 font-bold">Female : <span>65</span></h5>
         </div>
        </div>

        <div class="w-60 h-36 bg-orange-300 rounded-lg shadow-2xl">
            <h4 class="text-white font-bold p-4">High school Student</h4>
            <div class="p-1 ml-3 flex justify-between">
               <i class="fa-solid fa-school fa-xl text-white"></i>
               <h1 class="p-1 mr-5 text-white font-black text-4xl">65</h1>
            </div>
            <div class="flex justify-between p-1">
               <h5 class="text-white ml-2 font-bold">Male : <span>65</span></h5>
               <h5 class="text-white mr-2 font-bold">Female : <span>65</span></h5>
            </div>
        </div>

        <div class="w-60 h-36 bg-red-400 rounded-lg shadow-2xl">
            <h4 class="text-white font-bold p-4">College Student</h4>
            <div class="p-1 ml-3 flex justify-between">
               <i class="fa-solid fa-school fa-xl text-white"></i>
               <h1 class="p-1 mr-5 text-white font-black text-4xl">65</h1>
            </div>
            <div class="flex justify-between p-1">
               <h5 class="text-white ml-2 font-bold">Male : <span>65</span></h5>
               <h5 class="text-white mr-2 font-bold">Female : <span>65</span></h5>
            </div>
        </div>
    </section>
    <h3 class="mx-3 p-2 text-gray-500 font-bold">College Departments</h3>
    <section class="grid grid-cols-4 place-items-center p-2 gap-y-3">
        <div class="w-60 h-28 bg-violet-400 rounded-lg shadow-2xl">
            <h4 class="text-white font-bold p-2">College Of Engineering And Architecture.</h4>
            <div class="p-1 ml-1 flex justify-between">
                <i class="fa-solid fa-school fa-xl text-white"></i>
                <h1 class=" mr-5 text-white font-black text-4xl">65</h1>
             </div>
        </div>

        <div class="w-60 h-36 bg-sky-300 rounded-lg shadow-2xl">
            <h3>Elementary</h3>
        </div>

        <div class="w-60 h-28 bg-rose-300 rounded-lg shadow-2xl">
            <h3>Elementary</h3>
        </div>

        <div class="w-60 h-28 bg-yellow-200 rounded-lg shadow-2xl">
            <h3>Elementary</h3>
        </div>

        <div class="w-60 h-28 bg-sky-300 rounded-lg shadow-2xl">
            <h3>Elementary</h3>
        </div>

        <div class="w-60 h-28 bg-rose-300 rounded-lg shadow-2xl">
            <h3>Elementary</h3>
        </div>

        <div class="w-60 h-28 bg-yellow-200 rounded-lg shadow-2xl ">
            <h3>Elementary</h3>
        </div>
    </section>
</div>
@include('partials.__footer')
