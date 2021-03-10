<?php
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
                        <li class="breadcrumb-item active">Enquiry</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add Enquiry
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="process/enquiryProcess.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="fname" id="inputEmail4">
                                </div>                               
                                <div class="form-group col-md-6">
                                    <label>email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" name="primarycontact" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Alternate Contact Number</label>
                                    <input type="phone" class="form-control" name="alternatecontact" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="gender">
                                        <option selected disabled>Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="phone" class="form-control" name="address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEnq">Enquiry Type<span style="color:red">*</span></label>
                                    <select id="inputEnq" class="form-control" name="enqtype">
                                        <option selected>Choose...</option>
                                        <option value="Phone">Phone</option>
                                        <option value="Walk-IN">Walk-IN</option>
                                        <option value="Social Media">Social Media</option>
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
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Gender</th>
                                                <th>Location</th>
                                                <th>Type</th>
                                                <th>Remark</th>
                                                <th style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $data = "SELECT * FROM gymenquiry";
                                            $query = mysqli_query($connect, $data);
                                            while ($result = mysqli_fetch_assoc($query)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $result['date']; ?></td>
                                                    <td><?php echo $result['vName']; ?></td>
                                                    <td><?php echo $result['vMobile']; ?></td>
                                                    <td><?php echo $result['vGender']; ?></td>
                                                    <td><?php echo $result['vLocation']; ?></td>
                                                    <td><?php echo $result['vType']; ?></td>
                                                    <td><?php echo $result['remark']; ?></td>
                                                    <td class="table-action">
                                                        <a class="fa fa-pencil-square-o btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit" name="edit" href="editEnquiry.php?id=<?= $result['vID']; ?>"></a>
                                                        <a class="fa fa-plus btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="join" name="join"></a>
                                                        <a class="fa fa-flag btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Not Interested" name="notinterested"></a>
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
            <!-- footer -->
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