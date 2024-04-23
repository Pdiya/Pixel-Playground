<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Playground</title>
    <link rel="icon" href="assets/img/icon.png" type="image/x-icon">
    <link rel="stylesheet" media="all" type="text/css" href="sign.css">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

</head>
<body>
<?php

if(isset($_POST['sign']))
{
    $lemail=$_POST['lemail'];
    $lpass=$_POST['lpass'];
    
    $cn=mysqli_connect("localhost","root","","pixel_playground");
    if($cn)
    {
        $check=mysqli_query($cn,"select * from sign where email='$lemail'");
        $check_row=mysqli_num_rows($check);
        $match=mysqli_fetch_assoc($check);
        if($check_row==0)
        {
            echo "<script>alert('email does not exist');</script>";
        }	
        else
        {
            if($lpass!=$match["lpass"])
            {
                echo "<script>alert('Wrong Password!!');</script>";
            }
            else
            {
                
                {
                    $_SESSION["sign"]=true;
                    $_SESSION["lemail"]=$match["lemail"];
                    $_SESSION["lpass"]=$match["lpass"];
                    header("location:http://localhost/inhouse/thank.html");            
                }

            }
           
        }
    }
    else
    {
        echo "<script>alert('Error in Connection to server!!');</script>";
    }

}
?>


    <form method="post" action="">
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                        <div class="group">
                            <label  class="label" >Email Address</label>
                            <input  type="email" class="input" name="lemail">
                        </div>
                    <div class="group">
                        <label  class="label" >Password</label>
                        <input  type="password" class="input" data-type="password" name="lpass">
                    </div>
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        
                    </div>
                    <div class="group">
                        <button type="submit" class="button">Sign In</button>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </div>
                <div class="sign-up-htm">
                    <div class="group">
                        <label  class="label" >Username</label>
                        <input  type="text" class="input" name="suname" >
                    </div>
                    <div class="group">
                        <label  class="label" >Email Address</label>
                        <input  type="email" class="input" name="semail">
                    </div>
                    <div class="group">
                        <label  class="label" >Password</label>
                        <input  type="password" class="input" data-type="password" name="spass">
                    </div>
                    <div class="group">
                        <button type="submit" class="button">Sign Up</button>
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </form>
   
    </body>
</html>