<?php
include ('includes/include_once/session.php');
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
                        <li class="breadcrumb-item active">Renew</li>
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
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Expiry Date</th>
                                                    <th>Amount Due</th>
                                                    <th>Member Type</th>
                                                    <th>Package Name</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $data = "SELECT * FROM temp_client WHERE endDate <= date(NOW())+3";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $result['fullName']; ?></td>
                                                        <td><?php echo $result['contactNo']; ?></td>
                                                        <td><?php echo $result['endDate']; ?></td>
                                                        <td><?php echo $result['amountDue']; ?></td>
                                                        <td><?php echo $result['memberType']; ?></td>
                                                        <td><?php echo $result['packageName']; ?></td>
                                                        <td class="table-action">
                                                            <a class="fa fa-refresh btn btn-outline-success renew<?php echo $result['tID']; ?>" name="pay" data-toggle="modal" onclick="showModal(this)" id="<?php echo $result['tID']; ?>"></a>
                                                            <a class="fa fa-ban btn btn-outline-danger" value="<?php echo $result['vID']; ?>" onclick="myButton(<?php echo $result['vID']; ?>)" type="button" data-toggle="modal" data-placement="left" title="Not Interested"  data-target="#exampleModal"></a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Not Interested</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="process/enquiryProcess.php" id="notInterested" method="POST">
                                                                            <div class="modal-body">
                                                                                Do You Want To Mark Not Interested ?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="ni">Yes !</button>
                                                                            </div>
                                                                        </form>
                                                                        <script>
                                                                            function myButton(id) {
                                                                                //alert(document.getElementById("deleteForm").action);
                                                                                document.getElementById("notInterested").action = "process/enquiryProcess.php?id=" + id;
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="renew_modal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Renew Membership</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="renew_data" onmouseenter="checkAmountDue()">
                                <form method="POST" action="process/userProcess.php" id="renew_form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" name="fname" id="fname" readonly>
                                            <input type="hidden" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" name="cntno" id="cntno" readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label>Expired on</label>
                                            <input type="date" class="form-control" name="expired" id="expired" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Amount Due</label>
                                            <input type="text" class="form-control" name="balamount" id="amtdue" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Package</label>
                                            <select class="form-control" name="package" id="package">
                                                <?php
                                                $selectPackages = 'SELECT * FROM gympackage';
                                                $execPackQuery = mysqli_query($connect, $selectPackages);
                                                echo "<option selected disabled>Choose...</option>";
                                                while ($dropdownPackage = mysqli_fetch_array($execPackQuery)) {
                                                    echo "<option value='" . $dropdownPackage['pName'] . "'>" . $dropdownPackage['pName'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Period</label>
                                            <select class="form-control" name="period" id="period">
                                                <option selected disabled>Choose...</option>
                                                <option>01 Month</option>
                                                <option>03 Month</option>
                                                <option>06 Month</option>
                                                <option>01 Year</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" name="startdate" id="startdate">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>End Date Date</label>
                                            <input type="date" class="form-control" name="enddate" id="enddate">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Total Amount</label>
                                            <input type="text" class="form-control" name="totalamt" id="totalamt">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Amount Paid</label>
                                            <input type="text" class="form-control" name="amtpaid" id="amtpaid" oninput="calculateAmount()">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Balance Amount</label>
                                            <input type="text" class="form-control" name="balamt" id="balamt" value="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="renewSubmit">Renew</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer -->
                <script type="text/javascript">
//                    document.getElementById("amtdue").onload = function() {checkAmountDue()};
                    function checkAmountDue() {
                        if (document.getElementById('amtdue').value > '0') {
                            document.getElementById('period').disabled = 'true';
                            document.getElementById('totalamt').disabled = 'true';
                            document.getElementById('amtpaid').disabled = 'true';
                            document.getElementById('package').disabled = 'true';
                            document.getElementById('balamt').disabled = 'true';
                            document.getElementById('startdate').disabled = 'true';
                            document.getElementById('enddate').disabled = 'true';
                        } else {
                            document.getElementById('period').disabled = '';
                            document.getElementById('totalamt').disabled = '';
                            document.getElementById('amtpaid').disabled = '';
                            document.getElementById('package').disabled = '';
                            document.getElementById('balamt').disabled = '';
                            document.getElementById('startdate').disabled = '';
                            document.getElementById('enddate').disabled = '';
                        }
                    }
                    
                    //==================== renew ================
                    function showModal(e){
                    //alert('hello');
                    //e.preventDefault();
                   var renew_id = $(e).attr('id');
                   document.getElementById("renew_form").action = "process/renewProcess.php?id=" + renew_id;
                   //alert(pay_id);
                   $.ajax({
                       url:'https://localhost/caldikind/process/renewProcess.php',
                       type:'POST',
                       data:{renew_id:renew_id},
                       success:function(data){
                           //alert(data);
                            var output = JSON.parse(data);
                           //alert(output.name);
                           $('#id').val(output.id);
                           $('#fname').val(output.name);
                           $('#cntno').val(output.contactNo);
                           $('#amtdue').val(output.amtdue);
                           $('#expired').val(output.expired);
                           $('#package').val(output.package);
                           $('#email').val(output.email);
                          jQuery.noConflict(); 
                           $("#renew_modal").modal('show'); 
                       }
                   })}
               function calculateAmount(){
                   var totalAmount = document.getElementById("totalamt").value;
                   var paidAmount = document.getElementById("amtpaid").value;
                   var balanceAmount = totalAmount - paidAmount;
                   //alert(balanceAmount);
                   document.getElementById("balamt").value = balanceAmount;
               }
                </script>
                <!-- ============================================================== -->
                <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
            </div>
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>