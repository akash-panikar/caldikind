<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
$rowID = $_GET['id'];
$searchQuery = "SELECT * from gymstaff WHERE sID=$rowID";
$execQuery = mysqli_query($connect, $searchQuery);
$result = mysqli_fetch_assoc($execQuery);
?>
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
                        <h3 class="text-themecolor">Staff Profile</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?='images/'.$result['profilePicture'];?>" class="img-circle"
                                        width="150" />
                                    <h4 class="card-title m-t-10"><?=$result['sName'];?></h4>
                                    <h6 class="card-subtitle"><?php echo $result['sDesignation'];?></h6>
                                   <!--<a type='button' class="btn btn-success" name="edit" href="editStaff.php?id=<?= $result['sID']; ?>">Edit</a>-->
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?=$result['sName'];?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" value="<?= $result['sEmail']; ?>"disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Mobile Number</label>
                                        <div class="col-md-12">
                                            <input type="test" value="<?= $result['sPrimaryContact']; ?>" class="form-control form-control-line"disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Alternate Mobile No</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-line" value="<?=$result['sAlternateContact']; ?>"disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" disabled><?php echo $result['sAddress1']. '&#13;&#10;'; ?><?php echo $result['sAddress2']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <a type='button' class="btn btn-primary" name="edit" href="editStaff.php?id=<?= $result['sID']; ?>">Update Profile</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>

        </div>
        <!-- ============================================================== -->
            <?php
    include('includes/include_once/footer.php');
    ?>