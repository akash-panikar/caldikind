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
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link " href="addClient.php">Personal Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="gymTest.php">Gym Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="background-color: #fff;border-color: #dee2e6 #dee2e6 #fff;">Payment Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clientSummary.php">Summary</a>
                        </li>
                    </ul>
                    <div >
                        <div class="card-body">
                            <form action="process/clientProcess.php" method="POST" id="staff-form" enctype="multipart/form-data">
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
<!--                                    <div class="form-group col-md-4">
                                        <label >Package Type<span style="color:red">*</span></label>
                                        <select id="inputState" class="form-control" required name="marstatus">
                                            <option selected disabled>Choose...</option>
                                            <option value="Unmarried">3 Month</option>
                                            <option value="Married">6 Month</option>
                                            <option value="Divorced">1 Year</option>
                                            <option value="Widowed">2 Year</option>
                                        </select>
                                    </div>-->
                                    <div class="form-group col-md-4">
                                        <label>Start Date</label>
                                        <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>End Date</label>
                                        <input type="text" name="certification" class="form-control" id="cert" onchange="imageValidation('cert')" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Back</button>
                                <button type="submit" class="btn btn-primary m-t-10" id="submit" name="submit">Next</button>
                            </form>
                        </div>
                    </div>
                </div>
                                        <!-- Row -->
                                        <!-- End PAge Content -->
                                    </div>
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