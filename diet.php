<?php
session_start();
if (!isset($_SESSION['fullName'])) {
    header('Location:index.php');
}
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Diet Plan</a></li>
                        <li class="breadcrumb-item active">User Details</li>
                    </ol>
                </div>
            </div>
            <div>
                <div class="" id="">
                    <div class="card card-body">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault01">Full Name</label>
                                    <input type="text" class="form-control" id="validationDefault01" placeholder="Enter Name Here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault02">Email</label>
                                    <input type="email" class="form-control" id="validationDefault02" placeholder="@gmail.com" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">CONTACT NO</label>
                                    <input type="text" class="form-control" id="validationDefault03"placeholder="Enter Number Here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">City / Locality</label>
                                    <input type="text" class="form-control" id="validationDefault04" placeholder="Mention Here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Gender</label>
                                    <select class="form-control" id="validationDefault05" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>other</option>
                                        <option>Not prefer to say</option>
                                    </select>
                                    <p style="color: red;"></p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Program Details</label>
                                    <select class="form-control" id="validationDefault06" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Monthly</option>
                                        <option>Quarterly</option>
                                        <option>06 Months</option>
                                        <option>Yearly</option>
                                    </select>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="validationDefault01">Height</label>
                                    <input type="text" class="form-control" id="validationDefault07" placeholder="in cm" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3 ">
                                    <label for="validationDefault01">Weight</label>
                                    <input type="text" class="form-control" id="validationDefault08" placeholder="in kg" required>
                                    <p style="color: red;"></p>
                                </div>

                                <div class="col-md-6 mb-3 ">
                                    <label for="validationDefault01">Medical History</label>
                                    <input type="text" class="form-control" id="validationDefault09" placeholder="Mention Here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">TARGET</label>
                                    <select class="form-control" id="validationDefault10" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>WEIGHT LOSS</option>
                                        <option>MUSCLE GAIN</option>
                                        <option>BULKING</option>
                                        <option>TRANSFORMATION</option>
                                        <option>COMPETITION PREPARATION</option>
                                        <option>LEAN MUSCLE GAIN</option>
                                        <option>SHREDDING</option>
                                    </select>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">EARLY MORNING:</label>
                                    <input type="text" class="form-control" id="validationDefault11" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">1st MEAL:</label>
                                    <input type="text" class="form-control" id="validationDefault12" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">2nd MEAL:</label>
                                    <input type="text" class="form-control" id="validationDefault13" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div><!-- comment -->
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">3rd MEAL:</label>
                                    <input type="text" class="form-control" id="validationDefault14" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">PRE-WORKOUT:</label>
                                    <input type="text" class="form-control" id="validationDefault015" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">POST-WORKOUT:</label>
                                    <input type="text" class="form-control" id="validationDefault16" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-3 ">
                                    <label for="validationDefault01">LAST MEAL::</label>
                                    <input type="text" class="form-control" id="validationDefault17" placeholder="Type here" required>
                                    <p style="color: red;"></p>
                                </div>
                                <div class="col-md-12 mb-6 form-group">
                                    <label for="exampleFormControlTextarea1" value="1">NOTE:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" value="1" rows="8">
    1.  YOU CAN COOK YOUR MEAL WITH LITTLE BIT OF OLIVE OIL, MASALA & SAUCES.
    2.  FOLLOW THIS ROUTINE EVERY DAY INCLUDING “SUNDAY”.
    3.  KEEP INCREASING THE AMOUNT OF WATER INTAKE.
    4.  KEEP VARATION IN YOUR MEAL’S SO YOU WON’T GET BORED OF IT.
    5.  LUKE WARM WATER HELPS YOU WITH BETTER DIGESTION.
             **EAT HEALTY STAY FIT**
                                    </textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>        
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>
