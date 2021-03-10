<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
$defaultImage = "images/people/6.png";
?>

<div id="main-wrapper">
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item">Client</li>
                        <li class="breadcrumb-item active">Add Client</li>
                    </ol>
                </div>
            </div>
            <div>
                
                <div>
                    <div class="card">
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="gymTest.php">Gym Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientPaymentTest.php">Payment Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientSummary.php">Summary</a>
                        </li>
                    </ul>
                        <div class="card-body" data-spy="scroll">
                            <form action="gymTest.php" method="POST" id="staff-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-5">
                                        <center class="m-t-10">
                                            <img src="<?= 'images/' . $result['profilePicture']; ?>" class="img-circle"width="150px" id="profile-img-tag"/>
                                            <input class="input-img form-control m-t-40" id="profile-img" type="file" name="profilePic" onchange="imageValidation('profile-img')">
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
                                        </center>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Fullname<span style="color:red">*</span></label>
                                            <input type="text" name="sfname" class="form-control" required >
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Contact Number<span style="color:red">*</span></label>
                                                <input type="text" name="sprimaryno" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alternate Number</label>
                                                <input type="text" name="salternateno" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail<span style="color:red">*</span></label>
                                            <input type="text" name="semail" class="form-control" required>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label>Address 1<span style="color:red">*</span></label>
                                    <input type="text" name="saddr1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" name="saddr2" class="form-control">
                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-4">
                                        <label >City<span style="color:red">*</span></label>
                                        <input type="text" name="scity" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >District<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Pincode<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" required>
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label>Date of Birth<span style="color:red">*</span></label>
                                        <input type="date" name="sDOB" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Gender<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="sgender">
                                            <option selected disabled>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label > Photo ID Proof<span style="color:red">*</span></label>
                                        <input type="file" name="idproof" class="form-control" required id="idproof" onchange="imageValidation('idproof')">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" value="YES">
                                        <label class="form-check-label" for="status">
                                            Create Account<span>  (Optional)</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Next</button>
                            </form>
                        </div>
                    </div>
                    <!-- Row -->
                    <!-- End PAge Content -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>