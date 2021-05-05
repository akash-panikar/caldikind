<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
?>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
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
                    

                    <div class="card">
                        <div class="card-body">
                            <?php //echo $message; ?>
                            <form method="POST" id="register_form" action="/process/clientProcess.php" enctype="multipart/form-data">
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
                                                            <input type="text" name="fname" class="form-control" id="fullname">
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>Contact Number<span style="color:red">*</span></label>
                                                                <input type="text" name="primaryno" class="form-control" id="contact"">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Alternate Number</label>
                                                                <input type="text" name="alternateno" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail<span style="color:red">*</span></label>
                                                            <input type="email" name="email" class="form-control" id="email" required>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-5">
                                                        <center class="m-t-10">
                                                            <img src="<?= 'images/' . $result['profilePicture']; ?>" class="img-circle"width="150px" id="profile-img-tag"/>
                                                            <input class="input-img form-control m-t-40" id="profile-img" type="file" name="profilePic" onchange="imageValidation('profile-img')">

                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 1<span style="color:red">*</span></label>
                                                    <input type="text" name="addr1" class="form-control" id="pfullname">
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" name="addr2" class="form-control" id="pcontact">
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group col-md-4">
                                                        <label >Location<span style="color:red">*</span></label>
                                                        <input type="text" name="location" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >District<span style="color:red">*</span></label>
                                                        <input type="text" name="district" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Pincode<span style="color:red">*</span></label>
                                                        <input type="text" name="pincode" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Date of Birth<span style="color:red">*</span></label>
                                                        <input type="date" name="dob" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Gender<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" name="gender">
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
                                                            <option value="General Membership">General Membership</option>
                                                            <option value="Personal Training">Personal Training</option>
                                                            <option value="Premium Membership">Premium Membership</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Trainer Name<span style="color:red">*</span></label>
                                                        <select id="trianername" class="form-control" required name="trainer">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="Reuben">Reuben</option>
                                                            <option value="Vaibhav">Vaibhav</option>
                                                            <option value="Shriraj">Shriraj</option>
                                                            <option value="Neeke">Neeke</option>
                                                            <option value="Scully">Scully</option>
                                                            <option value="Astaha">Astaha</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Package Name<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="packname">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="Muscels Build-up Silver">Muscles Build-up Silver</option>
                                                            <option value="Muscles Build-up Gold">Muscles Build-up Gold</option>
                                                            <option value="Weight Loss Baby Steps">Weight Loss Baby Steps</option>
                                                            <option value="Weight Loss Power">Weight Loss Power</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label >Package Duration<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="duration">
                                                            <option selected disabled>Choose...</option>
                                                            <option value="1 Month">1 Month</option>
                                                            <option value="3 Month">3 Month</option>
                                                            <option value="6 Month">6 Month</option>
                                                            <option value="1 Year">1 Year</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Batch Timing<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" required name="batch">
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
                                                        <input type="date" name="enddate" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label style="color:red;">Incase of Emergency Contact:</label>
                                                        <br>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Contact Person</label>
                                                        <input type="text" name="emgname" class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label >Contact Number</label>
                                                        <input type="text" name="emgnum" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Medical Report (Optional)</label>
                                                        <input type="file" name="medicalrpt" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label >Medical Problem (Optional)</label>
                                                        <textarea type="text" name="medicalprblm" class="form-control"></textarea>
                                                    </div>
                                                </div>
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
                                                            <option value="cash" >Cash</option>
                                                            <option value="credit card">Credit Card</option>
                                                            <option value="upi">UPI</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Total Amount</label>
                                                        <input type="text" name="totalamount" class="form-control" id="cert">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Paid</label>
                                                        <input type="text" name="amountpaid" class="form-control" id="cert">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Due</label>
                                                        <input type="text" name="amtdue" class="form-control" id="cert">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Due Date</label>
                                                        <input type="text" name="duedate" class="form-control" id="cert">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Transaction Number</label>
                                                        <input type="text" class="form-control" name="transno" id="transno">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h5 style="color:red;">Incase of Card/UPI payment, first make successful transaction then enter transaction number </h5>
                                                    </div>
                                                </div>
                                                
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
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>
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