<?php

    $connect = mysqli_connect('localhost', 'root', '', 'bytdb');

    if ($_SERVER["REQUEST_METHOD"] == 'POST'){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $existSql = "select * from logins where username = '$username' or email = '$email'";
        $result = mysqli_query($connect, $existSql);
        $numRows =  mysqli_num_rows($result);
        if ($numRows > 0){
            $exist = true;    
        } else {
            $exist = false;
        }

        if ($exist == false){
            $sql = "insert into logins (username, email, password) values ('$username', '$email', '$password')";

            $result = mysqli_query($connect, $sql);

            if ($result){
                echo "Success you are now registered! Please login to book your ticket";
            } else {
                echo 'Sorry for the inconvenience! We are not able to connect with server :(';
            }
        } else {
            $emailReason = "select * from logins where email = '$email'";
            $emailResult = mysqli_query($connect, $emailReason);

            $emailNum = mysqli_num_rows($emailResult);
            if ($emailNum > 0){
                echo "Email already exists in our database. Please login with your credentials";
            } else {
                echo "Username is already taken";
            }
        }

    }

?>

<html>
    <head>
        <title> Book Your Ticket </title>
    </head>
    <body>
        <form action='signup.php' method='post'>
            <table>
                <tr>
                    <td> Username </td>
                    <td> <input type="text" name="username"> </td>
                </tr>
                <tr>
                    <td> Email </td>
                    <td> <input type="email" name="email"></td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Sign Up"></td>
                </tr>
            </table>
        </form>

    </body>
</html>