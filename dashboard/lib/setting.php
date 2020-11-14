<?php


function add_new_setting($about, $title, $avatar, $user_id)
{
    require_once('dbconnection.php');

    $sql = "INSERT INTO `settings` (`about`,`title`,`avatar`,`user_id`) VALUES ('$about','$title','$avatar','$user_id')";

    mysqli_query($connection, $sql);

    $res = mysqli_affected_rows($connection);

    if ($res == true) {
        return true;
    } else {
        return false;
    }
}

// function GetSettings()
// {
//     require_once('dbconnection.php');

//     $sql = "SELECT * FROM `portofolio_settings `";

//     $q = mysqli_query($connection, $sql);

//     $settings = [];

//     while ($res = mysqli_fetch_assoc($q)) {
//         $settings[] = $res;
//     }

//     return $res;
// }

function GetSettings()
{
    include 'dbconnection.php';

    $sql = "SELECT * FROM `portofolio_settings`";

    $q =  mysqli_query($connection, $sql);

    //عشان بدي اجيب قيمة وحدة بستخدمش while loop
    $res = mysqli_fetch_assoc($q);

    return $res;
}
