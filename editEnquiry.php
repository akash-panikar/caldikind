<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
$rowID = $_GET['id'];
$searchQuery = "SELECT * from gymenquiry WHERE vID=$rowID";
$execQuery = mysqli_query($connect, $searchQuery);
$result = mysqli_fetch_assoc($execQuery);
?>
<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dash.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="enquiry.php">Enquiry</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
                    <div class="card card-body">
                        <form action="process/enquiryProcess.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?= $result['vName']; ?>" name="fname">
                                    <input type="text" name="rowID" value="<?php echo $rowID; ?>" style="display:none;">
                                </div>                               
                                <div class="form-group col-md-6">
                                    <label>email</label>
                                    <input type="email" class="form-control" value="<?= $result['vEmail']; ?>" name="email" id="email" oninput="validateEmail()">
                                    <p style="color:red" id="email-wrong"></p> <p style="color:green" id="email-right"></p>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label>Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" value="<?= $result['vMobile']; ?>" name="eprimaryno" id="mobile" onchange="CheckNumber()">
                                    <p style="color:red" id="mobile-message"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Alternate Contact Number</label>
                                    <input type="phone" class="form-control" value="<?= $result['vMobile2']; ?>" name="ealterno">
                                    <p style="color:red"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Gender<span style="color:red">*</span></label>
                                    <select class="form-control" name="gender">
                                        <option value="Male" <?php echo ($result['vGender']== 'Male')?' selected':'';?>>Male</option>
                                        <option value="Female" <?php echo ($result['vGender']== 'Female')?' selected':'';?>>Female</option>
                                        <option value="Other" <?php echo ($result['vGender']== 'Others')?' selected':'';?>>Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Location</label>
                                    <input type="text" class="form-control" value="<?= $result['vLocation']; ?>" name="location">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Enquiry Type<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="type">
                                        <option value="Phone" <?php echo ($result['vType']== 'Phone')?' selected':'';?>>Phone</option>
                                        <option value="Walk-IN" <?php echo ($result['vType']== 'Walk-IN')?' selected':'';?>>Walk-IN</option>
                                        <option value="Social Media" <?php echo ($result['vType']== 'Social Media')?' selected':'';?>>Social Media</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Remark</label>
                                    <textarea class="form-control" name="remark"><?= $result['remark']; ?></textarea>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary" name="update">submit</button>
                        </form>
                    </div>
            <script>
                //------------------------ email validation-----------------------------------
                function validateEmail(email) {
                    const regex_pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                    if (regex_pattern.test(email)) {
                        //alert('The email address is valid');
                        document.getElementById("email-right").innerHTML = 'email address is valid';
                    }
                    else {
                        //alert('The email address is not valid');
                        document.getElementById("email-wrong").innerHTML = 'The email address is not valid';
                    }
                }

                //------------------ Mobile Number valiadtion------------------------------
                function CheckNumber(mobile)   
                {  
                    var a = /^\d{10}$/;  
                    if (a.test(mobile))   
                    {  
                        alert("Your Mobile Number Is Valid.")  
                    }   
                    else   
                    {  
                        document.getElementById("mobile-message").innerHTML = 'invalid Contact number';
                    }  
                }; 
            </script>
                </div>
            </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
    <?php
    include('includes/include_once/footer.php');
    ?>

