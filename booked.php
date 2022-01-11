<?php
session_start();
$connect = mysqli_connect('localhost', 'root');
mysqli_select_db($connect, 'bytdb');

$name = $_POST['passenger'];
$age = $_POST['age'];
$gender = $_POST['gender'];

$email = $_POST['email'];

$query = "insert into bookings (date, name, age, gender, email) values (now(), '$name', $age, '$gender', '$email')";

$return = mysqli_query($connect, $query);

$query1 = "select bookings.* from bookings where bookings.email = '$email'";
    $result = mysqli_query($connect, $query1);
    $num = mysqli_num_rows($result);

?>

<html>
    <head>
        <title>BYT - Book Ticket</title>
    <style>
            td {width: 200px;}
    </style>
    </head>
    <body>
    <?php
    if ($return == 1) {
    ?>
    <h1> Booking Done!</h1>
    <table>
        <tr>
            <td> Date </td>
            <td> Name </td>
            <td> Age </td>
            <td> Gender </td>
        </tr>
    <?php
     for ($i = 1; $i <= $num; $i++){
         $row = mysqli_fetch_assoc($result);
         echo "<tr><td> ".$row['date']." </td> <td> ".$row['name']." </td> <td> ".$row['age']." </td> <td> ".$row['gender']. " </td></tr>";
         
         
     }
   
    ?>

    </table>
    <a href="home.php">Add more (+) </a>;
    <?php
     } else{
         echo "<h1> Connection Failed! </h1>";
         session_destroy();
     }
        ?>
    </body>
</html>