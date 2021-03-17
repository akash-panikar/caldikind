<?php
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');
session_start(); 
if(!isset($_SESSION['fullName']))
{
    header('Location:index.php');
}
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
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Fullname<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" value="<?= $result['vName']; ?>" id="inputEmail4">
                                    <input type="text" name="rowID" value="<?php echo $rowID; ?>" style="display:none;">
                                </div>                               
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">email</label>
                                    <input type="email" class="form-control" value="<?= $result['vEmail']; ?>" id="inputPassword4">
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Primary Contact Number<span style="color:red">*</span></label>
                                    <input type="phone" class="form-control" value="<?= $result['vMobile']; ?>" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Alternate Contact Number</label>
                                    <input type="phone" class="form-control" value="<?= $result['vMobile2']; ?>" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option value="Male" <?php echo ($result['vGender']== 'Male')?' selected':'';?>>Male</option>
                                        <option value="Female" <?php echo ($result['vGender']== 'Female')?' selected':'';?>>Female</option>
                                        <option value="Other" <?php echo ($result['vGender']== 'Others')?' selected':'';?>>Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Location</label>
                                    <input type="phone" class="form-control" value="<?= $result['vLocation']; ?>" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Enquiry Type<span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control">
                                        <option value="<?= $result['vType']; ?>"></option>
                                        <option>Phone</option>
                                        <option>Walk-IN</option>
                                        <option>Social Media</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Remark</label>
                                    <textarea class="form-control" id="inputCity"><?= $result['remark']; ?></textarea>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
        </div>
    <?php
    include('includes/include_once/footer.php');
    ?>

