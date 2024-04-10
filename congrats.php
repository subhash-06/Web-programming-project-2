<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="congrats_style.css">
        <link rel="icon" type="image/x-icon" href="images/logo.png">
    </head>

    <body>
        <?php 
        if($_SESSION['count'] == 15){ 
            header("location:congrats_main.php");
        } else { 
        $c = $_SESSION['count']-1;
        ?>
        <div class="won">

            Congratulations! You have won <h1><?php echo $_SESSION['full_data'][$c][0]; ?></h1>
            <br>
            <a href="game_main.php">Continue the game</a>
            <br><br>
            <a href = "logout.php">Logout</a> <br><br>
        </div>
      <?php }   
        ?>
    </body>
</html>