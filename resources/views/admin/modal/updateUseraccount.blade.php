<div class="fixed z-50 inset-0 hidden" id="UpdateuserModal">
    <div class="fixed inset-0 bg-gray-500 opacity-40" id="clickoverlayUpdate"></div>
    <div class="bg-white rounded m-auto fixed inset-0" style="max-height:500px; width:600px">
        <button class="bg-gray-200 p-2 mr-3 w-10 rounded-sm text-gray-500 font-bold float-right my-3"
            id="btn_closeUpdateUser">X</button>

        <div class="p-4">
            <div class="error" id="success_message">
            </div>
            <form action="/update-user/{{ $user->id }}" id="UserFormUpdate" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <h1 class="text-xl font-bold ml-5 mt-6">Update User Account <i class="fa-solid fa-users-gear"></i></h1>
                <p class="text-sm ml-5 text-gray-400">Please edit information below!</p>
                <input type="hidden" name="" id="edit_id">
                <div class="flex justify-between ml-5 mr-5 mt-10 -mb-3">
                    <div>
                        <label for="first_name">First Name</label><br>
                        <input type="text" name="first_name" id="edit_first_name"
                            class="w-64 p-2 rounded-lg outline-none text-sm" style="border:1px solid gray"
                            placeholder="First Name" required>
                    </div>
                    <div>
                        <label for="last_name">Last Name</label><br>
                        <input type="text" name="last_name" id="edit_last_name"
                            class="w-64 p-2 rounded-lg outline-none text-sm"
                            style="border:1px solid gray"placeholder="Last Name" required>
                    </div>
                </div>

                <div class="ml-5 mr-5 mt-5 -mb-3">
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="edit_email"
                            class="w-full p-2 rounded-lg outline-none text-sm"
                            style="border:1px solid gray"placeholder="Email" required>
                        <span id="error_email"></span>
                    </div>
                </div>
                <div class="ml-5 mt-3 text-xs text-red-500">
                    <span id="password-error"></span>
                </div>
                <div class="ml-5 mr-5 mt-5 -mb-3 flex justify-between">
                    <div>
                        <label for="gender">Gender</label><br>
                        <select name="gender" id="edit_gender" class="w-64 p-2 rounded-lg text-sm"
                            style="border: 1px solid gray">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="birthdate">Birth Date</label><br>
                        <input type="text" name="birthdate" id="edit_birthdate"
                            class="w-64 p-2 rounded-lg text-sm"style="border: 1px solid gray" placeholder="Birthdate"
                            required>
                    </div>
                </div>
                <div class="ml-5 mr-5 mt-5 -mb-3">
                    <div>
                        <label for="usertype">Role</label><br>
                        <select name="usertype" id="edit_usertype" class="w-full p-2 rounded-lg text-sm"
                            style="border: 1px solid gray">
                            <option value="0">Doctor</option>
                            <option value="1">Nurse</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="m-5">
                    <div class="mt-10">
                        <button id="update"
                            class="w-full outline-none bg-blue-500 text-sm p-3 text-white rounded-lg font-bold hover:bg-blue-700">UPDATE
                            USER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#edit_birthdate").datepicker({
        dateFormat: "yy-mm-dd", // Change the format as needed
    });
    $(document).on('click', '#update', function(e) {
        e.preventDefault();
        var user_id = $("#edit_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const data = {
            'first_name': $('#edit_first_name').val(),
            'last_name': $('#edit_last_name').val(),
            'gender': $('#edit_gender').val(),
            'birthdate': $('#edit_birthdate').val(),

        }

        $.ajax({
            type: "PUT",
            url: "/update-user/" + user_id,
            data: data,
            dataType: "json",
            success: function(response) {
                setTimeout(function() {
                    $("#UpdateuserModal").hide();
                    location.reload();
                }, 100);
            },
            error(error) {
                alert(error.message);
            }
        });
    });
</script>
