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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales Chart and browser state-->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div>
                                    <h5 class="card-title m-b-0">Sales Chart</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline text-center font-12">
                                        <li><i class="fa fa-circle text-success"></i> SITE A</li>
                                        <li><i class="fa fa-circle text-info"></i> SITE B</li>
                                        <li><i class="fa fa-circle text-primary"></i> SITE C</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="" id="sales-chart" style="height: 355px;"></div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">Our Visitors</h5>
                                <div class="ml-auto">
                                    <select class="custom-select b-0">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div id="visitor" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-purple"></i> Tablet</li>
                                <li><i class="fa fa-circle text-success"></i> Desktops</li>
                                <li><i class="fa fa-circle text-info"></i> Mobile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>