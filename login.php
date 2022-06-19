<?php

session_start();

require_once "./connect.php";

$connect = @new mysqli($host,$db_user,$db_password,$db_name);

if($connect->connect_errno!=0)
{
    echo "Error: ".$connect->connect_errno;
}

else {
    
    $login = $_POST['email'];
    $passwd = $_POST['password'];

    $sql = "SELECT * FROM users where EMAIL='$login' AND PSWD='$passwd'";
    
    if($result = @$connect->query($sql))
    {
        $ilu_userow = $result->num_rows;

        if($ilu_userow > 0) {
           

            $_SESSION['login_true'] = true;

            $login_user = $result->fetch_assoc();

            /*id Sesji użytkownika*/
            $_SESSION['id']    = $login_user['id'];
            
            /*Dane bobrane z bazy danych i zapisane do zmiennej sesyjnej*/
            $_SESSION['KEY_U'] = $login_user['KEY_U'];
            $_SESSION['IMIE']  = $login_user['IMIE'];
            $_SESSION['NAZWISKO']  = $login_user['NAZWISKO'];
            $_SESSION['TELEFON']   = $login_user['TELEFON'];
            $_SESSION['EMAIL'] = $login_user['EMAIL'];
            $_SESSION['DZIAL_ZATRUDNIENIA']= $login_user['DZIAL_ZATRUDNIENIA'];
            $_SESSION['PSWD']  = $login_user['PSWD'];
            $_SESSION['TYP']   = $login_user['TYP'];

            $worker = $_SESSION['KEY_U'];
           

            $result->free_result();
            unset($_SESSION['error']);


            if($_SESSION['TYP'] == 1) {       
                header("Location: ../forms/formularz_menadzera.php");
            }
            else {
                header("Location: ../forms/formularz_urlopowy.php");
            }
        } 
        else {
            $_SESSION['error'] = '<span style="color: red;">Hasło lub login są nieprawidłowe!</span>';
            header("Location: ../index.php");
        }
    }
    $connect->close();
}



use function PHPSTORM_META\type;

$email=$_POST['email'];
$passwd=$_POST['passwd'];

$conn = mysqli_connect("serwer2110985.home.pl","35438634_system","ZX6M2uznUrpuXFA","35438634_system");

if(mysqli_query($conn,"select PSWD from users where EMAIL='$email'"))
{
    $temp=mysqli_query($conn,"select PSWD from users where EMAIL='$email'");
    $passwdCheck = mysqli_fetch_array($temp);

    $temp=mysqli_query($conn,"select TYP from users where EMAIL='$email'");
    $temp2 = mysqli_fetch_array($temp);

    if($passwdCheck!=null)
    {
    $passwdCheck=$passwdCheck['PSWD'];
    }
    if($passwdCheck==$passwd)
    {
        $type = $temp2['TYP'];
        echo($type);
        
        if($type == 0)
        {       
         header("Location: ../formularz_urlopowy.php");
        }
        else
        {
            header("Location: ../php/formularz_menadzera.php");
        }


        
    }
    else
    {
        echo("Nieprawidłowy login lub hasło");
    }

}

?>