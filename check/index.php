<?php

    if(isset($_POST['submit'])) {

        require "$_SERVER[DOCUMENT_ROOT]/dbconn.php";

        $userAns = strtolower(htmlspecialchars($_POST['candidateAnswer']));
        $answers = ["0"=> "bigbang", "1"=>"gargantua","2"=>"gasgiants","3"=>"voyager2","4"=>"pluto","5"=>"largehadroncollider","6"=>"sojourner","7"=>"chicxulubcrater","8"=>"arecibo","9"=>"theplanetarysociety","10"=>"buzzaldrin","11"=>"hubblespacetelescope","12"=>"cratersonmoon","13"=>"e"];
        
        //check if it is at same level or not
        $sql = "SELECT * FROM `teams` WHERE team_name=\"$_SESSION[teamName]\"";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $globalLevel = $result[0]['level'];
        
        if($_SESSION['level'] === $globalLevel) {
            
            if($answers[$globalLevel]===$userAns) {
                
                //update level
                $globalLevel = $globalLevel + 1;
                $timeNow = gmdate("Y-m-d H:i:s");
                $sql = "UPDATE `teams` SET last_good=\"$timeNow\", level=\"$globalLevel\" WHERE
                team_name=\"$_SESSION[teamName]\";";
                $result = mysqli_query($conn, $sql);
                
                //close db connection
                mysqli_close($conn);
            }
        }

        //log the answer
        $file = "$_SERVER[DOCUMENT_ROOT]/files/$_SESSION[teamName].txt";
        $handle = fopen($file, 'a+');
        fwrite($handle, "$userAns   "); 
        fclose($handle);

        //send to main page
        header('Location:/');
    } else {
        //unauthorized entry
        echo "<body style=\"background-color:#000;\"><h2 style=\"color:#F00;margin-left:42vw; margin-top:10vw;\">Invalid Request</h2></body>";
    }
?>