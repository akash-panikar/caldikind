<?php
session_start(); 
if(!isset($_SESSION['fullName']))
{
    header('Location:index.php');
}
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
?>
<style>
    .progress {
        height: 4px;
    }
      
    .progress-bar {
        background-color: green;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
            <div>
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
                                                <!--<th>Profile</th>-->
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact No.</th>
                                                <th>Membership</th>
                                                <th>Balance Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 0;
                                            include('includes/include_once/db.php');
                                            $data = "SELECT fullName, contactNo, email, memberType, amountDue, dueDate, endDate FROM temp_client WHERE amountDue != '0'";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$sr; ?></td>
                                                    <!--<td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profile_image']; ?>" > </td>-->
                                                    <td>
                                                        <h6><?php echo $result['fullName']; ?></h6><small class="text-muted"><?php //echo $result['endDate']; ?></small>
                                                    </td>
                                                    <td><h6><?php echo $result['email']; ?></h6></td>
                                                    <td><?php echo $result['contactNo']; ?></td>
                                                    <td><h6><?php echo $result['memberType']; ?></h6><small class="text-muted"><?php echo $result['endDate']; ?></small></td>
                                                    <td><?php echo '₹'.$result['amountDue']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-bell btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Notify" name="edit" href="userProcess.php?id=<?= $result['uID']; ?>"></a>
                                                    </td>
                                                </tr>
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