<?php
session_start();
if (!isset($_SESSION['fullName'])) {
    header('Location:index.php');
}
include('includes/include_once/db.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');

//$totalCount = mysqli_query($connect,"select count(1) FROM gymclients");
//    $row = mysqli_fetch_array($totalCount);
//    $total = $row[0];

$CountQuery = "SELECT COUNT(enddate) from temp_client WHERE enddate < NOW()";
$execQueryResult = mysqli_query($connect, $CountQuery);
$result = mysqli_fetch_array($execQueryResult);

?>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <?php $sumAmount = mysqli_query($connect, "SELECT sum(amountDue) FROM temp_client");
                $sumResult = mysqli_fetch_array($sumAmount);
                $sumAmount = $sumResult['0'];
                ?>
                <div class="col-sm-4">
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Amount Due</h5>
                            <p class="card-text zoomprice">₹<?=$sumAmount;?></p>                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Membership Expired</h5>
                            <p class="card-text" style="color:red;"><?=$total = $result['0'];?> People</p>                            
                        </div>
                    </div>
                </div>
                <?php 
                $renew = mysqli_query($connect, "SELECT COUNT(rID) as renewed FROM membershiprenewal WHERE YEAR(renewalDate) = YEAR(CURDATE())");
                $renewResult = mysqli_fetch_assoc($renew);
                ?>
                <div class="col-sm-4">
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Membership Renewed</h5>
                            <p class="card-text"><?=$renewResult['renewed'].'  People';?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <p>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#paymentDetails">
                            Payment Due
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#notificationList">
                            Notification List
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#incomereport">
                            Income Report
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#notificationList">
                            Expense Report
                        </button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#notificationList">
                            Monthly Attendance
                        </button>
                    </p>
                    <div class="collapse" id="paymentDetails"  data-spy="scroll">
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
                                                                <!--<td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profile_image'];     ?>" > </td>-->
                                                                <td>
                                                                    <h6><?php echo $result['fullName']; ?></h6><small class="text-muted"><?php //echo $result['endDate'];     ?></small>
                                                                </td>
                                                                <td><h6><?php echo $result['email']; ?></h6></td>
                                                                <td><?php echo $result['contactNo']; ?></td>
                                                                <td><h6><?php echo $result['memberType']; ?></h6><small class="text-muted"><?php echo $result['endDate']; ?></small></td>
                                                                <td><?php echo '₹' . $result['amountDue']; ?></td>
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
                    
                    <div class="collapse" id="notificationList"  data-spy="scroll">
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
                                                            <th>Recipient</th>
                                                            <th>Subject</th>
                                                            <th>Status</th>
