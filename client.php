<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add Client
                    </button>
                </p>
                <div class="collapse" id="collapseExample"  data-spy="scroll">
                    <style>
                        #second, #third, #fourth{
                            display: none;
                        }
                    </style>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#next1').click(function () {
                                $('#second').show();
                                $('#first').hide();
                            });
                            $('#next2').click(function () {
                                $('#third').show();
                                $('#second').hide();
                            });
                            $('#next3').click(function () {
                                $('#fourth').show();
                                $('#third').hide();
                            });
                            $('#prev1').click(function () {
                                $('#first').show();
                                $('#second').hide();
                            });
                            $('#prev2').click(function () {
                                $('#second').show();
                                $('#third').hide();
                            });
                            $('#prev3').click(function () {
                                $('#third').show();
                                $('#fourth').hide();
                            });
                        });
                    </script>
                    <div >
                        <div class="card" id="first">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link " style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Personal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Gym Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" >Payment Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" >Summary</a>
                                </li>
                            </ul>
                            <div class="card-body" >
                                <form action="" method="POST" id="staff-form" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <center class="m-t-10">
                                                <img src="<?= 'images/' . $result['profilePicture']; ?>" class="img-circle"width="150px" id="profile-img-tag"/>
                                                <input class="input-img form-control m-t-40" id="profile-img" type="file" name="profilePic" onchange="imageValidation('profile-img')">

                                            </center>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Fullname<span style="color:red">*</span></label>
                                                <input type="text" name="sfname" class="form-control" >
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Contact Number<span style="color:red">*</span></label>
                                                    <input type="text" name="sprimaryno" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Alternate Number</label>
                                                    <input type="text" name="salternateno" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail<span style="color:red">*</span></label>
                                                <input type="text" name="semail" class="form-control">
                                            </div>
                                        </div>                            
                                    </div>
                                    <div class="form-group">
                                        <label>Address 1<span style="color:red">*</span></label>
                                        <input type="text" name="saddr1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address 2</label>
                                        <input type="text" name="saddr2" class="form-control">
                                    </div>
                                    <div class="row ">
                                        <div class="form-group col-md-4">
                                            <label >City<span style="color:red">*</span></label>
                                            <input type="text" name="scity" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label >District<span style="color:red">*</span></label>
                                            <input type="text" name="pincode" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label >Pincode<span style="color:red">*</span></label>
                                            <input type="text" name="pincode" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date of Birth<span style="color:red">*</span></label>
                                            <input type="date" name="sDOB" class="form-control">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label >Gender<span style="color:red">*</span></label>
                                            <select id="inputState" class="form-control" name="sgender">
                                                <option selected disabled>Choose...</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label > Photo ID Proof<span style="color:red">*</span></label>
                                            <input type="file" name="idproof" class="form-control" id="idproof" onchange="imageValidation('idproof')">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="status" name="status" value="YES">
                                            <label class="form-check-label" for="status">
                                                Create Account<span>  (Optional)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <a type="button"class="btn btn-primary m-t-10" id="next1" >Next</a>
                                </form>
                            </div>
                        </div>
                        <div >
                            <div class="card"id="second">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " >Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Gym Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" >Payment Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" >Summary</a>
                                    </li>
                                </ul>
                                <div class="card-body" data-spy="scroll">
                                    <form action="" method="POST" id="staff-form">
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label >Membership Type<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">General Membership</option>
                                                    <option value="Female">Personal Training</option>
                                                    <option value="other">Premium Membership</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Trainer Name<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Male">Reuben</option>
                                                    <option value="Female">Vaibhav</option>
                                                    <option value="other">Shriraj</option>
                                                    <option value="Male">Neeke</option>
                                                    <option value="Female">Scully</option>
                                                    <option value="other">Astaha</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Package Type<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="marstatus">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Widowed">1 Month</option>
                                                    <option value="Unmarried">3 Month</option>
                                                    <option value="Married">6 Month</option>
                                                    <option value="Divorced">1 Year</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Package Name<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="marstatus">
                                                    <option selected disabled>Choose...</option>
                                                    <option value="Widowed">1 Month</option>
                                                    <option value="Unmarried">3 Month</option>
                                                    <option value="Married">6 Month</option>
                                                    <option value="Divorced">1 Year</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Batch Timing<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="designation">
                                                    <option selected disabled>Choose...</option>
                                                    <option disabled>Morning</option>
                                                    <option value="6:30 am - 7:30 am">6:30 am - 7:30 am</option>
                                                    <option value="7:30 am - 8:30 am">7:30 am - 8:30 am</option>
                                                    <option value="8:30 am - 9:30 am">8:30 am - 9:30 am</option>
                                                    <option value="9:30 am - 10:30 am">9:30 am - 10:30 am</option>
                                                    <option disabled>Evening</option>
                                                    <option value="4:00 pm - 5:00 pm">4:00 pm - 5:00 pm</option>
                                                    <option value="5:00 pm - 6:00 pm">5:00 pm - 6:00 pm</option>
                                                    <option value="6:00 am - 7:00 pm">6:00 pm - 7:00 pm</option>
                                                    <option value="7:00 am - 8:00 pm">7:00 pm - 8:00 pm</option>
                                                    <option value="8:00 am - 9:00 pm">8:00 pm - 9:00 pm</option>
                                                </select>
                                            </div>  

                                            <div class="form-group col-md-4">
                                                <label >Start Date<span style="color:red">*</span></label>
                                                <input type="date" name="startdate" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >End Date<span style="color:red">*</span></label>
                                                <input type="date" name="startdate" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Incase of Emergency Contact:</label>
                                                <br>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label >Contact Person</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label >Contact Number</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Medical Report (Optional)</label>
                                                <input type="file" name="marksheet" class="form-control" id="marksheet" onchange="imageValidation('marksheet')" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label >Medical Problem (Optional)</label>
                                                <textarea type="text" name="marksheet" class="form-control" id="marksheet" ></textarea>
                                            </div>
                                        </div>
                                        <a type="button" class="btn btn-primary m-t-10" id="prev1">Back</a>
                                        <a type="button" class="btn btn-primary m-t-10" id="next2">Next</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div class="card" id="third">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " >Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">Gym Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Payment Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" >Summary</a>
                                    </li>
                                </ul>
                                <div class="card-body" data-spy="scroll">
                                    <form action="" method="POST" id="staff-form" enctype="multipart/form-data">
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label >Fullname<span style="color:red">*</span></label>
                                                <input type="text" name="scity" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Email<span style="color:red">*</span></label>
                                                <input type="text" name="pincode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Contact No.<span style="color:red">*</span></label>
                                                <input type="text" name="pincode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Package Selected<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option>Monthly</option>
                                                    <option>03 Months</option>
                                                    <option>06 Months</option>
                                                    <option>09 Months</option>
                                                    <option>Yearly</option>
                                                    <option>Couple</option>
                                                    <option>Festival</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Payment Mode<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option>Cash</option>
                                                    <option>Credit Card</option>
                                                    <option>UPI</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Total Amount</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Amount Paid</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Amount Due</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Due Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Start Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>End Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                        </div>
                                        <a class="btn btn-primary m-t-10" id="prev2">Back</a>
                                        <a type="button" class="btn btn-primary m-t-10" id="next3">Next</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div >
                            <div class="card" id="fourth">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link">Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">Gym Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">Payment Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Summary</a>
                                    </li>
                                </ul>
                                <div class="card-body" data-spy="scroll">
                                    <form action="" method="POST" id="staff-form" enctype="multipart/form-data">
                                        <div class="row ">
                                            <div class="form-group col-md-6">
                                                <label >Fullname<span style="color:red">*</span></label>
                                                <input type="text" name="scity" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label >Email<span style="color:red">*</span></label>
                                                <input type="text" name="pincode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Contact No.<span style="color:red">*</span></label>
                                                <input type="text" name="pincode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Package Selected<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option>Monthly</option>
                                                    <option>03 Months</option>
                                                    <option>06 Months</option>
                                                    <option>09 Months</option>
                                                    <option>Yearly</option>
                                                    <option>Couple</option>
                                                    <option>Festival</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label >Payment Mode<span style="color:red">*</span></label>
                                                <select id="inputState" class="form-control" required name="sgender">
                                                    <option>Cash</option>
                                                    <option>Credit Card</option>
                                                    <option>UPI</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Total Amount</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Amount Paid</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Amount Due</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Due Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Start Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>End Date</label>
                                                <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                            </div>
                                        </div>
                                        <a class="btn btn-primary m-t-10" id="prev3">Back</a>
                                        <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                                <th>Package Type</th>
                                                <th>Batch Time</th>
                                                <th>Contact No.</th>
                                                <th>Joining Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 0;
                                            include('includes/include_once/db.php');
                                            $data = "SELECT cID, profilePicture, cName, cReferredBy, cBatchTime, cMobile, cStartDate, cEndDate, cStatus, cMembershipType FROM gymclients";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$sr; ?></td>
                                                    <td style="width:50px;"><img class="round" src="<?php echo 'images/' . $result['profilePicture']; ?>" > </td>
                                                    <td>
                                                        <h6><?php echo $result['cName']; ?></h6><small class="text-muted"><?php echo $result['cEndDate']; ?></small>
                                                    </td>
                                                    <td><h6><?php echo $result['cReferredBy']; ?></h6><small class="text-muted"><?php echo $result['cEndDate']; ?></small></td>
                                                    <td><?php echo $result['cBatchTime']; ?></td>
                                                    <td><?php echo $result['cMobile']; ?></td>
                                                    <td><?php echo $result['cStartDate']; ?></td>
                                                    <td><?php echo $result['cStatus']; ?></td>
                                                    <!--<td><?php //echo $result[''];  ?></td>-->
                                                    <td class="table-action">
                                                        <a class="fa fa-pencil-square-o btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit" name="edit" href="editStaff.php?id=<?= $result['sID']; ?>"></a>
                                                        <a class="fa fa-trash-o btn btn-outline-danger" value="<?php echo $result['sID']; ?>" onclick="myButton(<?php echo $result['sID']; ?>)" type="button" data-toggle="'tooltip','modal'" data-placement="left" title="Edit"  data-target="#exampleModal"></a>  <!--  -->
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
                                                                        function myButton(id) {
                                                                            //alert(document.getElementById("deleteForm").action);
                                                                            document.getElementById("deleteForm").action = "process/staffProcess.php?id=" + id;
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
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>