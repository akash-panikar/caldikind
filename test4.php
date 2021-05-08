<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');

$displayQuery = "SELECT * FROM gymattendance";
$execDisplayQuery = mysqli_query($connect, $displayQuery);
$chartData = '';
while($row = mysqli_fetch_array($result))
{
    $chartData.= "{ year:'".$row["year"]."',profit:".$row["profit"]
}
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
                            <div class="" id="sales-chart" style="height: 339px;"></div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">Total Member</h5>
                            </div>
                            <div id="members" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-info"></i> General</li>
                                <li><i class="fa fa-circle text-purple"></i> Personal Training</li>
                                <li><i class="fa fa-circle text-success"></i> Premium </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">Staff Attendance</h5>
                            </div>
                            <div id="attendance" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-info"></i> Present</li>
                                <li><i class="fa fa-circle text-purple"></i> Absent</li>
                                <li><i class="fa fa-circle text-success"></i> Leave</li>
                            </ul>
                        </div>
                    </div>
                </div>
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
                            <div class="" id="income"></div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                
            </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>