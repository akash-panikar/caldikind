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
                                    <input type="email" class="form-control" name="email" id="email" onchange="validateEmail()">
                                    <p style="color:red" id="email-message"></p>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" name="primarycontact" id="mobile" onchange="ValidateNo()" onkeypress="return isNumber(event)" required>
                                    <p style="color:red" id="mobile-message"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Alternate Contact Number</label>
                                    <input type="phone" class="form-control" name="alternatecontact" id="mobile1" onchange="AlternateMobileNo()" onkeypress="return isNumber(event)">
                                    <p style="color:red" id="mobile1-message"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Gender<span style="color:red">*</span></label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="0" selected disabled>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <p id="gender-message"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="phone" class="form-control" name="address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEnq">Enquiry Type<span style="color:red">*</span></label>
                                    <select id="inputEnq" class="form-control" name="enqtype" required>
                                        <option value="0" selected>Choose...</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Walk-IN">Walk-IN</option>
                                        <option value="Social Media">Social Media</option>
                                    </select>
                                    <p id="enquiry-message"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Remark</label>
                                    <textarea type="text" class="form-control" name="remark"></textarea>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" onclick="dropdownCheck()">submit</button>
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
                                            $data = "SELECT * FROM `gymenquiry` WHERE status='Active' ORDER BY `gymenquiry`.`date` DESC "; //SELECT * FROM gymenquiry WHERE status='Active' ORDER BY vID DESC";
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
                                                        <!--<a class="fa fa-plus btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="join" name="join"></a>-->
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
                                                                        
                                                                        // -------------------------email validation -----------------------------
                                                                            function validateEmail() {
                                                                                //var email = document.emailform.email.value;
                                                                                var email = document.getElementById("email").value;
                                                                                if(email.indexOf('@')<=0){
                                                                                        document.getElementById('email-message').innerHTML="Invalid email address";
                                                                                        return false;
                                                                                }     
                                                                                else if ((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')) {
                                                                                        document.getElementById('email-message').innerHTML="Invalid email address";
                                                                                        return false;
                                                                                }
                                                                                else {
                                                                                    document.getElementById('email-message').innerHTML="";
                                                                                }
                                                                            }

                                                                        // ---------------------------------- Mobile Number valiadtion --------------------------------
                                                                        function isNumber(evt) {
                                                                            evt = (evt) ? evt : window.event;
                                                                            var numbertype = (evt.which) ? evt.which : evt.keyCode;
                                                                            if (numbertype > 31 && (numbertype < 48 || numbertype > 57)) {
                                                                                document.getElementById("mobile-message").innerHTML = 'Please enter only Numbers. Not any String or Special Char';
                                                                              return false;
                                                                            }
                                                                            return true;
                                                                          }
                                                                          function ValidateNo() {
                                                                            var moNumber = document.getElementById('mobile');
                                                                            if (moNumber.value == "" || moNumber.value == null) {
                                                                                document.getElementById("mobile-message").innerHTML = 'Please enter your Mobile No.';
                                                                              return false;
                                                                            }
                                                                            if (moNumber.value.length < 10 || moNumber.value.length > 10) {
                                                                                document.getElementById("mobile-message").innerHTML = 'Mobile Number is not valid, Enter Working 10 Digit Mobile Number';
                                                                              return false;
                                                                            }
                                                                            document.getElementById("mobile-message").innerHTML = '';
                                                                            return true;
                                                                          }
                                                                            // --------------------- Alternate mobile number ------------------------------------------
                                                                          function AlternateMobileNo() {
                                                                            var moNumber = document.getElementById('mobile1');
                                                                            if (moNumber.value == "" || moNumber.value == null) {
                                                                                document.getElementById("mobile1-message").innerHTML = 'Please enter your Mobile No.';
                                                                              return false;
                                                                            }
                                                                            if (moNumber.value.length < 10 || moNumber.value.length > 10) {
                                                                                document.getElementById("mobile1-message").innerHTML = 'Mobile Number is not valid, Enter Working 10 Digit Mobile Number';
                                                                              return false;
                                                                            }
                                                                            document.getElementById("mobile1-message").innerHTML = '';
                                                                            return true;
                                                                          }
                                                                          // ---------------------------  Gender -------------------------------------------------------
                                                                          function dropdownCheck()
                                                                          {
                                                                            var genderCheck = document.getElementById("gender");
                                                                            var selectedOption = genderCheck.options[genderCheck.selectedIndex].value;
                                                                            if(selectedOption == 0) {
                                                                                document.getElementById("gender-message").innerHTML = 'Please select gender';
                                                                                document.getElementById("gender-message").style.color ="red";
                                                                            } else {
                                                                                document.getElementById("gender-message").innerHTML = '';
                                                                            }
                                                                            
                                                                            var typeCheck = document.getElementById("inputEnq");
                                                                            var selectedVal = typeCheck.options[typeCheck.selectedIndex].value;
                                                                            if(selectedVal == 0){
                                                                                document.getElementById("enquiry-message").innerHTML = 'Please select enquiry type';
                                                                                document.getElementById("enquiry-message").style.color ="red";
                                                                            } else {
                                                                                document.getElementById("enquiry-message").innerHTML = '';
                                                                            }
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