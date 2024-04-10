 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="signup_style.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">

    </head>
    <body>
        <form>

            <fieldset style="color:white;">

                <h1 style="font-size:30px;">Thank you!</h1>

                Welcome to Who wants to be a Millionaire, <?php print $_POST["name"] ?> 
                <br><br>
                    <a href="login.php" style="color:black;font-size:25px;"> <b>Log in to play right now!</b> </a>
                <br><br><br>
            </fieldset>

            <?php
            $old_data = file_get_contents("signup_creds.txt");

            $data = "\n".$_POST['name']. "," .$_POST['email'].",".$_POST['dob'].",".$_POST['gender'].",".$_POST['phone'].",".$_POST['password'];

            $final_data = $old_data.$data;

            file_put_contents("signup_creds.txt",$final_data);

            $name_for_img = str_replace(" ","_",trim($_POST['name']));
            $name_updated = strtolower($name_for_img);

            $dir = "images/";
            $file = $dir.$name_updated.".jpeg";
            move_uploaded_file($_FILES["photo"]["tmp_name"],$file);
            ?>

        </form>
        
    </body>
</html>