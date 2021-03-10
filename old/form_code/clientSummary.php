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
                <div  class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="addClient.php">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gymTest.php">Gym Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientPaymentTest.php">Payment Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Summary</a>
                        </li>
                    </ul>
                    <div>
                        <div class="card-body" data-spy="scroll">
                            <form action="process/clientProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Client Fullname<span style="color:red">*</span></label>
                                    <input type="text" name="saddr1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address<span style="color:red">*</span></label>
                                    <input type="text" name="saddr2" class="form-control">
                                </div>
                                <div class="row ">
                                    <div class="form-group col-md-4">
                                        <label >Contact No.<span style="color:red">*</span></label>
                                        <input type="text" name="scity" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Email<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Pincode<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Membership Type<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="designation">
                                            <option selected disabled>Choose...</option>
                                            <option value="Manager">General Membership</option>
                                            <option value="Trainer">Personal Trainig</option>
                                        </select>
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
                                        <label >Package Type<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="marstatus">
                                            <option selected disabled>Choose...</option>
                                            <option value="Unmarried">3 Month</option>
                                            <option value="Married">6 Month</option>
                                            <option value="Divorced">1 Year</option>
                                            <option value="Widowed">2 Year</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Start Date<span style="color:red">*</span></label>
                                        <input type="date" name="startdate" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Batch Timing<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="shifttime">
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
                                        <label >Emergency Contact Person</label>
                                        <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Emergency Contact Number</label>
                                        <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label > Photo ID Proof<span style="color:red">*</span></label>
                                        <input type="file" name="idproof" class="form-control" required id="idproof" onchange="imageValidation('idproof')">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Medical Report (Optional)</label>
                                        <input type="file" name="marksheet" class="form-control" id="marksheet" onchange="imageValidation('marksheet')" >
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" value="YES">
                                        <label class="form-check-label" for="status">
                                            Create Account<span>  (Optional)</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Submit</button>
                            </form>
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
                                                    <!--<td><?php //echo $result['']; ?></td>-->
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