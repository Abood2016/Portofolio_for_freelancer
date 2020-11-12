<?php

function add_New_User($name, $email, $password)
{
    $host = "localhost";
    $username = "root";
    $pass = "";
    $database = "portofolio_for_freelancer";

    $connection =  mysqli_connect($host, $username, $pass, $database);

    $sql = "INSERT INTO `users` (`name`,`email`,`password`) VALUES ('$name','$email','$password')";

    mysqli_query($connection, $sql);

    $res =  mysqli_affected_rows($connection);

    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}
