<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

?>


<html>
    <head>
        <title>Book your ticket now!</title>
    </head>
    <body>
        <h1> Welcome <?php echo $_SESSION['username']?> </h1>
    </body>
</html>