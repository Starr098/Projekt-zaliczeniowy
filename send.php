<?php
session_start();
require_once "./connect.php";

$connect = @new mysqli($host,$db_user,$db_password,$db_name);

if($connect->connect_errno!=0)
{
    echo "Error: ".$connect->connect_errno;
}

else {
    
        
        $resoult_post = true;
        $user_id = $_SESSION['KEY_U'];
        $data_rozp=$_POST['data-rozpoczecia'];
        $data_zak =$_POST["data-zakonczenia"];
        $info=$_POST['info'];
        $status='Oczekuje';


        if($connect->query("INSERT INTO URLOPY VALUES (NULL,'$user_id','$data_rozp','$data_zak','$info','$status')")){
            $_SESSION['e_wniosek_wystawiony']='<span style="color: green;">Wniosek został Wystawiony!</span>';
            header("Location: ../index.php");
            exit();
        }
        else {
            $_SESSION['e_wniosek_wystawiony']='<span style="color: green;">Błąd Wniosek nie został Wystawiony</span>';
            header("Location: ../index.php");
            exit();
        }

    $connect->close();
}
?>

