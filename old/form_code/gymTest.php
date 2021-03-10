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
                <div>
                    <div class="card">
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="addClient.php">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Gym Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientPaymentTest.php">Payment Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientSummary.php">Summary</a>
                        </li>
                    </ul>
                        <div class="card-body" data-spy="scroll">
                            <form action="process/clientProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
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
                                <a type="button" class="btn btn-primary m-t-10" name="submit" href="test.php">Back</a>
                                <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Next</button>
                            </form>
                        </div>
                    </div>
                    <!-- Row -->
                    <!-- End PAge Content -->
                </div>
            </div>
            <!-- ============================================================== -->

            
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /><!-- Made by <a href="https://tryon.caldikind.xyz">Akash</a>--> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>