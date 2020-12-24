<?php

    //illegal entry check
    if(isset($_POST['submit'])) {
        
        require "$_SERVER[DOCUMENT_ROOT]/dbconn.php";

        $teamName = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['login_teamname']));
        $teamPassword = htmlspecialchars(mysqli_real_escape_string($conn,$_POST['login_password']));
        
        //checking credentials
        $sql = "SELECT * FROM `teams` WHERE team_name=\"$teamName\" AND team_password=\"$teamPassword\"";
        $result = mysqli_query($conn, $sql);
        
        //close db connection
        mysqli_close($conn);
        
        //un-authorized entry (wrong credentials)
        if($result->num_rows==0) {
            echo "<body style=\"background-color:black;\"><h2 style=\"color:red; margin-left:42vw;\">Wrong Credentials</h2></body>";
        } else {
            //update user session
            $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            $_SESSION['teamName'] = $result[0]['team_name'];
            $_SESSION['eligible'] = $result[0]['eligible'];
            $_SESSION['level'] = $result[0]['level'];
            
            //relocate to main page
            header('Location:/');
        }
    } else {
        //else for if(isset($_POST['submit']))
        //unauthorized access
        echo "<body style=\"background-color:#000\"><h2 style=\"color:red;margin-left:42vw; margin-top:10vw;\">Invalid Request</h2></body>";
    }
?>