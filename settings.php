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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add package
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="process/packageProcess.php" method="POST">
                            <div class="form-group form-row">
                                <div class="col-md-4">
                                    <label>Package Name</label>
                                    <input type="text" class="form-control" name="packname" placeholder="Package name" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Description">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                                </div>
                                <button class="btn btn-primary" type="submit" name="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>-->
            </div>
            <!--            <div class="row">
                            <div class="col-lg-4 col-xlg-3 col-md-5">
                                <div class="card">
                                    <div class="card-body">
                                        <center class="m-t-30"> <img src="<?//='images/'.$result['profilePicture'];?>" class="img-circle"
                                                                     width="150" />
                                            <input type="file" >
                                            <button class="btn btn-outline-warning m-t-20">change Logo</button>
                                        </center>
                                    </div>
                                </div>
                            </div>-->
            <!--                <div class="form-group col-md-3">
                                <label>Contact Number<span style="color:red">*</span></label>
                                <input type="text" name="sprimaryno" class="form-control" onchange="ValidateNo()" onkeypress="return isNumber(event)" required>
                                <p style="color:red" id="mobile-message"></p>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Alternate Number</label>
                                <input type="text" name="salternateno" class="form-control" id="mobile1" onchange="ValidateNo()" required>
                                <p style="color:red" id="moible1-message"></p>
                            </div>
                            <div class="form-group col-md-2">
                                <button class="btn btn-outline-warning m-t-30">update</button>
                            </div>
                            <div class="form-group col-md-2">
                                <textarea></textarea>
                            </div>
                        </div>-->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="<?//='images/'.$result['profilePicture'];?>" class="img-circle"
                                                         width="150" />
                                <input type="file" >
                                <button class="btn btn-outline-warning m-t-20">change Logo</button>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 ">
                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label>Contact Number</label>
                                    <input type="text" name="sprimaryno" class="form-control">
                                    <p style="color:red" id="mobile-message"></p>
                                </div>
                                <div class="form-group col-md-5">
                                    <label>Alternate Number</label>
                                    <input type="text" name="salternateno" class="form-control" id="mobile1" onchange="ValidateNo()" required>
                                    <p style="color:red" id="moible1-message"></p>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-outline-warning m-t-30">update</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-10">
                                <label>Gym Address</label>
                                <textarea class="form-control" name="remark" id="remark"></textarea>
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-outline-warning" style="margin-top: 50px;">update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Column -->
            </div>

        </div>

        <?php
        include('includes/include_once/footer.php');
        ?>
    </div>