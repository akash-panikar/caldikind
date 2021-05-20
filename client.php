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
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#clientform" aria-expanded="false">
                        Add Client
                    </button>
                </p>
                <div class="collapse" id="clientform"  data-spy="scroll">
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
                                                            <input type="text" name="fname" class="form-control" id="fullname" required>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label>Contact Number<span style="color:red">*</span></label>
                                                                <input type="text" name="primaryno" class="form-control" id="contact" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Alternate Number</label>
                                                                <input type="text" name="alternateno" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mail<span style="color:red">*</span></label>
                                                            <input type="email" name="email" class="form-control" id="email"oninput="checkEmail()" required>
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
                                                    <input type="text" name="addr1" class="form-control" id="pfullname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <input type="text" name="addr2" class="form-control" id="pcontact">
                                                </div>
                                                <div class="row ">
                                                    <div class="form-group col-md-4">
                                                        <label >Location<span style="color:red">*</span></label>
                                                        <input type="text" name="location" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >District<span style="color:red">*</span></label>
                                                        <input type="text" name="district" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Pincode<span style="color:red">*</span></label>
                                                        <input type="text" name="pincode" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Date of Birth<span style="color:red">*</span></label>
                                                        <input type="date" name="dob" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label >Gender<span style="color:red">*</span></label>
                                                        <select id="inputState" class="form-control" name="gender" required>
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
                                                    <!--  <div class="form-check">
                                                          <input class="form-check-input" type="checkbox" id="status" name="status" value="YES">
                                                          <label class="form-check-label" for="status">
                                                              Create Account<span>  (Optional)</span>
                                                          </label>
                                                      </div>-->
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
                                                            <?php
                                                            $selectTrainer = "SELECT sName FROM gymstaff WHERE sDesignation ='Trainer'";
                                                            $execTrainQuery = mysqli_query($connect, $selectTrainer);
                                                            echo "<option selected disabled>Choose...</option>";
                                                            while ($dropdownTrainer = mysqli_fetch_array($execTrainQuery)) {
                                                                echo "<option value='" . $dropdownTrainer['sName'] . "'>" . $dropdownTrainer['sName'] . "</option>";
                                                            }
                                                            ?>   
                                                            <!--   <option selected disabled value="NA">Choose...</option>
                                                               <option value="Reuben">Reuben</option>
                                                               <option value="Vaibhav">Vaibhav</option>
                                                               <option value="Shriraj">Shriraj</option>
                                                               <option value="Neeke">Neeke</option>
                                                               <option value="Scully">Scully</option>
                                                               <option value="Astaha">Astaha</option>-->
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
                                                            <!--   <option selected disabled>Choose...</option>
                                                               <option value="Muscels Build-up Silver">Muscles Build-up Silver</option>
                                                               <option value="Muscles Build-up Gold">Muscles Build-up Gold</option>
                                                               <option value="Weight Loss Baby Steps">Weight Loss Baby Steps</option>
                                                               <option value="Weight Loss Power">Weight Loss Power</option>-->
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
                                                            <option value="cash" >Cash</option>
                                                            <option value="credit card">Credit Card</option>
                                                            <option value="upi">UPI</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Total Amount</label>
                                                        <input type="text" name="totalamount" class="form-control" id="totalamt" oninput="calculateAmountDue()">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Paid</label>
                                                        <input type="text" name="amountpaid" class="form-control" id="amtpaid" oninput="calculateAmountDue()">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Amount Due</label>
                                                        <input type="text" name="amtdue" class="form-control" id="amtdue">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Due Date</label>
                                                        <input type="date" name="duedate" class="form-control" id="duedate">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Transaction Number</label>
                                                        <input type="text" class="form-control" value="0" name="transno" id="transno">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h5 style="color:red;">Incase of Card/UPI payment, first make successful transaction then enter transaction number </h5>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">

                                                    function Calculate() {
                                                        var totalamt = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%&*/()";
                                                        var amtpaid = Math.floor(Math.random() * (max - min + 1)) + min;
                                                        var randPassword = Array(randPwLen).fill(passwordChars).map(function (x) {
                                                            return x[Math.floor(Math.random() * x.length)]
                                                        }).join('');
                                                        return randPassword;
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
                <!--</div>-->
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
                                                    <!--<th>Sr. No.</th>-->
                                                    <th>Profile</th>
                                                    <th>Member Name</th>
                                                    <th>Package Selected</th>
                                                    <th>Batch Time</th>
                                                    <th>Contact No.</th>
                                                    <!--<th>Joining Date</th>-->
                                                    <th>Trainer Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 0;
                                                $data = "SELECT tID, fullName, memberType, batchTime, packageName, contactNo, trainerName, startDate, endDate FROM temp_client";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                    ?>
                                                    <tr>
                                                        <!--<td><?php //echo ++$sr;    ?></td>-->
                                                        <td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result[''];     ?>" > </td>
                                                        <td>
                                                            <h6><?php echo $result['fullName']; ?></h6><small class="text-muted"><?php echo 'start: ' . $result['startDate']; ?></small>
                                                        </td>
                                                        <td><h6><?php echo $result['packageName']; ?></h6><small class="text-muted"><?php echo 'end: ' . $result['endDate']; ?></small></td>
                                                        <td><?php echo $result['batchTime']; ?></td>
                                                        <td><?php echo $result['contactNo']; ?></td>
                                                            <!--<td><?php //echo $result['startDate'];     ?></td>-->
                                                        <td><?php echo $result['trainerName']; ?></td>
                                                        <!--<td><?php //echo $result[''];        ?></td>-->
                                                        <td class="table-action">
                                                            <a class="fa fa-money btn btn-outline-success pay_data_<?php echo $result['tID']; ?>" name="pay" data-toggle="modal" onclick="showModal(this)" id="<?php echo $result['tID']; ?>"></a>
                                                            <a class="fa fa-pencil-square-o btn btn-outline-primary" name="edit" href="editClient.php?id=<?=$result['tID']; ?>"></a>
                                                            <a class="fa fa-trash-o btn btn-outline-danger" value="<?php echo $result['tID']; ?>" onclick="myButton(<?php echo $result['tID']; ?>)" type="button" data-toggle="modal"  data-target="#deleteModal"></a>
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
        </div>
        <!-- Modal -->
        <!---------------- Payment------------->
        <div class="modal fade" id="makepayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="pay_update">
                        <form method="POST" action="process/paymentProcess.php" id="pay_form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Client Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="cntno" name="cntno" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Balance Amount</label>
                                    <input type="text" class="form-control" name="balamount" id="balamount" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" name="amount" id="amount">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Payment Mode</label>
                                    <select class="form-control" name="paymentmode" id="paymenttype">
                                        <option selected disabled>Choose...</option>
                                        <option name="paymentmode" value="Cash">Cash</option>
                                        <option name="paymentmode" value="Card">Card</option>
                                        <option name="paymentmode" value="UPI">UPI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Remark</label>
                                <textarea class="form-control" name="remark" id="remark"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="updatePayment">Add Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-----------------Delete--------->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        
                        $('.addAttr').click(function() {
                        var id = $(this).data('id');   
                        var name = $(this).data('name'); 
                        var duration = $(this).data('duration');   
                        var date = $(this).data('date');   

                        $('#id').val(id); 
                        $('#name').val(name); 
                        $('#duration').val(duration); 
                        $('#date').val(date); 
                        } );
                        
                        //============ payment======= $(document).on('click', '.pay_data_',//
                         function showModal(e){
                            //alert('hello');
                            //e.preventDefault();
                           var pay_id = $(e).attr('id');
                           document.getElementById("pay_form").action = "process/paymentProcess.php?id=" + pay_id;
                           //alert(pay_id);
                           $.ajax({
                               url:'https://localhost/caldikind/process/paymentProcess.php',
                               type:'POST',
                               data:{pay_id:pay_id},
                               success:function(data){
                                   //alert(data);
                                    var output = JSON.parse(data);
                                   //alert(output.name);
                                   $('#id').val(output.id);
                                   $('#fname').val(output.name);
                                   $('#cntno').val(output.contactNo);
                                   $('#balamount').val(output.balAmount);                               
                                  jQuery.noConflict(); 
                                   $("#makepayment").modal('show'); 
                               }
                           })}
                        //=========== payment end ======//
                    </script>
                </div>
            </div>
        </div>
        <!------------------------->
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