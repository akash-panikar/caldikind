<?php
session_start(); 
if(!isset($_SESSION['fullName']))
{
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
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
    </div>

    <?php
    include('includes/include_once/footer.php');
    ?>
</div>