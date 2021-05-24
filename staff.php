<?php
session_start(); 
if(!isset($_SESSION['fullName']))
{
    header('Location:index.php');
}
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
$defaultImage = "images/people/6.png";
?>

<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
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
                <div class="collapse" id="collapseExample"  data-spy="scroll">
                    <!-- Start Page Content -->
                    <!-- Row -->
                    <div class="card">
                        <div class="card-body" data-spy="scroll">
                            <form action="process/staffProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
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
                                                <p style="color:red">invalid Contact number</p>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Alternate Number</label>
                                                <input type="text" name="salternateno" class="form-control" required>
                                                <p style="color:red">invalid Contact number</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail<span style="color:red">*</span></label>
                                            <input type="text" name="semail" class="form-control" required>
                                            <p style="color:red">invalid email address</p>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label>Address 1<span style="color:red">*</span></label>
                                    <input type="text" name="saddr1" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Address 2<span style="color:red">*</span></label>
                                    <input type="text" name="saddr2" class="form-control" required>
                                </div>
                                <div class="row ">
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
                                        <label >Marital Status<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="marstatus">
                                            <option selected disabled>Choose...</option>
                                            <option value="Unmarried">Unmarried</option>
                                            <option value="Married">Married</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >City<span style="color:red">*</span></label>
                                        <input type="text" name="scity" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >State<span style="color:red">*</span></label>
                                        <input type="text" name="state" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Pincode<span style="color:red">*</span></label>
                                        <input type="text" name="pincode" class="form-control" required>
                                        <p style="color:red">invalid pincode</p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Joining Date<span style="color:red">*</span></label>
                                        <input type="date" name="joindate" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Shift Timing<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="shifttime">
                                            <option selected disabled>Choose...</option>
                                            <option value="5:30 am - 9:30 am || 4:00 pm - 8:00 pm">5:30 am - 9:30 am || 4:00 pm - 8:00 pm</option>
                                            <option value="6:00 am - 10:00 am || 4:30 pm - 8:30 pm">6:00 am - 10:00 am || 4:30 pm - 8:30 pm</option>
                                            <option value="7:00 am - 11:00 am || 5:00 pm - 9:00 pm">7:00 am - 11:00 am || 5:00 pm - 9:00 pm</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Designation<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="designation">
                                            <option selected disabled>Choose...</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Trainer">Trainer</option>
                                            <option value="Office Assistant">Office Assistant</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >School/College Marksheet</label>
                                        <input type="file" name="marksheet" class="form-control" id="marksheet" onchange="imageValidation('marksheet')" >
                                        <p style="color:red">invalid file selected</p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Certification (Optional)</label>
                                        <input type="file" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                        <p style="color:red">invalid file selected</p>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label > Photo ID Proof<span style="color:red">*</span></label>
                                        <input type="file" name="idproof" class="form-control" required id="idproof" onchange="imageValidation('idproof')">
                                        <p style="color:red">invalid file selected</p>
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
                </div>
            </div>
            <div class="row">
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
                                                <th>Designation</th>
                                                <th>Contact No.</th>
                                                <th>Alternate No.</th>
                                                <th>Shift Time</th>
                                                <th>Join date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 0;
                                            include('includes/include_once/db.php');
                                            $data = "SELECT sID, profilePicture, sName, sPrimaryContact, sAlternateContact, sShiftTime, sEmail, sJoiningDate, sDesignation FROM gymstaff";
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
                                                    <td><?php echo $result['sDesignation']; ?></td>
                                                    <td><?php echo $result['sPrimaryContact']; ?></td>
                                                    <td><?php echo $result['sAlternateContact']; ?></td>
                                                    <td><?php echo $result['sShiftTime']; ?></td>
                                                    <td><?php echo $result['sJoiningDate']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-eye  btn btn-outline-info" name="edit" href="staffProfile.php?id=<?= $result['sID']; ?>"></a>
                                                        <a class="fa fa-pencil-square-o btn btn-outline-primary" name="edit" href="editStaff.php?id=<?= $result['sID']; ?>"></a>
                                                        <a class="fa fa-ban btn btn-outline-danger" value="<?php echo $result['sID']; ?>" onclick="myButton(<?php echo $result['sID']; ?>)" type="button" href="delete.php?<?php $deleteRowID = $result['sID']; ?>" data-toggle="modal" data-target="#exampleModal"></a>
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
            </div>
        </div>
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>