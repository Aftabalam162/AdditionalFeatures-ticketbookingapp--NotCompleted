<?php
session_start();

$connect = mysqli_connect('localhost', 'root');
mysqli_select_db($connect, 'bytdb');

$user = $_POST['user'];
$email = $_POST['email'];

$_SESSION["email"] = $email;

$query = "insert into logins (user, email) values ('$user','$email')";

$return = mysqli_query($connect, $query);

?>

<html>
    <head>
        <title>BYT - Book Ticket</title>
    </head>
    <body> <?php
        if ($return == 1){ ?>
        Now you are registered with our website
        <?php } else {
            echo "Connection Failed! Please re-register with us before booking your ticket!"; session_destroy();} ?>
        <h2>Safe and Secure Ticket Booking Service</h2> <br>
        <div id=passenger>
        <form action="booked.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>Name </td>
                <td><input type="text" name="passenger" </td>
                <td>Age</td>
                <td><input type="number" min=1 max=100 name="age"/></td>
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
                <td><input type="submit" value="Book Seat"/></td>
            </tr>
        </table>
        </form>
        </div>
    </body>
</html>

