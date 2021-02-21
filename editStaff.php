<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
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
            <div>
                    <div class="card card-body">
                        <form action="staffProcess.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control"  name="fullname">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">email<span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" id="validationDefault03">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Alternate Contact Number</label>
                                    <input type="phone" class="form-control" id="validationDefault03">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Date of Birth<span style="color:red">*</span></label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Marital Status<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Unmarried</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">City<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">State<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Pincode<span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Joining Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Shift Timing<span style="color:red">*</span></label>
                                    <input type="time" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Designation<span style="color:red">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>School/College Marksheet<span style="color:red">*</span></label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Certification<span>  (Optional)</span></label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Photo ID Proof<span style="color:red">*</span></label>
                                    <input type="file" class="form-control">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Create Account<span>  (Optional)</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
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