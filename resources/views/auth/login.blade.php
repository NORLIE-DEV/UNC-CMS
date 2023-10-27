@include('partials.__header')
<section class="w-full bg-blue-500"
    style="height: 50vh; background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(118,184,236,1) 0%, rgba(73,114,255,1) 100%);">
    <div class="flex flex-row z-10">
        {{-- left --}}
        <div class="w-1/2  bg-blue-500"
            style="border-radius: 0 0 60px 0; background: linear-gradient(180deg, rgba(2,0,36,1) 0%, rgba(118,184,236,1) 0%, rgba(73,114,255,1) 100%);">
            <div class="absolute p-3 m-5">
                <span class="font-bold text-lg text-white "><i
                        class="fa-solid fa-staff-snake fa-2xl text-white mx-2"></i>UNC-CMS</span>

               <div class="mt-5 flex">
                <img src="https://upload.wikimedia.org/wikipedia/en/d/d1/Seal_of_University_of_Nueva_Caceres.png" alt="" class="w-14 h-14 mx-3">
                <img src="{{asset('assets/img/79794414_111016303724059_5940762222245445632_n-800x800.png')}}" alt="" class="w-14 h-14">
            </div>
            </div>
            <div class="flex flex-col justify-center items-center h-screen">
                <img src="{{ asset('assets/img/image_2023-10-15_094708761-removebg-preview.png') }}" alt="hero"
                    style="width: 500px;">
                    <p class="mt-16 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <div>

                    </div>
            </div>

        </div>
        {{-- right --}}
        <div class="w-1/2 h-screen shadow-lg rounded-l-3xl shadow-l-lg z-5"
            style="background-color:#F2F6FF;  border-radius: 70px 0 0 0">
            <div class=" m-auto" style="width: 430px; height:550px">
                <div class="flex justify-center mt-16">
                    <img class="w-12 h-12 mr-2"
                        src="https://img.freepik.com/free-vector/sentiment-analysis-concept-illustration_114360-5182.jpg?w=740&t=st=1697327328~exp=1697327928~hmac=b7f84678410748aead0a1e5bd15893a313de0ee11c76e25610e672f3caae2529"
                        alt="logo">
                </div>
                <h1 class="text-2xl font-bold text-center p-2 mt-2 ">Sign in to your account</h1>
                <p class="text-center text-xs text-gray-500 p-2">Lorem ipsum dolor sit amet consectetur adipisicing.</p>

                @error('error_message')
                    <div class="mx-10 p-3 mt-3 bg-red-300 border-l-2 border-red-600">
                        <p class="text-xs text-gray-800">{{ $message }}</p>
                    </div>
                @enderror
                <form action="/login/process" method="POST">
                    @csrf
                    <div class="mx-10 p-2 mt-3">
                        <label for="usertype" class="text-xs font-bold text-gray-500">Login As</label><br>
                        <select name="usertype" id="#"
                            class="w-full border-2 border-gray-200 bg-white rounded mt-2 p-2 px-3 text-sm outline-none"
                            style="border:1px">
                            <option value="0">Doctor</option>
                            <option value="1">Nurse</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="mx-10 px-2">
                        <label for="email" class="text-xs font-bold text-gray-500">Email</label>
                        <div class="mb-1"><i class="fa-solid fa-user fa-sm mt-6 absolute text-gray-400"
                                style="margin-left: 310px;"></i></div>
                        <input type="email" name="email" id="email"
                            class="w-full p-2 px-3 outline-none text-sm text-gray-600 bg-white rounded"
                            placeholder="Email" required>
                    </div>

                    <div class="mx-10 px-2 mt-2">
                        <label for="password" class="text-xs font-bold text-gray-500">Password</label>
                        <div class="mb-1"><i class="fa-solid fa-eye-slash fa-sm mt-6 absolute text-gray-400"
                                id="togglePassword" style="margin-left: 305px;"></i></div>
                        <input type="password" id="password" name="password"
                            class="w-full p-2 px-3 bg-white outline-none text-sm rounded" placeholder="Password"
                            required>
                    </div>

                    <div class="mx-10 px-2 mt-10">
                        <button type="submit" class="w-full bg-blue-500 mt-2 p-2 text-white rounded-lg hover:bg-blue-600">Login</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>
<script src="{{ asset('/assets/js/login.js') }}"></script>
@include('partials.__footer')
