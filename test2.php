<?php
session_start();
if (!isset($_SESSION['fullName'])) {
    header('Location:index.php');
}
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Attendance</li>
                    </ol>
                </div>
            </div>
            <!----------------------------------------------------------------------------------------------------->
                <!-- Position it -->
                <div style="position: absolute; top: 0; right: 0;">
                    <script>
                        $(function(){
                            $('.toast').toast();
                        });
                    </script>
                    <!-- Then put toasts within -->
                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header" style="background-color:#ff617f;">
                            <img src="..." class="rounded mr-2" alt="...">
                            <strong class="mr-auto">Bootstrap</strong>
                            <small class="text-muted">just now</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            See? Just like this.
                        </div>
                    </div>

                    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header" style="background-color:#7af0cf;">
                            <img src="..." class="rounded mr-2" alt="...">
                            <strong class="mr-auto">Bootstrap</strong>
                            <small class="text-muted">2 seconds ago</small>
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="toast-body">
                            Heads up, toasts will stack automatically
                        </div>
                    </div>
                </div>
            
            <!----------------------------------------------------------------------------------------------------->
            
            <div>
                <form class="form-inline" method="POST" action="process/staffAttendanceProcess.php">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" name="uid" placeholder="Enter Unique ID">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mb-2">submit</button>
                </form>
                <div class="collapse" id="collapseExample"  data-spy="scroll">
                    <style>
                        #second, #third, #fourth{
                            display: none;
                        }
                    </style>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!--<h5 style="float:right">Date:  <?= date('Y-m-d'); ?></h5>-->
                                <div class="d-flex">
                                    <div class="table-responsive m-t-10 no-wrap">
                                        <table id="example" class="table vm no-th-brd pro-of-month" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <!--<th>Profile</th>-->
                                                    <th>Staff UID</th>
                                                   <!-- <th>Name</th>
                                                    <th>Entry Time</th>
                                                    <th>Exit Time</th>-->
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 0;
                                                include('includes/include_once/db.php');
                                                $data = "SELECT gymstaff.staffCode AS gymstaffcode, gymattendance.staffcode AS gymattendancecode FROM gymstaff"
                                                        . " JOIN gymattendance ON gymattendance.staffCode!=gymstaff.staffCode AND date(date) = date(now())";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
                                                    if ($result['gymstaffcode'] != 'gymattendancecode') {
                                                        $staffcode = $result['gymstaffcode'];
                                                        $insertAbsentees = "INSERT INTO gymattendance (staffCode, date, inTime, outTime, status)"
                                                                . "VALUES ('$staffcode','$currentDate', '00:00:00', '00:00:00', 'Absent')";
                                                        //print_r($insertAbsentees);
                                                        $execAbesenteesQuery = mysqli_query($connect, $insertAbsentees);
                                                        //print_r([$execAbesenteesQuery]);
                                                        if ($execAbesenteesQuery == 1) {
                                                            //echo 'working';
                                                            $subject = "Welcome to TRYON";
                                                            $body = "Dear Admin,\nThere is some problem with attendance absent marking file.\n"
                                                                    . "Please check\nThank You";
                                                            $headers = "From: tryongymsoftware@gmail.com";
                                                            $adminEmail = "akashpanikar1995@gmail.com";
                                                            mail($adminEmail, $subject, $body, $headers);
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$sr; ?></td>
    <!--                                                        <td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profilePicture'];  ?>" > </td>-->
                                                        <td><h6><?php echo $result['gymstaffcode']; ?></h6></td>
<!--                                                        <td><h6><?php //echo $result['sName']; ?></h6></td>

                                                        <td><?php //echo $result['inTime']; ?></td>
                                                        <td><?php //echo $result['outTime']; ?></td>-->
                                                        <td><?php echo $result['gymattendancecode']; ?></td>
                                                        <!--<td><?php //echo $result[''];      ?></td>-->
                                                        <?php
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
        <?php
        include('includes/include_once/footer.php');
        ?>

        
        <?php
error_reporting(1);
include '../includes/include_once/db.php';
if (isset($_POST['submit'])) {
    $uniqueID = $_POST['uid'];
    $mydate = getdate(date("U"));
    $date = "$mydate[mday]/$mydate[mon]/$mydate[year]";
    $checkAttendance = "SELECT * from gymattendance WHERE staffCode = '$uniqueID' AND DATE(date) = DATE(NOW()) ORDER BY aID DESC LIMIT 1";
    $execCheckQuery = mysqli_query($connect, $checkAttendance);
    $result = mysqli_fetch_assoc($execCheckQuery);
    $isInsert = 0;
    if (empty($result)) {
        $isInsert = 1;
    } else {
        if (!is_null($result['outTime'])) {
            $isInsert = 1;
            echo '1';
        }
    }
    if ($isInsert == 1) {
        $query = "INSERT INTO gymattendance(staffCode, date, inTime, status) VALUES"
                . " ('$uniqueID', '$currentDate', '$currentTime', 'Present' )";
    } else {
        $query = "UPDATE gymattendance SET outTime ='$currentTime'"
                . " WHERE `staffCode`='$uniqueID' AND DATE(date) = DATE(NOW())";
    }
    $execQuery = mysqli_query($connect, $query);
    header('Location:../staffAttendance.php');

}
?>

        