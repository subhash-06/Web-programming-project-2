<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="drop_style.css">
        <link rel="icon" type="image/x-icon" href="images/logo.png">

    </head>
    <body>
        <audio controls autoplay src="congo.mp3" style="display:none"></audio>
        <?php
        if(isset($_SESSION['wrong'])){ ?>
        <div class="wrong">
            <p>You've answered wrong!</p> <br>
            Right Answer is "<?php
            $c = $_SESSION['count'];
            $m = $c-1;
            $ans = $_SESSION['full_data'][$c][6];
            echo $ans;
             ?>" <br>
             <?php 
             if($_SESSION['count'] > 0){ 
                $price = $_SESSION['full_data'][$m][0];
                ?>
    
                You have won <h1><?php echo $price; ?></h1>
                
                <h1>Congratulations!</h1>

           <?php  } else { ?>

                <p>Try again next time!</p>

           <?php }
             ?>

             <a href="logout.php">Logout</a><br><br>
        </div>

        <?php }else{?>

           <div class="drop">

            <?php
            if($_SESSION['count'] > 0){ 
                $c = $_SESSION['count']-1;
                $price = $_SESSION['full_data'][$c][0];
                ?>
                <p>Congratulations! You have won <h1><?php echo $price; ?></h1></p>


           <?php  } else { ?>

                <p>Try again next time!</p>

           <?php }
             ?>
            <a href="logout.php">Logout</a> <br><br>
           </div>
        <?php }
        ?>
    </body>
</html>