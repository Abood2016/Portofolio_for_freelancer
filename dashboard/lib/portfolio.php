<?php

class portfolio {


function add_new_portfolio($description, $image, $user_id)
{
    require_once('dbconnection.php');

    $sql = "INSERT INTO `portofolio` (`description`,`image`,`user_id`) VALUES ('$description','$image','$user_id')";

    mysqli_query($connection, $sql);

    $res =  mysqli_affected_rows($connection);

    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}

function GetPortfolios()
{
    require_once('dbconnection.php');

    //بقدر اجيب اسم المستخدم الي انشأ المعرض من خلال طريقتين  اما اعمل فيو واستدعي الكويري او اكتب الكويري مباشر  
    //sql = "SELECT users.name as User_name,portofolio.id,portofolio.description,portofolio.image 
    //FROM `portofolio` INNER JOIN `users` on `portofolio`.user_id = `users`.id";

    $sql = "SELECT * FROM `user_portfolio`";

    $q =  mysqli_query($connection, $sql);

    $portfolios = [];

    while ($res = mysqli_fetch_assoc($q)) {
        $portfolios[] = $res;
    }
  
    return $portfolios;
}

function delete_portfoli($pro_id)
{
    require_once('dbconnection.php');

    $sql = "DELETE FROM `portofolio` WHERE `id` = $pro_id";

    mysqli_query($connection, $sql);

    $res =  mysqli_affected_rows($connection);

    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}

function GetPortfoliosById($id)
{
    require_once('dbconnection.php');

    $sql = "SELECT * FROM `user_portfolio` WHERE `id` = $id ";

    $q =  mysqli_query($connection, $sql);

    //عشان بدي اجيب قيمة وحدة بستخدمش while loop
    $res = mysqli_fetch_assoc($q);

    return $res;
}

function updateportfolio($id,$description, $image )
{

        $host = "localhost";
        $username = "root";
        $pass = "";
        $database = "portofolio_for_freelancer";

        $connection =  mysqli_connect($host, $username, $pass, $database);

        $sql = "UPDATE `portofolio` SET `description` = '$description'";
   
    //بتحقق اذا جايني صورة اعمللها append ع الكويري
    if (!empty($image)) {
        $sql .= " ,`image` = '$image' ";
    }

    $sql .= " WHERE `id` = '$id'";
       

   $result = mysqli_query($connection, $sql);
        // var_dump($result);
        // die;
    $res =  mysqli_affected_rows($connection);
       
    if ($res == 1) {
        return true;
    } else {
        return false;
    }
}
}
