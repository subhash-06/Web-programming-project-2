
<?php
    session_start();
    $contents = file_get_contents("scores.txt");
    $exploded_values = explode("\n",$contents);
        
    $entire_data_array = array(); 
    $score_values = array();
    foreach ($exploded_values as $line) {
        $values = explode(";", $line); 
        $entire_data_array[] = $values; 
    }
    
    // print_r ($entire_data_array);
    foreach($entire_data_array as $arr){
        
        if(trim($arr[0]) == trim($_SESSION['userdata']['name'])){
            // print_r($arr);
            $score_values[] = $arr;
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="game_index_style.css">
        <link rel="icon" type="image/x-icon" href="img/logo.png">
    <style>
        body{
            background-image: url(./images/previous.jpeg);
        }
    </style>
    </head>
    <body>
       


        <div class="main">
            <?php
                $name_for_img = str_replace(" ","_",trim($_SESSION['userdata']['name']));
                $name_updated = strtolower($name_for_img);
            ?>
            
            <?php 
            
            echo $_SESSION['userdata']['name'] ;?>
            <br><br>
            <a href = "game_main.php" class="s" >Start the Game</a>
            <br><br>
            <a href="logout_from_index.php" class="s" >Logout</a>
            <h4  >Scoreboard of <?php echo $_SESSION['userdata']['name']; ?></h4>
            <table  class = "scoreboard" >
                <tr >
                    <th>Amount won in previous games</th>
                    <th>Time of previous games</th>
                </tr>
                <?php 
                    foreach($score_values as $score){ ?>

                    <tr>
                        <td> <?php echo $score[1]; ?> </td>
                        <td> <?php echo $score[2] ;?> </td>
                    </tr>
                        
                <?php } ?>
                
            </table>
        </div>


    </body>
</html>