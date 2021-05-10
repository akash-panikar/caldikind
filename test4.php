<?php
include ('includes/include_once/session.php');
include('includes/include_once/header.php');
include('includes/include_once/nav.php');
include('includes/include_once/db.php');

$displayQuery = "SELECT COUNT(tID) AS totalNums, memberType, dtoc FROM temp_client WHERE MONTH(dtoc) = MONTH(NOW()) GROUP BY memberType";
$execDisplayQuery = mysqli_query($connect, $displayQuery);
$chartData = '';
$i=0;
$data = array();

while($row = mysqli_fetch_array($execDisplayQuery))
{
    $chartData .= "{ Member:'".$row["memberType"].",}";
//    $chartData .= "{ General:'".$row["memberType"]."',Personal:".$row["memberType"].",Premium:".$row["memberType"].",}";
    $data[$i]['memberType']=$row["memberType"];
    $data[$i]['totalNums']=$row["totalNums"];
//    $data[$i]['dtoc']=$row["dtoc"];
    $i++;
}

$chartData = json_encode($data);
?>

<div id="main-wrapper">
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales Chart and browser state-->
            <!-- ============================================================== -->
            <div class="row">
                 <!--Column--> 
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block">
                                <div>
                                    <h5 class="card-title m-b-0">Sales Chart</h5>
                                </div>
                                <div class="ml-auto">
                                    <ul class="list-inline text-center font-12">
                                        <li><i class="fa fa-circle text-success"></i> Income</li>
                                        <li><i class="fa fa-circle text-info"></i> Expense</li>
                                        <li><i class="fa fa-circle text-primary"></i> Profit</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--<div class="" id="sales-chart" style="height: 339px;"></div>-->
                            <?php
//                            echo "<pre>";print_r($data);
//                            echo $chartData;
//                            ?>
                            <div id="graphData"><?php echo $chartData; ?></div>
                            <!--<input type="hidden" value="<?php //echo $chartData; ?>" id="graphData"/>-->
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">New Membership</h5>
                            </div>
                            <div id="members" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-info"></i> General</li>
                                <li><i class="fa fa-circle text-purple"></i> Personal</li>
                                <li><i class="fa fa-circle text-success"></i> Premium </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <footer class="footer"> Made by <a href="https://tryon.caldikind.xyz">Group 7</a> </footer>
            
        </div>
    </div>
    <?php
    include('includes/include_once/footer.php');
    ?>