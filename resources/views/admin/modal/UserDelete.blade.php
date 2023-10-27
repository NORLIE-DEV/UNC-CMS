<div class="fixed z-50 inset-0 hidden" id="userDeleteModal">
    <div class="fixed inset-0 bg-gray-500 opacity-40" id="clickoverlayUserDelete"></div>
    <div class="bg-white rounded m-auto fixed inset-0" style="max-height:300px; width:500px">
        <button class="bg-gray-200 p-2 mr-3 w-10 rounded-sm text-gray-500 font-bold float-right my-3"
            id="btn_closeDeleteuser">X</button>

        <input type="hidden" id="delete_id">
        <h1 class="text-center m-16 text-2xl font-bold">Are you sure? you want to delete this data?</h1>
        <div class="flex justify-center">
            <button class="p-2 bg-gray-700 m-2 w-36 text-white rounded-lg" id="cancel">Cancel</button>
            <button class="p-2 bg-red-400 m-2 w-36 text-white rounded-lg hover:bg-red-500" id="delete">Yes
                Delete</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $(document).on("click", '#delete', function(e) {
            e.preventDefault();

            var user_id = $('#delete_id').val();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $.ajax({
                type: "DELETE",
                url: "/delete-user/" + user_id,
                success: function(response) {
                    setTimeout(function() {
                        $("#userDeleteModal").hide();
                        location.reload();
                    }, 100);
                }

            });
        })

    });
</script>
