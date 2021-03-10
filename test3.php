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
                <input type="text" name="city" id="city" placeholder="city">
                <br>
                <br>
                <input type="text" name="state" id="state" placeholder="state">
            </form>
            <script>
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
                                console.log(data);
                            }
                        });
                    }
                }
            </script>
        </div>
    </body>
</html>
