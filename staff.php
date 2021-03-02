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
                                        <input class="input-img form-control" form="staff-form" value="images/people/6.png" type="file" name="profilePic">
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
                                                <input type="text" class="form-control" required  name="sfname" oninput="inputFunctionName(this)">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">E-mail<span></span></label>
                                                <input type="email" class="form-control" id="inputPassword4" name="semail">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Primary Contact Number<span style="color:red">*</span></label>
                                                <input type="phone" class="form-control" id="validationDefault03" required name="sprimaryno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alternate Contact Number</label>
                                                <input type="phone" class="form-control" id="validationDefault03" name="salternateno">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Date of Birth<span style="color:red">*</span></label>
                                                <input type="date" class="form-control" required name="sDOB" oninput="inputFunctionBirth(this)">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Gender<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Marital Status<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="marstatus">
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
                                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" required name="saddr1">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="saddr2">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputZip">Pincode<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="inputZip" oninput="getDetails(this)" required name="pincode">
                                            </div>                                            
                                            <div class="form-group col-md-4">
                                                <label for="city">City<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="city" required name="scity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="state">State<span style="color:red">*</span></label>
                                                <input type="text" id="state" class="form-control" required name="state">
<!--                                                <select id="inputState" class="form-control" required name="state">
                                                    <option selected disabled>Choose...</option>
                                                    <option  value="Goa">Goa</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="U.P">U.P</option>
                                                    <option value="Maharastra">Maharastra</option>
                                                </select>-->
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Joining Date<span style="color:red">*</span></label>
                                                <input type="date" class="form-control" required name="joindate">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Shift From<span style="color:red">*</span></label>
                                                <input type="time" class="form-control" required name="shifttime">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Shift To<span style="color:red">*</span></label>
                                                <input type="time" class="form-control" required name="shifttime">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Designation<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" required name="designation" oninput="inputFunctionDesignation(this)">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>School/College Marksheet</label>
                                                <input type="file" class="form-control" name="marksheet">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Certification<span>  (Optional)</span></label>
                                                <input type="file" class="form-control" name="certification">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Photo ID Proof<span style="color:red">*</span></label>
                                                <input type="file" class="form-control" required name="idproof">
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
                                        <button type="submit" class="btn btn-primary" name="submit">submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
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
                                    <table id="example" class="table vm no-th-brd pro-of-month" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
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
                                            $sr = 0;
                                            include('includes/include_once/db.php');
                                            $data = "SELECT sID, profilePicture, sName, sPrimaryContact, sAlternateContact, sEmail, sJoiningDate, sDesignation FROM gymstaff";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$sr; ?></td>
                                                    <td style="width:50px;"><img class="round" src="<?php echo 'images/' . $result['profilePicture']; ?>" > </td>
                                                    <td>
                                                        <h6><?php echo $result['sName']; ?></h6><small class="text-muted"><?php echo $result['sDesignation']; ?></small>
                                                    </td>
                                                    <td><?php echo $result['sPrimaryContact']; ?></td>
                                                    <td><?php echo $result['sAlternateContact']; ?></td>
                                                    <td><?php echo $result['sEmail']; ?></td>
                                                    <td><?php echo $result['sJoiningDate']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-pencil-square-o btn btn-outline-primary" name="edit" href="editStaff.php?id=<?= $result['sID']; ?>"></a>
                                                        <a class="fa fa-trash-o btn btn-outline-danger" value="<?php echo $result['sID'];?>" onclick="myButton(<?php echo $result['sID'];?>)" type="button" href="delete.php?<?php $deleteRowID = $result['sID'];?>" data-toggle="modal" data-target="#exampleModal"></a>  <!--  -->
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Staff</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="process/staffProcess.php" id="deleteForm" method="POST">
                                                                        <div class="modal-body">
                                                                            Are You Sure You Want To Delete ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" name="delete">Yes ! Delete</button>
                                                                        </div>
                                                                    </form>
                                                                    <script>
                                                                        function myButton(id){
                                                                            //alert(document.getElementById("deleteForm").action);
                                                                            document.getElementById("deleteForm").action= "process/staffProcess.php?id="+id;
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
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
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>