<?php
session_start();
$connect = mysqli_connect('localhost', 'root');
mysqli_select_db($connect, 'bytdb');

$name = $_POST['passenger'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$query = "insert into bookings (name, age, gender) values ('$name', $age, '$gender')";

$return = mysqli_query($connect, $query);

?>

<html>
    <head>
        <title>BYT - Book Ticket</title>
    </head>
    <body>
    <?php
    if ($return == 1) {
    ?>
    <h1> Booking Done!</h1>
    <?php
     } else{
         echo "<h1> Connection Failed! </h1>";
         session_destroy();
     }
        ?>
    </body>
</html>