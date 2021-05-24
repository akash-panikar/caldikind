<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
?>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Enquiry</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add Enquiry
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="process/enquiryProcess.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>                               
                                <div class="form-group col-md-6">
                                    <label>email</label>
                                    <input type="email" class="form-control" name="email" id="email" oninput="validateEmail()">
                                    <p style="color:red" id="email-message"></p>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" name="primarycontact" id="mobile" onchange="CheckNumber()" required>
                                    <p style="color:red" id="mobile-message"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Alternate Contact Number</label>
                                    <input type="phone" class="form-control" name="alternatecontact" id="mobile1" onchange="CheckAlternateNumber()">
                                    <p style="color:red" id="mobile1-message"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="gender" required>
                                        <option selected disabled>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="phone" class="form-control" name="address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEnq">Enquiry Type<span style="color:red">*</span></label>
                                    <select id="inputEnq" class="form-control" name="enqtype" required>
                                        <option selected>Choose...</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Walk-IN">Walk-IN</option>
                                        <option value="Social Media">Social Media</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Remark</label>
                                    <textarea type="text" class="form-control" name="remark"></textarea>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">submit</button>
                        </form>
                    </div>
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
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Gender</th>
                                                <th>Location</th>
                                                <th>Type</th>
                                                <th>Remark</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = "SELECT * FROM gymenquiry WHERE status='Active' ORDER BY vID DESC";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $result['date']; ?></td>
                                                    <td><?php echo $result['vName']; ?></td>
                                                    <td><?php echo $result['vMobile']; ?></td>
                                                    <td><?php echo $result['vGender']; ?></td>
                                                    <td><?php echo $result['vLocation']; ?></td>
                                                    <td><?php echo $result['vType']; ?></td>
                                                    <td><?php echo $result['remark']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-pencil-square-o btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit" name="edit" href="editEnquiry.php?id=<?= $result['vID']; ?>"></a>
                                                        <a class="fa fa-plus btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="join" name="join"></a>
                                                        <a class="fa fa-flag btn btn-outline-danger" value="<?php echo $result['vID']; ?>" onclick="myButton(<?php echo $result['vID']; ?>)" type="button" data-toggle="modal" data-placement="left" title="Not Interested"  data-target="#exampleModal"></a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Not Interested</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form action="process/enquiryProcess.php" id="notInterested" method="POST">
                                                                        <div class="modal-body">
                                                                            Do You Want To Mark Not Interested ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" name="ni">Yes !</button>
                                                                        </div>
                                                                    </form>
                                                                    <script>
                                                                        function myButton(id) {
                                                                            //alert(document.getElementById("deleteForm").action);
                                                                            document.getElementById("notInterested").action = "process/enquiryProcess.php?id=" + id;
                                                                        }
                                                                        
                                                                        // email validation
                                                                        function validateEmail(email) {
                                                                            const regex_pattern =      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                                                                            if (regex_pattern.test(email)) {
                                                                                //alert('The email address is valid');
                                                                                //document.getElementById("email-message").inner.HTML
                                                                            }
                                                                            else {
                                                                                //alert('The email address is not valid');
                                                                                document.getElementById("email-message").innerHTML = 'The email address is not valid';
                                                                            }
                                                                        }

                                                                        // Mobile Number valiadtion
                                                                        function CheckNumber(mobile)   
                                                                        {  
                                                                            var a = /^\d{10}$/;  
                                                                            if (a.test(mobile))   
                                                                            {  
                                                                                alert("Your Mobile Number Is Valid.")  
                                                                            }   
                                                                            else   
                                                                            {  
                                                                                document.getElementById("mobile-message").innerHTML = 'invalid Contact number';
                                                                            }  
                                                                        }; 
                                                                                // Alternate mobile number
                                                                        //function CheckAlternateNumber()   
                                                                        //{  
                                                                         //   var value = document.getElementById('mobile1');
                                                                         //   if (isNaN(value))   
                                                                         //   {  
                                                                         //       return "true";  
                                                                         //   }   
                                                                         //   else   
                                                                         //   {  
                                                                         //       document.getElementById("mobile1-message").innerHTML = 'invalid Contact number';
                                                                         //   }  
                                                                        //}; 
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
        </div>
    </div>
</div>
    <?php
    include('includes/include_once/footer.php');
    ?>