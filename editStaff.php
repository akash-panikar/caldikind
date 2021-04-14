<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
$rowID = $_GET['id'];
$searchQuery = "SELECT * from gymstaff WHERE sID=$rowID";
$execQuery = mysqli_query($connect, $searchQuery);
$result = mysqli_fetch_assoc($execQuery);
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
                        <li class="breadcrumb-item ">Staff</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                        <div class="card-body" data-spy="scroll">
                            <form action="process/staffProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-5">
                                        <center class="m-t-10">
                                            <img src="<?='images/'.$result['profilePicture'];?>" class="img-circle"width="150px" id="profile-img-tag"/>
                                            <input class="input-img form-control m-t-40" id="profile-img" type="file" name="profilePic" <?=$result['profilePicture'];?> onchange="imageValidation('profile-img')">
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
                                                
                                                function imageValidation(id){
                                                    var formData = new FormData();
                                                    var file = document.getElementById(id).files[0];
                                                    formData.append("filedata", file);
                                                    var fileType = file.type.split('/').pop().toLowerCase();
                                                    if(fileType != "jpeg" && fileType != "jpg" && fileType != "png"){
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
                                            <input type="text" name="sfname" class="form-control" value="<?=$result['sName'];?>" required >
                                            <input type="text" name="rowID" value="<?php echo $rowID; ?>" style="display:none;">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Contact Number<span style="color:red">*</span></label>
                                                <input type="text" name="sprimaryno" class="form-control" value="<?= $result['sPrimaryContact']; ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alternate Number</label>
                                                <input type="text" name="salternateno" class="form-control" value="<?= $result['sAlternateContact']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail<span style="color:red">*</span></label>
                                            <input type="email" name="semail" class="form-control" value="<?= $result['sEmail']; ?>" required>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label>Address 1<span style="color:red">*</span></label>
                                    <input type="text" name="saddr1" class="form-control" value="<?= $result['sAddress1']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Address 2<span style="color:red">*</span></label>
                                    <input type="text" name="saddr2" class="form-control" value="<?= $result['sAddress2']; ?>">
                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-4">
                                        <label>Date of Birth<span style="color:red">*</span></label>
                                        <input type="date" name="sDOB" class="form-control" value="<?=date_format(date_create($result['sDOB']), "Y-m-d"); ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Gender<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="sgender">
                                            <option value="Male" <?php echo ($result['sGender']== 'Male')?' selected':'';?>>Male</option>
                                            <option value="Female" <?php echo ($result['sGender']== 'Female')?' selected':'';?>>Female</option>
                                            <option value="other" <?php echo ($result['sGender']== 'other')?' selected':'';?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Marital Status<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="marstatus">
                                            <option value="Unmarried" <?php echo ($result['sMaritalStatus']== 'Unmarried')?' selected':'';?>>Unmarried</option>
                                            <option value="Married" <?php echo ($result['sMaritalStatus']== 'Married')?' selected':'';?>>Married</option>
                                            <option value="Divorced" <?php echo ($result['sMaritalStatus']== 'Divorced')?' selected':'';?>>Divorced</option>
                                            <option value="Widowed" <?php echo ($result['sMaritalStatus']== 'Widowed')?' selected':'';?>>Widowed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >City<span style="color:red">*</span></label>
                                        <input type="text" name="scity" class="form-control" value="<?= $result['sCity']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >State<span style="color:red">*</span></label>
                                        <input type="text" name="state" class="form-control" value="<?= $result['sState']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Pincode<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" value="<?= $result['sPincode']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Joining Date<span style="color:red">*</span></label>
                                        <input type="date" name="joindate" class="form-control" value="<?= $result['sJoiningDate']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Shift Timing<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="shifttime">
                                            <option value="5:30 am - 9:30 am"<?php echo ($result['sShiftTime']== '5:30 am - 9:30 am || 4:00 pm - 8:00 pm')?' selected':'';?>>5:30 am - 9:30 am || 4:00 pm - 8:00 pm</option>
                                            <option value="6:00 am - 10:00 am"<?php echo ($result['sShiftTime']== '6:00 am - 10:00 am || 4:30 pm - 8:30 pm')?' selected':'';?>>6:00 am - 10:00 am || 4:30 pm - 8:30 pm</option>
                                            <option value="7:00 am - 11:00 am"<?php echo ($result['sShiftTime']== '7:00 am - 11:00 am || 5:00 pm - 9:00 pm')?' selected':'';?>>7:00 am - 11:00 am || 5:00 pm - 9:00 pm</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Designation<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="designation">
                                            <option value="Manager"<?php echo ($result['sDesignation']== 'Manager')?' selected':'';?>>Manager</option>
                                            <option value="Trainer"<?php echo ($result['sDesignation']== 'Trainer')?' selected':'';?>>Trainer</option>
                                            <option value="Office Assistant"<?php echo ($result['sDesignation']== 'Office Assistant')?' selected':'';?>>Office Assistant</option>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" value="YES"<?php echo ($result['sAccountStatus']== 'YES')?' checked':'';?>>
                                        <label class="form-check-label" for="status">
                                            Create Account<span>  (Optional)</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="update" name="update">Update</button>
                            </form>
                        </div>
            </div>
            <!-- ============================================================== -->

            

                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
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