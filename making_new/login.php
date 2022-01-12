<?php

    $connect = mysqli_connect('localhost', 'root', '', '_testingdb');

    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

                $sql = "select * from logins where password = '$password' and username = '$username'";

                $result = mysqli_query($connect, $sql);

                $num = mysqli_num_rows($result);
                if ($num == 1){
                    echo "Success! You are logged in and now you can book your ticket";
                    session_start();
                    $_SESSION['loggedin'] = true;


                    $_SESSION['username'] = $username; // this feature is still need to be updated
                    header("location: welcome.php");
                } else {
                    echo 'Invalid Credentials! Sign up with our site to book your ticket';
                }
            
        
    }

        

?>

<html>
    <head>
        <title> Book Your Ticket </title>
    </head>
    <body>
        <form action='login.php' method='post'>
            <table>
                
                <tr>
                    <td> Username </td>
                    <td> <input type="text" name="username"></td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Log in"></td>
                </tr>
            </table>
        </form>

    </body>
</html>