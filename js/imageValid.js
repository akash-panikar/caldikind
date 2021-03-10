<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function () {
        readURL(this);
    });

    function imageValidation(id) {
        var formData = new FormData();
        var file = document.getElementById(id).files[0];
        formData.append("filedata", file);
        var fileType = file.type.split('/').pop().toLowerCase();
        if (fileType != "jpeg" && fileType != "jpg" && fileType != "png") {
            $.bootstrapGrowl("Invalid file type please select jpg, jpeg or png", {
                ele: 'body', // which element to append to
                type: 'danger', // (null, 'info', 'danger', 'success')
                offset: {from: 'top', amount: 650}, // 'top', or 'bottom'
                align: 'right', // ('left', 'right', or 'center')
                width: 400, // (integer, or 'auto')
                delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                allow_dismiss: true, // If true then will display a cross to close the popup.
                stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
            document.getElementById(id).value = '';
        }
        if (file.size > 1048576) {
            $.bootstrapGrowl("File size cannot be more than  1 MB", {
                ele: 'body', // which element to append to
                type: 'danger', // (null, 'info', 'danger', 'success')
                offset: {from: 'top', amount: 650}, // 'top', or 'bottom'
                align: 'right', // ('left', 'right', or 'center')
                width: 400, // (integer, or 'auto')
                delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
                allow_dismiss: true, // If true then will display a cross to close the popup.
                stackup_spacing: 10 // spacing between consecutively stacked growls.
            });
            document.getElementById(id).value = '';
            return false;
        }
    }
</script>