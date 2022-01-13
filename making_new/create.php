<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');

error_reporting(0);
$name = $_POST['passenger'];
$origin = $_POST['origin'];
$destiantion = $_POST['destination'];

$email = $_SESSION['email'];

$createQuery = "insert into bookings (date, name, email, origin, destination) values (now(), '$name','$email', '$origin', '$destination')";

$createResult = mysqli_query($connect, $createQuery);

?>

<html>
    <head>
        <title>BYT - Book Ticket</title>
    </head>
    <body> <?php
        if ($createResult == 1){ ?>
        <h1> Booking Done! </h1>
        <?php } else {
            echo "Connection Failed! Please try again later :("; 
            session_destroy();
            } ?>
        <h2>Safe and Secure Ticket Booking Service</h2> <br>
        <form action="create.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>Name </td>
                <td><input type="text" name="passenger" </td>
            </tr>
            <tr>
                <td>Gender </td>
                <td><input type="radio" name="gender" value="Male"/>Male
                <input type="radio" name="gender" value="Female"/>Female 
                <input type="radio" name="gender" value="Non-Binary"/>Non-Binary</td>
            </tr>
            <tr>
                <td>Email </td>
                <td ><input type="text" name="email" value="<?php echo $email ?>" readonly></td>
            </tr>
            <tr>
                <td>Origin</td>
                <td><input type="text" name="origin"/></td>
            </tr>
            <tr>
                <td>Destination</td>
                <td><input type="text" name="destination"/></td>
            </tr>


            <tr>
                <td><input type="submit" value="Book Seat"/></td>
            </tr>
        </table>
        </form>
    </body>
</html>

