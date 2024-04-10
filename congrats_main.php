<?php
    session_start();    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="congrats_main_style.css">
        <link rel="icon" type="image/x-icon" href="images/logo.png">
        <style>
            img{
                width: 100px;
    height: 100px;
    padding-top: 720px;
    margin-left: 1580px;
            }
            
        </style>
    </head>
    <body>
        <audio controls loop autoplay src="final_congrats.mp3" style="display:none"></audio>
       <marquee behavior="scroll" direction="right" scrollamount=20 ><h1>Congratulations! You’ve just won $1,000,000</h1></marquee> 
        <h2><?php echo $_SESSION['userdata']['name'] ?></h2>
        <a href = "logout.php"><img id="final" src="./images/logout.png" alt="" ></a>
    </body>
</html>