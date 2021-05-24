<?php
include('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
?>
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
                <p>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#adduser" data-whatever="@mdo">
                        Add User
                    </button>
                </p>

                <div class="modal fade" id="adduser" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="process/userProcess.php">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Fullname<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="fname" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Contact Number<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="cntno" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>email<span style="color:red">*</span></label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="password" id="password" autocomplete="false" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label>Want System To Generate Password ?</label>
                                            <a class="btn btn-outline-danger" id="generatePassword">Generate</a>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 progress">
                                            <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Confirm Password<span style="color:red">*</span></label>
                                            <input type="password" class="form-control" name="cnfpass" id="cnfpass" oninput="matchPassword();" required>
                                            <span id = "message" style="color:red"> </span>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>User Type<span style="color:red">*</span></label>
                                            <select class="form-control" name="usertype" required>
                                                <option selected disabled>Choose...</option>
                                                <option>Admin</option>
                                                <option>Manager</option>
                                                <option>Staff</option>
                                                <option>User</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Status<span style="color:red">*</span></label>
                                            <select class="form-control" name="status" required>
                                                <option selected disabled>Choose...</option>
                                                <option>Active</option>
                                                <option>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <script>
                    function random_password_generate(max, min)
                    {
                        var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%&*/()";
                        var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
                        var randPassword = Array(randPwLen).fill(passwordChars).map(function (x) {
                            return x[Math.floor(Math.random() * x.length)]
                        }).join('');
                        return randPassword;
                    }
                    document.getElementById("generatePassword").addEventListener("click", function () {
                        random_password = random_password_generate(16, 8);
                        document.getElementById("password").value = random_password;
                    });

//                        function matchPassword() {  
//                            var password = document.getElementById("password");  
//                            var confirmpassword = document.getElementById("cnfpass");  
//                            if(confirmpassword !== password)  
//                            {   
//                              document.getElementById("message").innerHTML = "**Password does not match**";
//                            } else {  
//                              document.getElementById("message").innerHTML = "**Password matched**";
//                            }  
//                          };

                    var percentage = 0;
                    function check(n, m) {
                        if (n < 6) {
                            percentage = 0;
                            $(".progress-bar").css("background", "#dd4b39");
                        } else if (n < 8) {
                            percentage = 20;
                            $(".progress-bar").css("background", "#9c27b0");
                        } else if (n < 10) {
                            percentage = 40;
                            $(".progress-bar").css("background", "#ff9800");
                        } else {
                            percentage = 60;
                            $(".progress-bar").css("background", "#4caf50");
                        }
                        // Check for the character-set constraints
                        // and update percentage variable as needed.

                        //Lowercase Words only
                        if ((m.match(/[a-z]/) != null))
                        {
                            percentage += 10;
                        }
                        //Uppercase Words only
                        if ((m.match(/[A-Z]/) != null))
                        {
                            percentage += 10;
                        }

                        //Digits only
                        if ((m.match(/0|1|2|3|4|5|6|7|8|9/) != null))
                        {
                            percentage += 10;
                        }

                        //Special characters
                        if ((m.match(/\W/) != null) && (m.match(/\D/) != null))
                        {
                            percentage += 10;
                        }

                        // Update the width of the progress bar
                        $(".progress-bar").css("width", percentage + "%");
                    }

                    // Update progress bar as per the input
                    $(document).ready(function () {
                        // Whenever the key is pressed, apply condition checks. 
                        $("#password").keyup(function () {
                            var m = $(this).val();
                            var n = m.length;

                            // Function for checking
                            check(n, m);
                        });
                    });
                </script>
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
                                                    <th>Role</th>
                                                    <th>Account Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 0;
                                                include('includes/include_once/db.php');
                                                $data = "SELECT * FROM users";
                                                $query = mysqli_query($connect, $data);
                                                while ($result = mysqli_fetch_assoc($query)) {
//                                                print_r($result);
//                                                exit();
                                                    ?>
                                                    <tr>
                                                        <td><?php echo ++$sr; ?></td>
                                                        <!--<td style="width:50px;"><img class="round" src="<?php //echo 'images/' . $result['profile_image'];   ?>" > </td>-->
                                                        <td>
                                                            <h6><?php echo $result['fullName']; ?></h6><small class="text-muted"><?php //echo $result['dob'];   ?></small>
                                                        </td>
                                                        <td><h6><?php echo $result['email']; ?></h6></td>
                                                        <td><?php echo $result['contactNo']; ?></td>
                                                        <td><?php echo $result['role']; ?></td>
                                                        <td><?php echo $result['status']; ?></td>
                                                        <td class="table-action">
                                                            <a class="fa fa-pencil-square-o btn btn-outline-primary" data-toggle="tooltip" data-placement="left" title="Edit" name="edit" href="userProcess.php?id=<?= $result['uID']; ?>"></a>
                                                            <span data-toggle="modal" data-target="#suspendModel"><a class="fa fa-ban btn btn-outline-warning" value="<?php echo $result['uID']; ?>" onclick="suspend(<?php echo $result['uID']; ?>)" type="button" data-toggle="tooltip" data-placement="right" title="suspend"></a></span>
                                                            <span data-toggle="modal" data-target="#deleteModel"><a class="fa fa-trash btn btn-outline-danger" value="<?php echo $result['uID']; ?>" onclick="myButton(<?php echo $result['uID']; ?>)" type="button" data-toggle="tooltip" data-placement="right" title="Delete"></a></span>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="process/userProcess.php" id="deleteForm" method="POST">
                                                                            <div class="modal-body">
                                                                                <h3>Are You Sure You Want To Delete ?</h3>
                                                                                <h5>Once you delete the account account, you won't able to<br> recover it back.</h5>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="delete">Yes ! Delete</button>
                                                                            </div>
                                                                        </form>
                                                                        <script>
                                                                            function myButton(id) {
                                                                                //alert(document.getElementById("deleteForm").action);
                                                                                document.getElementById("deleteForm").action = "process/userProcess.php?id=" + id;
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="suspendModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Suspend Account</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <form action="process/userProcess.php" id="suspendForm" method="POST">
                                                                            <div class="modal-body">
                                                                                <h4>Are You Sure You Want To Suspend This Account ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="suspend">Suspend</button>
                                                                            </div>
                                                                        </form>
                                                                        <script>
                                                                            function suspend(id) {
                                                                                //alert(document.getElementById("deleteForm").action);
                                                                                document.getElementById("suspendForm").action = "process/userProcess.php?id=" + id;
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
        <footer class="footer"><img src="images/logo/logo3.png" class="my-logo" /> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>