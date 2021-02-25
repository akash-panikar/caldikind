<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
$rowID = $_GET['id'];
$searchQuery = "SELECT * from gymstaff WHERE sID=$rowID";
$execQuery = mysqli_query($connect, $searchQuery);
$result = mysqli_fetch_assoc($execQuery);
//if (isset($_POST['edit'])) {
//    if (count($result) == 1) {
//        $staffEditFullname = $result['sfname'];
//        $staffEditEmail = $result['semail'];
//        $staffEditprimContact = $result['sprimaryno'];
//        $staffEditAltContact = $result['salternateno'];
//        $staffEditDOB = $result['sDOB'];
//        $staffEditGender = $result['sgender'];
//        $staffEditMarital = $result['marstatus'];
//        $staffEditAddr1 = $result['saddr1'];
//        $staffEditAddr2 = $result['saddr2'];
//        $staffEditCity = $result['scity'];
//        $staffEditState = $result['state'];
//        $staffEditPincode = $result['pincode'];
//        $staffEditJoining = $result['joindate'];
//        $staffEditShiftTime = $result['shifttime'];
//        $staffEditDesignation = $result['designation'];
//        $staffEditProfilePic = $result['profilePic'];
//        $staffEditMarksheet = $result['marksheet'];
//        $staffEditCertification = $result['certification'];
//        $staffEditIDProof = $result['idproof'];
//        if (empty($result['status'])) {
//            $staffAccount = 'NO';
//        } else {
//            $staffAccount = 'YES';
//        }
//    }
//}
?>
<div id="main-wrapper">
    <!-- ============================================================== -->

    <!-- Page wrapper  -->
    <!-- ============================================================== -->
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Staff</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="images/people/6.png" class="img-circle"width="150" />
                                <input class="input-img form-control" form="staff-form" type="file" name="profilePic">
                                <h4 class="card-title m-t-10" id="input_name"></h4>
                                <h6 class="card-subtitle" id="input_designation"></h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><span class="fa fa-birthday-cake"></span>
                                        <font class="font-medium" id="input_birth"></font>
                                    </div>                                      
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <script>
                    function inputFunctionName(element) {
                        var name = element.value;
                        document.getElementById("input_name").innerHTML = name;
                    }
                    function inputFunctionDesignation(element) {
                        var designation = element.value;
                        document.getElementById("input_designation").innerHTML = designation;
                    }
                    function inputFunctionBirth(element) {
                        var birth = element.value;
                        document.getElementById("input_birth").innerHTML = birth;
                    }
                    
                </script>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form action="process/staffProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Fullname<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" required  name="sfname" value="<?=$result['sName'];?>" oninput="inputFunctionName(this)">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">E-mail<span></span></label>
                                        <input type="email" class="form-control" value="<?= $result['sEmail']; ?>" id="inputPassword4" name="semail">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Primary Contact Number<span style="color:red">*</span></label>
                                        <input type="phone" class="form-control" value="<?= $result['sPrimaryContact']; ?>" id="validationDefault03" required name="sprimaryno">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Alternate Contact Number</label>
                                        <input type="phone" class="form-control" value="<?= $result['sAlternateContact']; ?>" id="validationDefault03" name="salternateno">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Date of Birth<span style="color:red">*</span></label>
                                        <input type="date" class="form-control" value="<?= $result['sDOB']; ?>" required name="sDOB" oninput="inputFunctionBirth(this)">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Gender<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required  name="sgender">
                                            <option selected disabled><?= $result['sGender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Marital Status<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required  name="marstatus">
                                            <option selected disabled><?= $result['sMaritalStatus']; ?></option>
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="inputAddress" value="<?= $result['sAddress1']; ?>" placeholder="1234 Main St" required name="saddr1">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" value="<?= $result['sAddress2']; ?>" placeholder="Apartment, studio, or floor" name="saddr2">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">City<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" value="<?= $result['sCity']; ?>" id="inputCity" required name="scity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">State<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required value="<?= $result['sState']; ?>" name="state">
                                            <option selected disabled>Choose...</option>
                                            <option  value="Goa">Goa</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="U.P">U.P</option>
                                            <option value="Maharastra">Maharastra</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputZip">Pincode<span style="color:red">*</span></label>
                                        <input type="number" class="form-control" id="inputZip" value="<?= $result['sPincode']; ?>" required name="pincode">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Joining Date<span style="color:red">*</span></label>
                                        <input type="date" class="form-control" value="<?= $result['sJoiningDate']; ?>" required name="joindate">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Shift Timing<span style="color:red">*</span></label>
                                        <input type="time" class="form-control" value="<?= $result['sShiftTime']; ?>" required name="shifttime">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Designation<span style="color:red">*</span></label>
                                        <input type="text" class="form-control" value="<?= $result['sDesignation']; ?>" required name="designation" oninput="inputFunctionDesignation(this)">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>School/College Marksheet</label>
                                        <input type="file" class="form-control" value="<?= $result['sSchoolCert']; ?>" name="marksheet">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Certification<span>  (Optional)</span></label>
                                        <input type="file" class="form-control" value="<?= $result['sCertification']; ?>" name="certification">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Photo ID Proof<span style="color:red">*</span></label>
                                        <input type="file" class="form-control"value="<?= $result['sPhotoIDProof'];?>" required name="idproof">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" value="YES">
                                        <label class="form-check-label" for="status">
                                            Create Account<span>  (Optional)</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
        <!-- ============================================================== -->

        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> Designed & Developed by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

<?php
include('includes/include_once/footer.php');
?>