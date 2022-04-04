<?php
     session_start();
    $user="root";
    $pass="";
    $database="user_accounts";
    $db=mysqli_connect("localhost:3306", $user, $pass, $database);
    // if($db)
    //     echo "Database Connected";
    // else
    //     die("Database Not Connected".mysqli_error($db));


?>