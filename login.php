<!DOCTYPE HTML>
<html>
    <head>
        <title>TRYON | Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/login.css" rel="stylesheet" type="text/css" media="all"/>
        <script src=""></script>
        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    </head>

    <body> 
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '383250916449190',
              cookie     : true,
              xfbml      : true,
              version    : 'v10.0'
            });
      
            FB.AppEvents.logPageView();   
      
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            
            function fbLogin(){
                FB.getLoginStatus(function(response) {
                    if(response.status == 'connected'){
                        FB.api('/me', function(response) {
                            console.log(response)
                        });
                    }
                });
            }
        </script>
        <!---header--->
        <div class="header">
            <h1>Flat Login Box</h1>
        </div>
        <!---header--->
        <!---main--->
        <div class="main">
            <div class="main-section">
                <div class="login-section">
                    <h2>To access account</h2>
                    <div class="login-top">
                        <p>Login with social</p>
                        <ul>
                            <li><a class="google" href="#"><span class="google"> </span>Login with Google</a></li>
                            <li><a class="face" href="javascript:void(0)" onclick="fbLogin()"><span class="face"> </span>Login with Facebook</a></li>
                        </ul>
                    </div>
                    <div class="login-middle">
                        <p>Log in with Mobile Number</p>
                        <form>
                            <input type="text" placeholder="10 Digit Mobile Number">
                            <div class="face">
                                <button class="login-right" type="submit">Get OTP</button>
                            </div>
                        </form>
                    </div>						
                </div>
            </div>
        </div>
        <!---main--->
    </body>
</html>