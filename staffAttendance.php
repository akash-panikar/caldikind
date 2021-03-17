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
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="table-responsive m-t-20 no-wrap">
                                        <table id="example" class="table vm no-th-brd pro-of-month" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Profile</th>
                                                    <th>Name</th>
                                                    <th>Unique ID</th>
                                                    <th>Entry Time</th>
                                                    <th>Exit Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 0;
                                                include('includes/include_once/db.php');
                                                $data = "SELECT aID, staffCode, inTime, outTime, status FROM gymattendance";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$sr; ?></td>
                                                        <td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profilePicture']; ?>" > </td>
                                                        <td>
                                                            <h6><?php echo $result['']; ?></h6>
                                                        </td>
                                                        <td><h6><?php echo $result['staffCode']; ?></h6></td>
                                                        <td><?php echo $result['inTime']; ?></td>
                                                        <td><?php echo $result['outTime']; ?></td>
                                                        <td><?php echo $result['status']; ?></td>
                                                        <!--<td><?php //echo $result[''];     ?></td>-->
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

                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End Page Content -->
                    <!-- ============================================================== -->
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