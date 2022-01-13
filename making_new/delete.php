<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("location: login.php");
}

$connect = mysqli_connect('localhost', 'root', '', 'bytdb');

error_reporting(0);
$id = $_POST['id'];
$reason = $_POST['reason'];
$email = $_SESSION['email'];



$deleteQuery = "delete from bookings where id = $id";
$deleteResult = mysqli_query($connect, $deleteQuery);

$reasonQuery = "insert into cancel (id, reason, email, date) values ($id, '$reason', '$email', now())";
$resultReason = mysqli_query($connect, $reasonQuery);

?>


<html>
    <head>
        <title>BYT - Book Ticket</title>
    </head>
    <body> 
        <?php
        if ($deleteResult == 1){
            echo "Ticket Cancelled! We are sad to see you go :(";
        } else{
            echo "We are not able to connect with server :(";
        }
        ?>
        <h2>Safe and Secure Ticket Booking Service</h2> <br>
        <form action="delete.php" method="post">
        <table>
            Passenger Details: <br>
            <tr>
                <td>ID mentioned in booking details: </td>
                <td><input type="number" name="id" /></td> 

            <tr>    
                <td>Reason</td>
                <td>
                    <input type='text' name ="reason" value=" - "/> 
                </td>
            </tr>


            <tr>
                <td><input type="submit" value="Delete Booking"/></td>
            </tr>
        </table>
        </form>
    </body>
</html>
