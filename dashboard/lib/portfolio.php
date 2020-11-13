<?php


function add_new_portfolio($description, $image, $user_id)
{
    $host = "localhost";
    $username = "root";
    $pass = "";
    $database = "portofolio_for_freelancer";

    $connection =  mysqli_connect($host, $username, $pass, $database);

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
        $host = "localhost";
        $username = "root";
        $pass = "";
        $database = "portofolio_for_freelancer";

        $connection =  mysqli_connect($host, $username, $pass, $database);

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
