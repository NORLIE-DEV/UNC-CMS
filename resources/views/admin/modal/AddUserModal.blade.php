<div class="fixed z-50 inset-0 hidden" id="adduserModal">
    <div class="fixed inset-0 bg-gray-500 opacity-40" id="clickoverlay"></div>
    <div class="bg-white rounded m-auto fixed inset-0" style="max-height:700px; width:600px">
        <button class="bg-gray-200 p-2 mr-3 w-10 rounded-sm text-gray-500 font-bold float-right my-3"
            id="btn_closeAdduser">X</button>

        <div class="p-4">
            <div class="error" id="email-validation">
            </div>
            <form id="UserForm" method="POST" action="/store" enctype="multipart/form-data">
                @csrf
                <h1 class="text-xl font-bold ml-5 mt-6">User Account <i class="fa-solid fa-users-gear"></i></h1>
                <p class="text-sm ml-5 text-gray-400">Please fill all information below!</p>
                <div class="flex justify-between ml-5 mr-5 mt-10 -mb-3">
                    <div>
                        <label for="first_name">First Name</label><br>
                        <input type="text" name="first_name" id="first_name"
                            class="w-64 p-2 rounded-lg outline-none text-sm" style="border:1px solid gray"
                            placeholder="First Name" required>
                    </div>
                    <div>
                        <label for="last_name">Last Name</label><br>
                        <input type="text" name="last_name" id="last_name"
                            class="w-64 p-2 rounded-lg outline-none text-sm"
                            style="border:1px solid gray"placeholder="Last Name" required>
                    </div>
                </div>

                <div class="ml-5 mr-5 mt-5 -mb-3">
                    <div>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email"
                            class="w-full p-2 rounded-lg outline-none text-sm"
                            style="border:1px solid gray"placeholder="Email" required>
                        <span id="error_email"></span>
                    </div>
                </div>
                <div class="ml-5 mr-5 mt-5 -mb-3 flex justify-between">
                    <div>
                        <label for="password">Password</label><br>
                        <div class="mb-1"><i class="fa-solid fa-eye-slash fa-sm mt-6 absolute text-gray-400"
                                id="togglePassword" style="margin-left: 230px;"></i></div>
                        <input type="password" id="password" name="password"
                            class="w-64 p-2 rounded-lg outline-none text-sm"
                            placeholder="Password"style="border: 1px solid gray" required>
                    </div>

                    <div>
                        <label for="password_confirmation">Confirm Password</label><br>
                        <div class="mb-1"><i class="fa-solid fa-eye-slash fa-sm mt-6 absolute text-gray-400"
                                id="togglePasswordConfirm" style="margin-left: 230px;"></i></div>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-64 p-2 rounded-lg outline-none text-sm"
                            placeholder="Confirm Password"style="border: 1px solid gray" required>
                    </div>
                </div>
                <div class="ml-5 mt-3 text-xs text-red-500">
                    <span id="password-error"></span>
                </div>
                <div class="ml-5 mr-5 mt-5 -mb-3 flex justify-between">
                    <div>
                        <label for="gender">Gender</label><br>
                        <select name="gender" id="gender" class="w-64 p-2 rounded-lg text-sm"
                            style="border: 1px solid gray">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="birthdate">Birth Date</label><br>
                        <input type="text" name="birthdate" id="birthdate"
                            class="w-64 p-2 rounded-lg text-sm"style="border: 1px solid gray" placeholder="Birthdate"
                            required>
                    </div>
                </div>
                <div class="ml-5 mr-5 mt-5 -mb-3">
                    <div>
                        <label for="usertype">Role</label><br>
                        <select name="usertype" id="usertype" class="w-full p-2 rounded-lg text-sm"
                            style="border: 1px solid gray">
                            <option value="0">Doctor</option>
                            <option value="1">Nurse</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="m-5">
                    <div>
                        <label for="user_image">User Image</label><br>
                        <input type="file" name="user_image" id="user_image"
                            class="w-full p-2 rounded-lg outline-none text-sm" style="border:1px solid gray">
                    </div>
                </div>

                <div class="m-5">
                    <div class="mt-10">
                        <button id="submit"
                            class="w-full outline-none bg-blue-500 text-sm p-3 text-white rounded-lg font-bold hover:bg-blue-700">ADD
                            USER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $("#birthdate").datepicker({
        dateFormat: "yy-mm-dd", // Change the format as needed
        // Add more options as needed
    });

    $(document).ready(function() {
        $('#email').blur(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            var error_email = '';
            var email = $('#email').val();

            //console.log(email);
            $.ajax({
                url: "{{ route('email_available.check') }}",
                method: "POST",
                data: {
                    email: email
                },
                success: function(result) {
                    if (result == 'unique') {
                        $('#error_email').html(
                            '<label class="text-green-500 text-xs">Email Available</label>'
                        );
                        $('#email').removeClass('has-error');
                        $('#submit').attr('disabled', false);
                    } else {
                        $('#error_email').html(
                            '<label class="text-red-500 text-xs">Email not Available</label>'
                        );
                        $('#email').addClass('has-error');
                        $('#submit').attr('disabled', 'disabled');
                    }
                }
            })

        });
        $("#UserForm").submit(function(e) {
            e.preventDefault();

            var password = $('#password').val();
            const passwordLength = password.length;
            var passwordConfirmation = $('#password_confirmation').val();

            if (password !== passwordConfirmation) {
                $('#password-error').text('Passwords do not match');
                $('#password-error').show();
                return; // Prevent the form from submitting
            }else if(passwordLength<6){
                $('#password-error').text('Passwords contains atleast 6 characters');
                $('#password-error').show();
                return; // Prevent the form from submitting
            }
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            var formData = new FormData(this);

            //console.log(formData);
            $.ajax({
                type: "POST",
                url: "{{ route('store.data') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response here
                    setTimeout(function() {
                        $("#adduserModal").hide();
                        location.reload();
                    }, 1000);
                },
                error: function(xhr) {
                    var errorMessage = xhr.responseText;
                    // console.log(errorMessage); // Log the error message
                    alert(errorMessage); // Display the error message
                }
            });
        });
    });
</script>
