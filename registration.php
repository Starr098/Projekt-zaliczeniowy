<?php

    $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
    $nr_telefonu = $_POST['nr_telefonu'];
    $email = $_POST['email'];
    $passwdord = $_POST['passwdord'];
    $dzial_pracownika = $_POST['dzial_pracownika'];
    

$conn = mysqli_connect("serwer2110985.home.pl","35438634_system","ZX6M2uznUrpuXFA","35438634_system");
if(mysqli_query($conn,"insert into users values(null,'$imie','$nazwisko','$nr_telefonu','$email','$passwdord','0','$dzial_pracownika');"))
{
    echo("Rejestracja przebiegła pomyślnie");
    ?>
    <form action="../index.php "  method="POST">
    <input type="submit" value="Powrót do ekranu logowania" name="zaloguj"/>
    </form>
    <?php
}
else{
    echo("Rejestracja się nie powiodła");
    ?>
    <form action="../index.php "  method="POST">
    <input type="submit" value="Powrót do ekranu logowania" name="zaloguj"/>
    </form>
    <?php
}




?>
