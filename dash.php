<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');

$displayQuery = "SELECT COUNT(tID) AS totalNums, memberType, dtoc FROM temp_client WHERE MONTH(dtoc) = MONTH(NOW()) GROUP BY memberType";
$execDisplayQuery = mysqli_query($connect, $displayQuery);
$chartData = '';
$i=0;
$data = array();
while($row = mysqli_fetch_array($execDisplayQuery))
{
    $chartData .= "{ Member:'".$row["memberType"].",}";
    $data[$i]['memberType']=$row["memberType"];
    $data[$i]['totalNums']=$row["totalNums"];
    $i++;
}
$chartData = json_encode($data);
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
                                    <h5 class="card-title m-b-0">Monthly Activity</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline text-center font-12">
                                        <li><i class="fa fa-circle text-success"></i> Income</li>
                                        <li><i class="fa fa-circle text-info"></i> Expense</li>
                                        <li><i class="fa fa-circle text-primary"></i> Profit</li>
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
                                <h5 class="card-title m-b-0 align-self-center">New Membership</h5>
                            </div>
                            <div id="members" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-info"></i> General</li>
                                <li><i class="fa fa-circle text-purple"></i> Personal</li>
                                <li><i class="fa fa-circle text-success"></i> Premium </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="graphData" style="visibility: hidden;"><?php echo $chartData; ?></div>
            <div class="row">
                    <!-- Start Notification -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-body mailbox">
                            <h5 class="card-title">Unattended Enquiry</h5>
                            <div class="message-center ps ps--theme_default ps--active-y"
                                data-ps-id="a045fe3c-cb6e-028e-3a70-8d6ff0d7f6bd">
                                <!-- Message -->
                                <?php $enquiry = mysqli_query($connect, "SELECT * FROM gymenq ") ?>
                                <a href="#">
                                    <div class="btn btn-danger btn-circle"><i class="fa fa-internet-explorer"></i></div>
                                    <div class="mail-contnet">
                                        <h5>Akash Panikar</h5> <span class="mail-desc">Want to know gym packages</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-success btn-circle"><i class="fa fa-calendar-check-o"></i></div>
                                    <div class="mail-contnet">
                                        <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have
                                            event</span> <span class="time">9:10 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-info btn-circle"><i class="fa fa-cog"></i></div>
                                    <div class="mail-contnet">
                                        <h5>Settings</h5> <span class="mail-desc">You can customize this template as you
                                            want</span> <span class="time">9:08 AM</span>
                                    </div>
                                </a>
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-primary btn-circle"><i class="fa fa-user"></i></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span
                                            class="time">9:02 AM</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Notification -->
                    <?php
                    $attendanceQuery = "SELECT gymattendance.staffCode, gymstaff.sName, status FROM gymattendance JOIN gymstaff WHERE"
                            . " gymattendance.staffCode=gymstaff.staffCode AND DATE(date) = DATE(NOW()) ORDER BY staffCode LIMIT 1 ";
                    $execAttendanceQuery = mysqli_query($connect, $attendanceQuery);                    
                    ?><!-- Start Feeds -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Attendance</h5>
                                <ul class="feeds">
                                    <?php
                                    while ($row = mysqli_fetch_assoc($execAttendanceQuery))
                                    {  
                                        if($row['status'] === 'Present'){
                                            $status = 'Present';
                                        }
                                        else{
                                            $status = 'Absent';
                                        }
                                    ?>
                                    <li>
                                        <div class="bg-light-danger"><i class="fa fa-user"></i></div><?=$row['sName'];?><span class="text-muted"><?=$status;?></span>
                                    </li>
                                    <?php
                                    }
                                    ?>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>