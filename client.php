<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
?>
<div id="main-wrapper">
    <!-- ============================================================== -->

    <!-- Page wrapper  -->
    <!-- ============================================================== -->
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div>
            </div>
            <div>
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Add Client
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">email<span style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Alternate Contact Number</label>
                                    <input type="phone" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Date of Birth<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Marital Status<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Unmarried</option>
                                        <option>Married</option>
                                        <option>Divorced</option>
                                        <option>Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">City<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">State<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Pincode<span style="color:red">*</span></label>
                                    <input type="number" class="form-control" id="inputZip">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Joining Date<span style="color:red">*</span></label>
                                    <input type="date" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Shift Timing<span style="color:red">*</span></label>
                                    <input type="time" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Designation<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">School/College Marksheet<span style="color:red">*</span></label>
                                    <input type="file" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Certification<span>  (Optional)</span></label>
                                    <input type="file" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Photo ID Proof<span style="color:red">*</span></label>
                                    <input type="file" class="form-control" id="inputCity">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Create Account<span>  (Optional)</span>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">submit</button>
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
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Membership Start</th>
                                                <th>Membership Ends</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//                                        $data = "SELECT * FROM gymestaff";
//                                        $query = mysqli_query($connect, $data);
//                                        while ($result = mysqli_fetch_assoc($query)) {
                                            ?>
    <!--                                            <tr>
                                                    <td><?php echo $result['sID']; ?></td>
                                                    <td><?php echo $result['sName']; ?></td>
                                                    <td><?php echo $result['sType']; ?></td>
                                                    <td><?php echo $result['sContact']; ?></td>
                                                    <td><?php echo $result['sEmail']; ?></td>
                                                    <td><?php echo $result['sDOB']; ?></td>
                                                </tr>-->
                                            <?php
//                                        }
                                            ?>
                                            <tr>
                                                <td style="width:50px;"><img class="round" src="images/people/suraj.jpg" > </td>
                                                <td>
                                                    <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                                </td>
                                                <td>9876543210</td>
                                                <td>2011/04/25</td>
                                                <td>2021/04/25</td>
                                                <td>Active</td>
                                                <td class="table-action">
                                                    <!-- Button trigger modal -->
                                                    <a type="button" class="fa fa-edit" data-toggle="modal" data-target="#exampleModal"></a>
                                                    <a type="button" class="fa fa-trash" data-toggle="modal" data-target="#exampleModal2"></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                                                                        <a class="fa fa-trash-o" href="#"></a>-->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>63</td>
                                                <td>2011/07/25</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td>San Francisco</td>
                                                <td>66</td>
                                                <td>2009/01/12</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td>Edinburgh</td>
                                                <td>22</td>
                                                <td>2012/03/29</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td>Tokyo</td>
                                                <td>33</td>
                                                <td>2008/11/28</td>
                                                <td class="table-action">
                                                    <a class="fa fa-pencil-square-o" href="#"></a>
                                                    <a class="fa fa-trash-o" href="#"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Notification -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card card-body mailbox">
                            <h5 class="card-title">Notification</h5>
                            <div class="message-center ps ps--theme_default ps--active-y"
                                 data-ps-id="a045fe3c-cb6e-028e-3a70-8d6ff0d7f6bd">
                                <!-- Message -->
                                <a href="#">
                                    <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                    <div class="mail-contnet">
                                        <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span>
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
                    <!-- Start Feeds -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Feeds</h5>
                                <ul class="feeds">
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending
                                        tasks. <span class="text-muted">Just Now</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-success"><i class="fa fa-server"></i></div> Server #1
                                        overloaded.<span class="text-muted">2 Hours ago</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-warning"><i class="fa fa-shopping-cart"></i></div> New
                                        order received.<span class="text-muted">31 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-danger"><i class="fa fa-user"></i></div> New user
                                        registered.<span class="text-muted">30 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version
                                        just arrived. <span class="text-muted">27 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-info"><i class="fa fa-bell-o"></i></div> You have 4 pending
                                        tasks. <span class="text-muted">Just Now</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-danger"><i class="fa fa-user"></i></div> New user
                                        registered.<span class="text-muted">30 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-inverse"><i class="fa fa-bell-o"></i></div> New Version
                                        just arrived. <span class="text-muted">27 May</span>
                                    </li>
                                    <li>
                                        <div class="bg-light-primary"><i class="fa fa-cog"></i></div> You have 4 pending
                                        tasks. <span class="text-muted">27 May</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Feeds -->
                </div>
                <!-- ============================================================== -->
                <!-- End Notification And Feeds -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

    <?php
    include('includes/include_once/footer.php');
    ?>