<!--                                                            <th>Membership</th>
                                                            <th>Balance Amount</th>
                                                            <th>Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sr = 0;
                                                        include('includes/include_once/db.php');
                                                        $data = "SELECT * FROM email_list WHERE status = 0";
                                                        $query = mysqli_query($connect, $data);
                                                        while ($result = mysqli_fetch_assoc($query)) {
                                                        //print_r($result);
                                                        //exit();
                                                            ?>
                                                            <tr>
                                                                <td><?php echo ++$sr; ?></td>
                                                                <td><h6><?php echo $result['emailReceipent']; ?></h6></td>
                                                                <td><h6><?php echo $result['emailSubject']; ?></h6></td>
                                                                <td><?php echo $result['status']; ?></td>
<!--                                                                <td><h6><?php //echo $result['memberType']; ?></h6><small class="text-muted"><?php //echo $result['endDate']; ?></small></td>
                                                                <td><?php //echo '₹' . $result['amountDue']; ?></td>-->
                                                                <td class="table-action">
                                                                    <!--<a class="fa fa-bell btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Notify" name="edit" href="userProcess.php?id=<?= $result['uID']; ?>"></a>-->
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
                    
                    <div class="collapse" id="incomereport"  data-spy="scroll">
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
                                                           <?php
                                                           $GenMem = mysqli_query($connect, "SELECT COUNT(memberType) as member, SUM(amountPaid) as amount"
                                                                   . " FROM temp_client WHERE memberType = 'General Membership' AND"
                                                                   . " month(dtoc) = month(CURRENT_DATE())-1");
                                                           $PerTrn = mysqli_query($connect, "SELECT COUNT(memberType) as member, SUM(amountPaid) as amount"
                                                                   . " FROM temp_client WHERE memberType = 'Personal Training' AND"
                                                                   . " month(dtoc) = month(CURRENT_DATE())-1");
                                                           $PreMem = mysqli_query($connect, "SELECT COUNT(memberType) as member, SUM(amountPaid) as amount"
                                                                   . " FROM temp_client WHERE memberType = 'Premium Membership' AND"
                                                                   . " month(dtoc) = month(CURRENT_DATE())-1");
                                                           $GenMemResult = mysqli_fetch_assoc($GenMem);
                                                           $PerTrnResult = mysqli_fetch_assoc($PerTrn);
                                                           $PreMemResult = mysqli_fetch_assoc($PreMem);
                                                           ?>
                                                            <!--<th>Profile</th>--> 
                                                            <th>Membership Type </th>
                                                            <th style="text-align: center;">Total No. of Admission</th>
                                                            <th style="text-align: center;">Total Amount Collected</th>
<!--                                                            <th>Membership</th>
                                                            <th>Balance Amount</th>
                                                            <th>Action</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><h6>General Membership</h6></td>
                                                            <td style="text-align: center;"><h6><?=$GenMemResult['member'];?></h6></td>
                                                            <td style="text-align: center;"><h6><?=$GenMemResult['amount'];?></h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Personal Training</h6></td>
                                                            <td style="text-align: center;"><h6><?=$PerTrnResult['member'];?></h6></td>
                                                            <td style="text-align: center;"><h6><?=$PerTrnResult['amount'];?></h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td><h6>Premium Membership</h6></td>
                                                            <td style="text-align: center;"<h6><?=$PreMemResult['member'];?></h6></td>
                                                            <td style="text-align: center;"><h6><?=$PreMemResult['amount'];?></h6></td>
                                                        </tr>
                                                            
                                                        <?php
//                                                        $sr = 0;
//                                                        $data = "SELECT * FROM membershiprenewal WHERE status = 0"; //SELECT sum(amountPaid),paymentDate FROM temp_client WHERE paymentDate = date(now()) 
//                                                        $query = mysqli_query($connect, $data);
//                                                        while ($result = mysqli_fetch_assoc($query)) {
                                                        //print_r($result);
                                                        //exit();
                                                            ?>
                                                            
                                                            <?php
                                                        //}
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
                </div>

                <div>
                    <?php
                    include('includes/include_once/db.php');
                    $data = "SELECT fullName, email, memberType, amountDue, dueDate FROM temp_client WHERE amountDue != '0' AND dueDate = DATE(NOW())";
                    $query = mysqli_query($connect, $data);
                    while ($result = mysqli_fetch_assoc($query)) {
                        $date = $result['dueDate'];
                        $amountDue = $result['amountDue'];
                        $clientName = $result['fullName'];
                        $clientEmail = $result['email'];
                        $subject = "Gym membership payment Reminder";
                        $body = "Greetings $clientName.\nThis is to remind you that the payment of your gym membership is due on $date. "
                                . "The total amount owed is <strong>₹$amountDue</strong> only and can be paid at gym reception desk.\n"
                                . "Please contact us if you have any query concerning the same.\n\n"
                                . "Sincerely\n\n"
                                . "Team Tryon";
                        $headers = "From: tryongymsoftware@gmail.com";
                        //mail($clientEmail, $subject, $body, $headers);
                    }
                    ?>
                </div>
            </div>
            <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
        <?php
        include('includes/include_once/footer.php');
        ?>