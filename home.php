<?php
session_start();

include('config.php');

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
                <td>Origin</td>
                <td>
                    <select name="origin">
                        <option>Delhi</option>
                        <option>Manali</option>
                        <option>Coorg</option>
                        <option>Goa</option>
                        <option>Puri</option>
                        <option>Amritsar</option>
                        <option>Chennai</option>
                        <option>Mumbai</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Destination</td>
                <td>
                    <select name="destination">
                        <option>Delhi</option>
                        <option>Manali</option>
                        <option>Coorg</option>
                        <option>Goa</option>
                        <option>Puri</option>
                        <option>Amritsar</option>
                        <option>Chennai</option>
                        <option>Mumbai</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Book Seat"/></td>
            </tr>
        </table>
        </form>
    </body>
</html>

