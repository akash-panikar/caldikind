<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
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
                        <li class="breadcrumb-item">Test</li>
                        <li class="breadcrumb-item active">Staff</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add Staff
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="images/people/6.png" class="img-circle"width="150" />
                                        <input class="input-img" form="staff-form" type="file" name="profilePic">
                                        <h4 class="card-title m-t-10" id="input_name"></h4>
                                        <h6 class="card-subtitle" id="input_designation"></h6>
                                        <div class="row text-center justify-content-md-center">
                                            <div class="col-4"><span class="fa fa-birthday-cake"></span>
                                                <font class="font-medium" id="input_birth"></font>
                                            </div>
<!--                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                    class="icon-picture"></i>
                                                <font class="font-medium">54</font>
                                            </a></div>-->
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
<!--                        <style>
                            .input-img{

                                position: absolute;
                                top:0;
                                z-index: 0;
                                width: 50px;
                                margin-top: 0px;
                                background: black;
                                /*visibility: hidden;*/
                                
                            }
                            .img-card{
                                position:relative;
                                width:100%;
                                margin-left: auto;
                                margin-right: auto;
                                
                            }
                        </style>-->
                        <!-- Column -->
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
                                    <form action="process/staffProcess.php" method="POST" id="staff-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Fullname<span style="color:red">*</span></label>
                                                <input type="text" class="form-control"  name="sfname" oninput="inputFunctionName(this)">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">email<span style="color:red">*</span></label>
                                                <input type="email" class="form-control" id="inputPassword4" name="semail">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Primary Contact Number<span style="color:red">*</span></label>
                                                <input type="phone" class="form-control" id="validationDefault03" name="sprimaryno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alternate Contact Number</label>
                                                <input type="phone" class="form-control" id="validationDefault03" name="salternateno">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Date of Birth<span style="color:red">*</span></label>
                                                <input type="date" class="form-control" name="sDOB" oninput="inputFunctionBirth(this)">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Gender<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" name="sgender">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Marital Status<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" name="marstatus">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Unmarried">Unmarried</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorced">Divorced</option>
                                                    <option value="Widowed">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress">Address<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="saddr1">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="saddr2">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputCity">City<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="inputCity" name="scity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">State<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" name="state">
                                                    <option selected>Choose...</option>
                                                    <option  value="Goa">Goa</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="U.P">U.P</option>
                                                    <option value="Maharastra">Maharastra</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputZip">Pincode<span style="color:red">*</span></label>
                                                <input type="number" class="form-control" id="inputZip" name="pincode">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Joining Date<span style="color:red">*</span></label>
                                                <input type="date" class="form-control" name="joindate">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Shift Timing<span style="color:red">*</span></label>
                                                <input type="time" class="form-control" name="shifttime">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Designation<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" name="designation" oninput="inputFunctionDesignation(this)">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>School/College Marksheet<span style="color:red">*</span></label>
                                                <input type="file" class="form-control" name="marksheet">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Certification<span>  (Optional)</span></label>
                                                <input type="file" class="form-control" name="certification">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Photo ID Proof<span style="color:red">*</span></label>
                                                <input type="file" class="form-control" name="idproof">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="gridCheck" name="status" value="yes">
                                                <label class="form-check-label" for="gridCheck">
                                                    Create Account<span>  (Optional)</span>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                </div>
            </div>
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="table-responsive m-t-20 no-wrap">
    <!--                                <table class="table vm no-th-brd pro-of-month">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Name</th>
                                                <th>Designation</th>
                                                <th>Contact No.</th>
                                                <th>Join Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width:50px;"><img class="round" src="images/people/suraj.jpg" > </td>
                                                <td>
                                                    <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                                </td>
                                                <td>Elite Admin</td>
                                                <td>9876543210</td>
                                                <td>12-02-2021</td>
                                            </tr>
                                            <tr class="active">
                                                <td><span class="round"><img src="../assets/images/users/2.jpg"
                                                                             alt="user" width="50"></span></td>
                                                <td>
                                                    <h6>Andrew</h6><small class="text-muted">Project Manager</small>
                                                </td>
                                                <td>Real Homes</td>
                                                <td>$23.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-success">B</span></td>
                                                <td>
                                                    <h6>Bhavesh patel</h6><small class="text-muted">Developer</small>
                                                </td>
                                                <td>MedicalPro Theme</td>
                                                <td>$12.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-primary">N</span></td>
                                                <td>
                                                    <h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small>
                                                </td>
                                                <td>Elite Admin</td>
                                                <td>$10.9K</td>
                                            </tr>
                                            <tr>
                                                <td><span class="round round-warning">M</span></td>
                                                <td>
                                                    <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small>
                                                </td>
                                                <td>Helping Hands</td>
                                                <td>$12.9K</td>
                                            </tr>
                                        </tbody>
                                    </table>-->
                                    <table id="example" class="table vm no-th-brd pro-of-month" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Join date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
//                                        $data = "SELECT * FROM gymestaff";
//                                        $query = mysqli_query($connect, $data);
//                                        while ($result = mysqli_fetch_assoc($query)) {
?>
    <!--                                            <tr>
                                                    <td><?php echo $result['sID']; ?></td>
                                                    <td><?php echo $result['sName']; ?></td>
                                                    <td><?php echo $result['sType']; ?></td>
                                                    <td><?php echo $result['sContact']; ?></td>
                                                    <td><?php echo $result['sEmail']; ?></td>
                                                    <td><?php echo $result['sDOB']; ?></td>
                                                </tr>-->
<?php
//                                        }
?>
                                            <tr>
                                                <td style="width:50px;"><img class="round" src="images/people/suraj.jpg" > </td>
                                                <td>
                                                    <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                                </td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="editStaff.php"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
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