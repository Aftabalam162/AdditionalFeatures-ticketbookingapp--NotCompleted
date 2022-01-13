<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');
$email = $_SESSION['email'];

$showQuery = "select * from bookings where email = '$email'";

$showResult = mysqli_query($connect, $showQuery);
$num = mysqli_num_rows($showResult);

?>


<html>
    <head>
        <title>Book your ticket now!</title>
    </head>
    <body>
        <h1> Welcome <?php echo $_SESSION['username']?> </h1>
        <h3> Here are all the bookings done by you:</h3>
        <table>
            <tr>
                <td>ID</td>
                <td>Date</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Email</td>
                <td>Origin</td>
                <td>Destination</td>
            </tr>
            <?php 
            
            for ($i = 1; $i <= $num; $i++){
            $row = mysqli_fetch_assoc($showResult);
            echo "<tr><td> ". $row['id']." </td><td> ".$row['date']." </td><td> ".$row['name']." </td><td> ".$row['gender']." </td><td> ".$row['email']." </td><td> ".$row['origin']." </td><td> ".$row['destination']."</td></tr>";
            }
            ?>

        </table>
    </body>
</html>