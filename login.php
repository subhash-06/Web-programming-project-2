
<?php


    session_start();
    error_reporting(E_ALL ^ E_WARNING);

    function check_user($name,$password){
        $contents = file_get_contents("signup_creds.txt");
        $exploded_values = explode("\n",$contents);
        
        $entire_data_array = array(); 

        foreach ($exploded_values as $line) {
            $values = explode(",", $line); 
            $entire_data_array[] = $values; 
        }


        
        foreach ($entire_data_array as $arr){
 
            if(count($arr) > 1){
                if(trim($arr[0]) == trim($name)){

                    if(trim($arr[5]) == trim($password)){
                        return true;
                    }
    
                }
            }

        }
        return false;

        

    }
    if(isset($_POST['submit'])){
        $name = $_POST["name"];
        $password = $_POST["password"];

        $checking_user = check_user($name,$password);

        if($checking_user){
            $_SESSION['userdata']['name'] = $name;
            $_SESSION['userdata']['password'] = $password;
            header("Location:game_index.php"); 

        } else{
				echo "<h1 style='color:white;font-size:large;margin-left:36%;'>Invalid User Details, please try again!</h1>";
        }
        
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="signup_style.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">

    </head>

    <body>
	<form action="" method="post">
        
            <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="" method="post">
        <input type="text" placeholder="Enter your email" required>
        <input type="password" placeholder="Enter your password" required>
        
       
      </form>
      <div class="signup">
      <input type="submit" value="Login" name="submit"> <br><br>
            Not a user? <a href="signup.php">Click Here to Signup!</a>
        </span>
      </div>
    </div>
    </div>

    </form>
    </body>
</html>    