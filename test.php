<script>
                                                function getDetails(){
                                                    var pincode = jQuery('#pincode').value();
                                                    if(pincode == ''){
                                                        jQuery('#city').value('');
                                                        jQuery('#state').value('');
                                                    }
                                                    else{
                                                        jQuery.ajax({
                                                            url:'process/pincodeProcess.php',
                                                            type:'POST',
                                                            data:'pincode='+pincode,
                                                            success:function(data){
                                                                if(data == 'no'){
                                                                    alert('Wrong pincode');
                                                                    jQuery('#city').value('');
                                                                    jQuery('#state').value('');
                                                                }
                                                                else{
                                                                    var getData = $.parseJSON(data);
                                                                    jQuery('#city').value(getData.city);
                                                                    jQuery('#state').value(getData.state);
                                                                }
                                                                
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                            
                                            <<form method="POST" autocomplete="off" id="frmPincode">
                                                <input type="text" id="pincode" name="pincode">
                                                <input type="text" id="city">
                                                <input type="text" id="state">
                                            </form>