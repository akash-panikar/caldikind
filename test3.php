<html>
    <head>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div>
            <form action="action" method="POST" id="frmPincode">
                <input type="text" name="pincode" id="pincode" placeholder="pincode" oninput="get_details()">
                <br>
                <br>
<!--                <input type="text" id="myInput" oninput="myFunction()">-->
                <label >Gender<span style="color:red">*</span></label>
                <select id="locality" class="form-control" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="other">Other</option>
                </select>
                <br>
                <br>
<!--                <input type="text" name="state" id="state" placeholder="state">-->
                <label >Gender<span style="color:red">*</span></label>
                <select id="city" class="form-control" name="gender">
                    <option value=""></option>
                </select>
                <br>
                <br>
                <input id='myInput' oninput="myFunction()">
                <input type="text" id='output1' value="" disabled>
            </form>
            <script>
                function myFunction('myInput'){
                    var name1 = document.getElementById("myInput").value;
                    document.getElementById(output1"").innerHTML = name1;
                }
                function get_details(){
                    var pincode=jQuery('#pincode').val();
                    if(pincode == ''){
                        jQuery('#city').val('');
                        jQuery('#state').val('');
                    }
                    else{
                        jQuery.ajax({
                            url:'region.php',
                            type:'post',
                            data:'pincode='+pincode,
                            success:function(data){
                                var getData=$.parseJSON(data);
                                jQuery('#locality').val('getData.Locality');
                                jQuery('#city').val('getData.City');
                            }
                        });
                    }
                }
            </script>
        </div>
    </body>
</html>
