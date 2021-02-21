<?php
include('header.php');
include('nav.php');
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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
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
                                    <h5 class="card-title m-b-0">Sales Chart</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline text-center font-12">
                                        <li><i class="fa fa-circle text-success"></i> SITE A</li>
                                        <li><i class="fa fa-circle text-info"></i> SITE B</li>
                                        <li><i class="fa fa-circle text-primary"></i> SITE C</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="" id="sales-chart" style="height: 355px;"></div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">Our Visitors</h5>
                                <div class="ml-auto">
                                    <select class="custom-select b-0">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div id="visitor" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-purple"></i> Tablet</li>
                                <li><i class="fa fa-circle text-success"></i> Desktops</li>
                                <li><i class="fa fa-circle text-info"></i> Mobile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Sales Chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Projects of the Month -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div>
                                    <h5 class="card-title">Projects of the Month</h5>
                                </div>
                                <div class="ml-auto">
                                    <select class="custom-select b-0">
                                        <option selected="">January</option>
                                        <option value="1">February</option>
                                        <option value="2">March</option>
                                        <option value="3">April</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive m-t-20 no-wrap">
                                <table class="table vm no-th-brd pro-of-month">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Assigned</th>
                                            <th>Name</th>
                                            <th>Budget</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width:50px;"><span class="round">S</span></td>
                                            <td>
                                                <h6>Sunil Joshi</h6><small class="text-muted">Web Designer</small>
                                            </td>
                                            <td>Elite Admin</td>
                                            <td>$3.9K</td>
                                        </tr>
                                        <tr class="active">
                                            <td><span class="round"><img src="../assets/images/users/2.jpg"
                                                                         alt="user" width="50"></span></td>
                                            <td>
                                                <h6>Andrew</h6><small class="text-muted">Project Manager</small>
                                            </td>
                                            <td>Real Homes</td>
                                            <td>$23.9K</td>
                                        </tr>
                                        <tr>
                                            <td><span class="round round-success">B</span></td>
                                            <td>
                                                <h6>Bhavesh patel</h6><small class="text-muted">Developer</small>
                                            </td>
                                            <td>MedicalPro Theme</td>
                                            <td>$12.9K</td>
                                        </tr>
                                        <tr>
                                            <td><span class="round round-primary">N</span></td>
                                            <td>
                                                <h6>Nirav Joshi</h6><small class="text-muted">Frontend Eng</small>
                                            </td>
                                            <td>Elite Admin</td>
                                            <td>$10.9K</td>
                                        </tr>
                                        <tr>
                                            <td><span class="round round-warning">M</span></td>
                                            <td>
                                                <h6>Micheal Doe</h6><small class="text-muted">Content Writer</small>
                                            </td>
                                            <td>Helping Hands</td>
                                            <td>$12.9K</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="up-img" style="background-image:url(../assets/images/big/img1.jpg)"></div>
                        <div class="card-body">
                            <h5 class=" card-title">Business development of rules</h5>
                            <span class="label label-info label-rounded">Technology</span>
                            <p class="m-b-0 m-t-20">Titudin venenatis ipsum aciat. Vestibu ullamer quam. nenatis
                                ipsum ac feugiat. Ibulum ullamcorper.</p>
                            <div class="d-flex m-t-20">
                                <a class="link" href="javascript:void(0)">Read more</a>
                                <div class="ml-auto align-self-center">
                                    <a href="javascript:void(0)" class="link m-r-10"><i
                                            class="fa fa-heart-o"></i></a>
                                    <a href="javascript:void(0)" class="link m-r-10"><i
                                            class="fa fa-share-alt"></i></a>
                                </div>
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
include('footer.php');
?>