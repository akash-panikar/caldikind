<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include 'includes/include_once/db.php';
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Client</li>
                    </ol>
                </div>
            </div>
            <div>
<?php
$rowID = $_GET['id'];
 $query = mysqli_query($connect, "SELECT * FROM temp_client WHERE tID =$rowID");
 $result = mysqli_fetch_assoc($query);
?>
                <div  id="clientform" >
                    <div class="card">
                        <div class="card-body">
                            <?php //echo $message; ?>
                            <form method="POST" id="register_form" action="process/clientProcess.php" enctype="multipart/form-data">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" id="list_personal_details" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Personal Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="list_GymDetails" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Gym Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="list_payment_details" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Payment Details</a>
                                    </li>
                                </ul>
                                <div class="tab-content" style="margin-top:16px;">
                                    <div class="tab-pane active" id="login_details">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <label>Fullname<span style="color:red">*</span></label>
                                                            <input type="text" name="fname" class="form-control" id="fullname" value="<?=$result['fullName'];?>" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>Contact Number<span style="color:red">*</span></label>
                                                                <input type="text" name="primaryno" class="form-control" id="mobile" value="<?=$result['contactNo'];?>"
                                                                       onchange="ValidateNo()" onkeypress="return isNumber(event)" required>
                                                                <p style="color:red" id="mobile-message"></p>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Alternate Number</label>
                                                                <input type="text" name="alternateno" class="form-control" id="mobile1" value="<?=$result['altContactNo'];?>"
                                                                       onchange="AlternateMobileNo()" onkeypress="return isNumber(event)">
                                                                <p style="color:red" id="mobile1-message"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail<span style="color:red">*</span></label>
                                                            <input type="email" name="email" class="form-control" id="email" value="<?=$result['email'];?>"
                                                                   onchange="validateEmail()" required>
                                                            <p style="color:red" id="email-message"></p>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-5">
                                                        <center class="m-t-10">
                                                            <img src="<?= 'images/' . $result['profilePicture']; ?>" class="img-circle"width="150px" id="profile-img-tag"/>
                                                            <input class="input-img form-control m-t-40" id="profile-img" type="file" name="profilePic" onchange="imageValidation('profile-img')">

                                                        </center>
                                                    </div>
                                                </div>
                                                <p id='result'></p>
                                                <div class="form-group">
                                                    <label>Address 1<span style="color:red">*</span></label>
                                                    <input type="text" name="addr1" class="form-control" id="pfullname" value="<?=$result['add1'];?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" name="addr2" class="form-control" id="pcontact" value="<?=$result['add2'];?>">
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group col-md-4">
                                                        <label >Location<span style="color:red">*</span></label>
                                                        <input type="text" name="location" class="form-control" value="<?=$result['location'];?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >District<span style="color:red">*</span></label>
                                                        <input type="text" name="district" class="form-control" value="<?=$result['district'];?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Pincode<span style="color:red">*</span></label>
                                                        <input type="text" name="pincode" class="form-control" value="<?=$result['pincode'];?>" required>
                                                        <p style="color:red">invalid pincode</p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Date of Birth<span style="color:red">*</span></label>
                                                        <input type="date" name="dob" class="form-control" value="<?=$result['dob'];?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Gender<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" name="gender" required>
                                                            <option selected disabled>Choose...</option>
                                                            <option value="Male" <?php echo ($result['gender']== 'Male')?' selected':'';?>>Male</option>
                                                            <option value="Female" <?php echo ($result['gender']== 'Female')?' selected':'';?>>Female</option>
                                                            <option value="Other" <?php echo ($result['gender']== 'Other')?' selected':'';?>>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label > Photo ID Proof<span style="color:red">*</span></label>
                                                        <input type="file" name="idproof" class="form-control" src="<?= 'images/' . $result['photoID']; ?>"
                                                               id="idproof" onchange="imageValidation('idproof')">
                                                    </div>
                                                </div>
                                                <a type="button"class="btn btn-primary m-t-10" id="btn_login_details">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="personal_details">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row ">
                                                    <div class="form-group col-md-6">
                                                        <label >Membership Type<span style="color:red">*</span></label>
                                                        <select id="membertype" class="form-control" required name="membership" onchange="changeTrainerStatus();">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="General Membership" <?php echo ($result['memberType']== 'General Membership')?' selected':'';?>>General Membership</option>
                                                            <option value="Personal Training" <?php echo ($result['memberType']== 'Personal Training')?' selected':'';?>>Personal Training</option>
                                                            <option value="Premium Membership" <?php echo ($result['memberType']== 'Premium Membership')?' selected':'';?>>Premium Membership</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Trainer Name<span style="color:red">*</span></label>
                                                        <select id="trianername" class="form-control" required name="trainer">
                                                            <?php
                                                            $selectTrainer = "SELECT sName FROM gymstaff WHERE sDesignation ='Trainer'";
                                                            $execTrainQuery = mysqli_query($connect, $selectTrainer);
                                                            echo "<option disabled>Choose...</option>"; 
                                                           while ($dropdownTrainer = mysqli_fetch_array($execTrainQuery)) {
                                                                echo "<option value='" . $dropdownTrainer['sName'] . "'>" . $dropdownTrainer['sName'] . "</option>";
                                                            }
                                                            ?>   
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Package Name<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="packname">
                                                            <?php
                                                            $selectPackages = 'SELECT * FROM gympackage';
                                                            $execPackQuery = mysqli_query($connect, $selectPackages);
                                                            echo "<option selected disabled>Choose...</option>";
                                                            while ($dropdownPackage = mysqli_fetch_array($execPackQuery)) {
                                                                echo "<option value='" . $dropdownPackage['pName'] . "'>" . $dropdownPackage['pName'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Package Duration<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="duration">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1 Month" <?php echo ($result['packageDuration']== '1 Month')?' selected':'';?>>1 Month</option>
                                                            <option value="3 Month" <?php echo ($result['packageDuration']== '3 Month')?' selected':'';?>>3 Month</option>
                                                            <option value="6 Month" <?php echo ($result['packageDuration']== '6 Month')?' selected':'';?>>6 Month</option>
                                                            <option value="1 Year" <?php echo ($result['packageDuration']== '1 Year')?' selected':'';?>>1 Year</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Batch Timing<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="batch">
                                                            <option selected disabled>Choose...</option>
                                                            <option disabled>Morning</option>
                                                            <option value="6:30 am - 7:30 am" <?php echo ($result['batchTime']== '6:30 am - 7:30 am')?' selected':'';?>>6:30 am - 7:30 am</option>
                                                            <option value="7:30 am - 8:30 am" <?php echo ($result['batchTime']== '7:30 am - 8:30 am')?' selected':'';?>>7:30 am - 8:30 am</option>
                                                            <option value="8:30 am - 9:30 am" <?php echo ($result['batchTime']== '8:30 am - 9:30 am')?' selected':'';?>>8:30 am - 9:30 am</option>
                                                            <option value="9:30 am - 10:30 am" <?php echo ($result['batchTime']== '9:30 am - 10:30 am')?' selected':'';?>>9:30 am - 10:30 am</option>
                                                            <option disabled>Evening</option>
                                                            <option value="4:00 pm - 5:00 pm" <?php echo ($result['batchTime']== '4:00 pm - 5:00 pm')?' selected':'';?>>4:00 pm - 5:00 pm</option>
                                                            <option value="5:00 pm - 6:00 pm" <?php echo ($result['batchTime']== '5:00 pm - 6:00 pm')?' selected':'';?>>5:00 pm - 6:00 pm</option>
                                                            <option value="6:00 am - 7:00 pm" <?php echo ($result['batchTime']== '6:00 am - 7:00 pm')?' selected':'';?>>6:00 pm - 7:00 pm</option>
                                                            <option value="7:00 am - 8:00 pm" <?php echo ($result['batchTime']== '7:00 am - 8:00 pm')?' selected':'';?>>7:00 pm - 8:00 pm</option>
                                                            <option value="8:00 am - 9:00 pm" <?php echo ($result['batchTime']== '8:00 am - 9:00 pm')?' selected':'';?>>8:00 pm - 9:00 pm</option>
                                                        </select>
                                                    </div>  

                                                    <div class="form-group col-md-4">
                                                        <label >Start Date<span style="color:red">*</span></label>
                                                        <input type="date" name="startdate" class="form-control" value="<?=$result['startDate'];?>" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >End Date<span style="color:red">*</span></label>
                                                        <input type="date" name="enddate" class="form-control" value="<?=$result['endDate'];?>" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label style="color:red;">Incase of Emergency Contact:</label>
                                                        <br>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Contact Person</label>
                                                        <input type="text" name="emgname" class="form-control" value="<?=$result['EmgContactName'];?>">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Contact Number</label>
                                                        <input type="text" name="emgnum" class="form-control" value="<?=$result['EmgContactNo'];?>">
                                                        <p style="color:red">invalid Contact number</p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Medical Report (Optional)</label>
                                                        <input type="file" name="medicalrpt" class="form-control" value="<?=$result['medicalReport'];?>">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label >Medical Problem (Optional)</label>
                                                        <textarea type="text" name="medicalprblm" class="form-control"><?=$result['medicalProblem'];?></textarea>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    function changeTrainerStatus() {
                                                        if (document.getElementById('membertype').value == 'General Membership') {
                                                            document.getElementById('trianername').disabled = 'true';
                                                        } else {
                                                            document.getElementById('trianername').disabled = '';
                                                        }
                                                    }
                                                </script>
                                                <a type="button" class="btn btn-primary m-t-10" id="previous_btn_personal_details">Back</a>
                                                <a type="button" class="btn btn-primary m-t-10" id="btn_personal_details">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="contact_details">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row ">
                                                    <div class="form-group col-md-4">
                                                        <label >Payment Mode<span style="color:red">*</span></label>
                                                        <select id="paymode" class="form-control" required name="mode" onclick="changeTextBox();">
                                                            <option selected disabled>Select...</option>
                                                            <option value="Cash" <?php echo ($result['paymentMode']== 'Cash')?' selected':'';?> >Cash</option>
                                                            <option value="Credit Card" <?php echo ($result['paymentMode']== 'Credit Card')?' selected':'';?>>Credit Card</option>
                                                            <option value="UPI" <?php echo ($result['paymentMode']== 'UPI')?' selected':'';?>>UPI</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Total Amount</label>
                                                        <input type="text" name="totalamount" class="form-control" value="<?=$result['totalAmount'];?>"
                                                               id="totalamt" oninput="calculateAmount()">
                                                        <p style="color:red">invalid amount</p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Paid</label>
                                                        <input type="text" name="amountpaid" class="form-control" value="<?=$result['amountPaid'];?>"
                                                               id="amtpaid" oninput="calculateAmount()">
                                                        <p style="color:red">invalid amount</p>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Due</label>
                                                        <input type="text" name="amtdue" class="form-control" value="<?=$result['amountDue'];?>"
                                                               id="amtdue" value="" readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Due Date</label>
                                                        <input type="date" name="duedate" class="form-control" value="<?=$result['dueDate'];?>" id="duedate">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Transaction Number</label>
                                                        <input type="text" class="form-control" value="<?=$result['transactionNo'];?>" name="transno" id="transno">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h5 style="color:red;">Incase of Card/UPI payment, first make successful transaction then enter transaction number </h5>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    function calculateAmount() {
                                                        var totalAmount = document.getElementById("totalamt").value;
                                                        var paidAmount = document.getElementById("amtpaid").value;
                                                        var balanceAmount = totalAmount - paidAmount;
                                                        //alert(balanceAmount);
                                                        document.getElementById("amtdue").value = balanceAmount;
                                                    }
                                                    document.getElementById("generatePassword").addEventListener("click", function () {
                                                        random_password = random_password_generate(16, 8);
                                                        document.getElementById("password").value = random_password;
                                                    });

                                                    function changeTextBox() {
                                                        if (document.getElementById('paymode').value == 'cash') {
                                                            document.getElementById('transno').disabled = 'true';
                                                        } else {
                                                            document.getElementById('transno').disabled = '';
                                                        }
                                                    }
                                                    // -------------------------email validation -----------------------------
                                                    function validateEmail() {
                                                        //var email = document.emailform.email.value;
                                                        var email = document.getElementById("email").value;
                                                        if (email.indexOf('@') <= 0) {
                                                            document.getElementById('email-message').innerHTML = "Invalid email address";
                                                            return false;
                                                        } else if ((email.charAt(email.length - 4) != '.') && (email.charAt(email.length - 3) != '.')) {
                                                            document.getElementById('email-message').innerHTML = "Invalid email address";
                                                            return false;
                                                        } else {
                                                            document.getElementById('email-message').innerHTML = "";
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
                                                    function isNumber(evt) {
                                                        evt = (evt) ? evt : window.event;
                                                        var numbertype = (evt.which) ? evt.which : evt.keyCode;
                                                        if (numbertype > 31 && (numbertype < 48 || numbertype > 57)) {
                                                            document.getElementById("mobile1-message").innerHTML = 'Please enter only Numbers. Not any String or Special Char';
                                                            return false;
                                                        }
                                                        return true;
                                                    }
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
                                                        if (selectedOption == 0) {
                                                            document.getElementById("gender-message").innerHTML = 'Please select gender';
                                                            document.getElementById("gender-message").style.color = "red";
                                                        }

                                                        var typeCheck = document.getElementById("inputEnq");
                                                        var selectedVal = typeCheck.options[typeCheck.selectedIndex].value;
                                                        if (selectedVal == 0) {
                                                            document.getElementById("enquiry-message").innerHTML = 'Please select enquiry type';
                                                            document.getElementById("enquiry-message").style.color = "red";
                                                        }
                                                    }
                                                </script>
                                                <a type="button" class="btn btn-primary m-t-10" id="previous_btn_contact_details">Back</a>
                                                <button type="submit" class="btn btn-primary m-t-10" name="submit">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function () {

                $('#btn_login_details').click(function () {
                    $('#list_personal_details').removeClass('active active_tab1');
                    $('#list_personal_details').removeAttr('href data-toggle');
                    $('#login_details').removeClass('active');
                    $('#list_personal_details').addClass('inactive_tab1');
                    $('#list_GymDetails').removeClass('inactive_tab1');
                    $('#list_GymDetails').addClass('active_tab1 active');
                    $('#list_GymDetails').attr('href', '#personal_details');
                    $('#list_GymDetails').attr('data-toggle', 'tab');
                    $('#personal_details').addClass('active in');

                });

                $('#previous_btn_personal_details').click(function () {
                    $('#list_GymDetails').removeClass('active active_tab1');
                    $('#list_GymDetails').removeAttr('href data-toggle');
                    $('#personal_details').removeClass('active in');
                    $('#list_GymDetails').addClass('inactive_tab1');
                    $('#list_personal_details').removeClass('inactive_tab1');
                    $('#list_personal_details').addClass('active_tab1 active');
                    $('#list_personal_details').attr('href', '#login_details');
                    $('#list_personal_details').attr('data-toggle', 'tab');
                    $('#login_details').addClass('active in');
                });

                $('#btn_personal_details').click(function () {
                    $('#list_GymDetails').removeClass('active active_tab1');
                    $('#list_GymDetails').removeAttr('href data-toggle');
                    $('#personal_details').removeClass('active');
                    $('#list_GymDetails').addClass('inactive_tab1');
                    $('#list_payment_details').removeClass('inactive_tab1');
                    $('#list_payment_details').addClass('active_tab1 active');
                    $('#list_payment_details').attr('href', '#contact_details');
                    $('#list_payment_details').attr('data-toggle', 'tab');
                    $('#contact_details').addClass('active in');
                });

                $('#previous_btn_contact_details').click(function () {
                    $('#list_payment_details').removeClass('active active_tab1');
                    $('#list_payment_details').removeAttr('href data-toggle');
                    $('#contact_details').removeClass('active in');
                    $('#list_payment_details').addClass('inactive_tab1');
                    $('#list_GymDetails').removeClass('inactive_tab1');
                    $('#list_GymDetails').addClass('active_tab1 active');
                    $('#list_GymDetails').attr('href', '#personal_details');
                    $('#list_GymDetails').attr('data-toggle', 'tab');
                    $('#personal_details').addClass('active in');
                });



            });
        </script>
        <script src="js/validation.js"></script>
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>