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
<!--                                                    <th>Name</th>
                                                    <th>Entry Time</th>
                                                    <th>Exit Time</th>-->
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 0;
                                                include('includes/include_once/db.php');
//                                                $data = "SELECT gymstaff.staffCode, gymstaff.sName, gymattendance.inTime, gymattendance.outTime, gymattendance.status"
//                                                        . " FROM gymstaff LEFT INNER JOIN gymattendance "
//                                                        . "ON gymstaff.staffCode = gymattendance.staffCode AND DATE(date) = DATE(NOW())";

//                                                $data = "SELECT gymattendance.staffCode, gymstaff.sName, inTime, outTime, status FROM gymattendance"
//                                                        . " JOIN gymstaff ON gymattendance.staffCode=gymstaff.staffCode AND DATE(date) = DATE(NOW()) ";
                                                $data = "SELECT gymattendance.staffCode, status FROM gymattendance"
                                                        . " JOIN gymstaff ON gymattendance.staffCode=gymstaff.staffCode AND DATE(date) = DATE(NOW())";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                    if ($result['status']) {
                                                        $insertAbsentees = "INSERT INTO gymattendance (date, inTime, outTime, status)"
                                                                . "VALUES ('$currentDate', '00:00:00', '00:00:00', 'Absent')";
                                                        print_r($insertAbsentees);
                                                        $execAbesenteesQuery = mysqli_query($connect, $insertAbsentees);
                                                        print_r([$execAbesenteesQuery]);
                                                        if ($execAbesenteesQuery == 1) {
                                                            echo 'working';
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$sr; ?></td>
    <!--                                                        <td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profilePicture'];  ?>" > </td>-->
                                                        <td><h6><?php echo $result['staffCode']; ?></h6></td>
<!--                                                        <td><h6><?php //echo $result['sName']; ?></h6></td>

                                                        <td><?php //echo $result['inTime']; ?></td>
                                                        <td><?php //echo $result['outTime']; ?></td>-->
                                                        <td><?php echo $result['status']; ?></td>
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