<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
//$searchQuery = "SELECT * FROM temp_client WHERE amountDue > 0";
//$execSearchQuery = mysqli_query($connect, $searchQuery);

?>

<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item active">Receipt</li>
                    </ol>
                </div>
            </div>
<!--            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample">
                        Add Receipt
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="process/expenseProcess.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="date" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Client Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Mobile Number<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="mobile" value="<?//=$result['contactNo'];?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Amount<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="amount">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Balance Amount<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="paidby" >
                                </div>
                                <div class="form-group col-md-2">
                                    <label>categories</label>
                                    <input type="phone" class="form-control" name="alternatecontact" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Payment Mode<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="categories">
                                        <option selected disabled>Choose...</option>
                                        <option value="Salary">Cash</option>
                                        <option value="Electricity">Card</option>
                                        <option value="Maintenance">UPI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Remark</label>
                                    <textarea type="text" class="form-control" name="remark"></textarea>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>-->
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
                                                <th>Name</th>
                                                <th>Amount Paid</th>
                                                <th>Paid On</th>
                                                <th>Membership</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sr = 0;
                                            include('includes/include_once/db.php');
                                            $data = "SELECT * FROM gymexpense";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$sr; ?></td>
                                                    <td><h6><?php echo $result['ePaidBy']; ?></h6></td>
                                                    <td><h6><?php echo '₹ '.$result['eAmount']; ?></h6></td>
                                                    <td><?php echo $result['date']; ?></td>
                                                    <td><?php echo $result['eCategories']; ?></td>
                                                    <td><?php echo $result['remark']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-edit btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit" name="edit" href="editReceipt.php?id=<?= $result['eID']; ?>"></a>
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