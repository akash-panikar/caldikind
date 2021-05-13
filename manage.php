<?php

//session_start();
//if (!isset($_SESSION['fullName'])) {
//    header('Location:index.php');
//}
//include('includes/include_once/header.php');
//include('includes/include_once/nav.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Example of Auto Loading Bootstrap Modal on Page Load</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
				
                <form>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php

//include('includes/include_once/footer.php');
?>