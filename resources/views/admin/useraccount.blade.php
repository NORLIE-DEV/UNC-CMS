@include('partials.__header')

<x-messages />
<div class="flex flex-row">
    {{-- sidebar --}}
    {{-- left content --}}
    @include('components.sidebar')

    {{-- right content --}}
    <div class="w-10/12">
        {{-- navbar --}}
        @include('components.nav')

        <div class="flex justify-between p-2">
            <h1 class="text-gray-600 text-xl font-bold mt-4 mx-4">User Accounts</h1>
        </div>

        <div class="mt-10">
            <form action="">
                <div class="flex justify-around">
                    <div class="mx-6">
                        <label for="search_box">Search</label>
                        <input type="text" class="p-2 rounded-lg shadow-xl w-80 outline-none text-sm"
                            placeholder="Search" name="search_box" id="search_box">
                    </div>
                    <div class="mx-6">
                        <select name="sd" id="" class="p-2 rounded-lg shadow-xl w-80 text-sm">
                            <option value="Name">Sort By</option>
                            <option value="Name">Name</option>
                            <option value="Date">Date</option>
                        </select>
                    </div>
                    <button type="button" id="btn_addUser"
                        class=" mr-7 bg-blue-700 p-2 w-24 rounded-lg btnModalCreate"><i
                            class="fa-solid fa-user-plus text-white"></i><span
                            class="text-xs ml-1 text-white font-bold">Add
                            User</span></button>
                </div>
            </form>
        </div>
        <div class="w-11/12 text-sm m-auto my-5">
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="table-auto w-full text-left" id="tableUser">
                    <thead class="text-gray-200 uppercase bg-blue-500 font-bold">
                        <tr>
                            <td class="py-3  text-center  p-4">ID</td>
                            <td class="py-3  text-center  p-4">Firstname</td>
                            <td class="py-3  text-center  p-4">Lastname</td>
                            <td class="py-3  text-center  p-4">Email</td>
                            <td class="py-3  text-center  p-4">Gender</td>
                            <td class="py-3  text-center  p-4">BirthDate</td>
                            <td class="py-3  text-center  p-4">usertype</td>
                            <td class="py-3  text-center  p-4"></td>
                            <td class="py-3  text-center  p-4">operation</td>
                            <td class="py-3  text-center  p-4"></td>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-500">
                        @foreach ($users as $user)
                            <tr class="py-2">
                                <td class="py-2  text-center  p-4">{{ $user->id }}</td>
                                <td class="py-2  text-center  p-4">{{ $user->first_name }}</td>
                                <td class="py-2  text-center  p-4">{{ $user->last_name }}</td>
                                <td class="py-2  text-center  p-4">{{ $user->email }}</td>
                                @if ($user->gender == '0')
                                    <td class="py-2  text-center  p-4">Male</td>
                                @elseif ($user->gender == '1')
                                    <td class="py-2  text-center  p-4">Female</td>
                                @endif
                                <td class="py-2  text-center  p-4">{{ $user->birthdate }}</td>
                                @if ($user->usertype == '0')
                                    <td class="py-2  text-center  p-4">Doctor</td>
                                @elseif ($user->usertype == '1')
                                    <td class="py-2  text-center  p-4">Nurse</td>
                                @elseif ($user->usertype == '2')
                                    <td class="py-2  text-center  p-4">Admin</td>
                                @endif

                                <td class="py-2  text-center  p-4"><button id="btn_edit" value="{{ $user->id }}"><i
                                            class="fa-solid fa-pen-to-square text-green-500"></i></button></td>
                                <td class="py-2  text-center  p-4"><button id="btn_delete"
                                        value="{{ $user->id }}"><i
                                            class="fa-solid fa-user-xmark text-red-500"></i></button></td>
                                <td class="py-2  text-center  p-4"><a href="javascript:void(1)" id="view"
                                        data-url=""><i class="fa-solid fa-eye text-yellow-500"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="w-full flex justify-center mt-3">{{ $users->links() }}</div>
        </div>
    </div>
    @include('admin.modal.AddUserModal')
    @include('admin.modal.viewUser')
    @include('admin.modal.updateUseraccount')
    @include('admin.modal.UserDelete');


    <script>
        $(document).ready(function() {
            $("#btn_addUser").on("click", function() {
                $("#adduserModal").show();
            });
            // close adduseraccount modal
            $("#clickoverlay").on("click", function() {
                $("#adduserModal").hide();
            });

            $("#btn_closeAdduser").on("click", function() {
                $("#adduserModal").hide();
            });
            // open edit usermodal
            $(document).on("click", "#btn_edit", function(e) {
                e.preventDefault();
                const user_id = $(this).val();
                $("#UpdateuserModal").show();

                $.ajax({
                    method: "GET",
                    url: "/users-update/" + user_id,
                    success: function(response) {
                        //console.log(response);
                        if (response.status == 404) {
                            $("#success_message").html("");
                            $("#success_message").text(response.message);
                        } else {
                            $("#edit_id").val(response.data.id);
                            $("#edit_first_name").val(response.data.first_name);
                            $("#edit_last_name").val(response.data.last_name);
                            $("#edit_email").val(response.data.email);
                            $("#edit_email").prop("disabled", true);
                            $("#edit_gender").val(response.data.gender);
                            $("#edit_birthdate").val(response.data.birthdate);
                            $("#edit_usertype").val(response.data.usertype);
                            $("#edit_usertype").prop("disabled", true);
                        }
                    }
                })
            })
            // close update modal
            $("#clickoverlayUpdate").on("click", function() {
                $("#UpdateuserModal").hide();
            });

            $("#btn_closeUpdateUser").on("click", function() {
                $("#UpdateuserModal").hide();
            });
        });

        // delete user account
        $(document).on("click", "#btn_delete", function(e) {
            e.preventDefault();
            const user_id = $(this).val();
            $("#delete_id").val(user_id);
            $("#userDeleteModal").show();
        });
        // close update modal
        $("#clickoverlayUserDelete").on("click", function() {
            $("#userDeleteModal").hide();
        });
        $("#cancel").on("click", function() {
            $("#userDeleteModal").hide();
        });
        $("#btn_closeDeleteuser").on("click", function() {
            $("#userDeleteModal").hide();
        });


        // search
        $('#search_box').keyup(function() {
            const search_value = $(this).val();
            $.ajax({
                method: "GET",
                url: "/user-search",
                data: {
                    'search': search_value,
                },
                success: function(response) {
                    //alert(2);
                    //console.log(response);
                    $("#tableUser").html(response);
                }
            });
        });
    </script>

    <script src="{{ asset('assets/js/admin_js/useraccount.js') }}"></script>
    <script src="{{ asset('/assets/js/login.js') }}"></script>


    @include('partials.__footer')
