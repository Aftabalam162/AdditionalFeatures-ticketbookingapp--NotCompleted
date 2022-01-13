<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost','root', '', 'bytdb');

error_reporting(0);
$id = $_POST['id'];
$change = $_POST['change'];
$value = $_POST['value'];


$updateQuery = "update bookings set $change = '$value', date = now() where id = $id";
$updateResult = mysqli_query($connect, $updateQuery);

?>


<html>
    <head>
        <title>BYT - Book Ticket</title>
    </head>
    <body> 
        <?php
        if ($updateResult == 1){
            echo "Update Done!";
        } else{
            echo "We are not able to connect with server :(";
        }
        ?>
        <h2>Safe and Secure Ticket Booking Service</h2> <br>
        <form action="update.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>ID mentioned in booking details: </td>
                <td><input type="number" name="id" /></td> 

            <tr>    
                <td>
                    <select name='change'>
                        <option value='name'>Name</option>
                        <option value='gender'>Gender</option>
                        <option value='origin'>Origin</option>
                        <option value='destination'>Destination</option>
                    </select>
                </td>
                <td>
                    <input type='text' name ='value'/> 
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Update Booking"/></td>
            </tr>
        </table>
        </form>
    </body>
</html>
