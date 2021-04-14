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
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle"
                                                         width="150" />
                                <h4 class="card-title m-t-10"><?php echo $_SESSION['fullName']; ?></h4>
                                <h6 class="card-subtitle"><?php // echo $_SESSION['role'];     ?></h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4">
                                        <button class="btn btn-success">Change</button>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Fullname</label>
                                        <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault02">E-Mail</label>
                                        <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationDefault03">Contact No</label>
                                        <input type="text" class="form-control" id="validationDefault03" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault04">State</label>
                                        <select class="custom-select" id="validationDefault04" required>
                                            <option selected disabled value="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault05">Zip</label>
                                        <input type="text" class="form-control" id="validationDefault05" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                        <label class="form-check-label" for="invalidCheck2">
                                            Agree to terms and conditions
                                        </label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>

        </div>
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
</div>
<?php
include('includes/include_once/footer.php');
?>