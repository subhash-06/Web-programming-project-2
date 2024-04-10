<?php
    session_start();
    $contents = file_get_contents("qsnans.txt");
        $exploded_values = explode("\n",$contents);
        
        $entire_data_array = array();

        foreach ($exploded_values as $line) {
            $values = explode(";", $line);
            $entire_data_array[] = $values; 
        }
        $_SESSION['full_data'] = $entire_data_array;

        if(isset($_SESSION['count'])){
            $count = $_SESSION['count'];
        } else{
            $count = 0;
            $_SESSION['count']=0;
        }

        if(isset($_POST['submit'])){
            if(trim($_SESSION['full_data'][$count][6]) == trim($_POST['ans']) ){
                $_SESSION['count'] = $count+1;
                header("location:congrats.php");

            } else{
                $_SESSION['wrong'] = 1;
                print_r($_SESSION['wrong']);
                header("location:drop.php");
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Riche's Road</title>
        <link rel="stylesheet" href="game_index_style.css">
        <link rel="icon" type="image/x-icon" href="images/logo.png">

    </head>
    <body>
	<div class="logoback"><img src="./images/ami.png"></div>

        <form method="post">

                <div class="quiz">

                    <div id="amnt">
                        <center><?php echo $_SESSION['full_data'][$count][0] ?></center>
                    </div>
                    
                    <div id="qsn">
                    
                    <p style="color: #AAFF00;"> <?php echo $_SESSION['full_data'][$count][1] ?></p>

                    </div><br>
                    <table>
                        <tr>
                            <td>
                                <input type="radio" id="<?php echo $_SESSION['full_data'][$count][2] ?>" name="ans" value="<?php echo $_SESSION['full_data'][$count][2] ?>">
                                <label for="<?php echo $_SESSION['full_data'][$count][2] ?>"><?php echo $_SESSION['full_data'][$count][2] ?></label>
                            </td>
                            <td>
                                <input type="radio" id="<?php echo $_SESSION['full_data'][$count][3] ?>" name="ans" value="<?php echo $_SESSION['full_data'][$count][3] ?>">
                                <label for="<?php echo $_SESSION['full_data'][$count][3] ?>"><?php echo $_SESSION['full_data'][$count][3] ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="radio" id="<?php echo $_SESSION['full_data'][$count][4] ?>" name="ans" value="<?php echo $_SESSION['full_data'][$count][4] ?>">
                                <label for="<?php echo $_SESSION['full_data'][$count][4] ?>"><?php echo $_SESSION['full_data'][$count][4] ?></label>
                            </td>
                            <td>
                                <input type="radio" id="<?php echo $_SESSION['full_data'][$count][5] ?>" name="ans" value="<?php echo $_SESSION['full_data'][$count][5] ?>">
                                <label for="<?php echo $_SESSION['full_data'][$count][5] ?>"><?php echo $_SESSION['full_data'][$count][5] ?></label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div><br>
            <center><input name="submit" type="submit" value="Submit Answer">&nbsp;<input class="exit" type="button" value="Exit Game" onclick="window.location.href='drop.php'" ></center>

        </form>
        
    </body>
</html>