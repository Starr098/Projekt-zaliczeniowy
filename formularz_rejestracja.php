<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/form.css">

    <title>Rejestracja</title>
</head>

<body>

    <div id="login-style" class="container">
        <form action="../php/registration.php" method="POST" class="form-style">
            <fieldset>
                <h2 class="fs-title">Dodaj nowego pracownika</h2>
                <?php
                    if(isset($_SESSION['e_uzytkownik_istnieje'])){
                        echo '<span style="color: red;">'.$_SESSION['e_uzytkownik_istnieje'].'</span><br>';
                        unset($_SESSION['e_uzytkownik_istnieje']);
                    }
                ?>
                <!--Imie-->
                <input type="text" id="imie" name="imie" placeholder="Imie" required style="font-size: 20px;">
                <?php
                    if(isset($_SESSION['e_imie'])){
                    echo '<span style="color: red;">'.$_SESSION['e_imie'].'</span>';
                    unset($_SESSION['e_imie']);
                    }
                 ?>

                <!--Nazwisko-->
                <input type="text" id="nazwisko" name="nazwisko" placeholder="Nazwisko" required style="font-size: 20px;">
                <?php
                    if(isset($_SESSION['e_nazwisko'])){
                        echo '<span style="color: red;">'.$_SESSION['e_nazwisko'].'</span>';
                        unset($_SESSION['e_nazwisko']);
                    }
                ?>

                <!--numer Telefonu-->
                <input type="text" id="nr_telefonu" name="nr_telefonu" placeholder="Telefon Służbowy" required style="font-size: 20px;">
                
                <!--e-mail-->
                <input type="text" id="email" name="email"  placeholder="E-mail Pracownika" required style="font-size: 20px;">
                <?php
                    if(isset($_SESSION['e_email'])){
                        echo '<span style="color: red;">'.$_SESSION['e_email'].'</span>';
                        unset($_SESSION['e_email']);
                    }
                ?>
                
                <!--hasło-->
                <input type="password" id="passwdord" name="passwdord" placeholder="Tymczasowe hasło" required style="font-size: 20px;">
               
                <?php
                    if(isset($_SESSION['e_passwdord'])){
                        echo '<span style="color: red;">'.$_SESSION['e_passwdord'].'</span>';
                        unset($_SESSION['e_passwdord']);
                    }
                ?>
                <!--Dział-->
                <label for="dzial_pracownika"> Dział pracy:
                <select id="dzial_pracownika" name="dzial_pracownika">
                    <optgroup label="Działy produkcyjne">
                        <option value="Pracownik produkcji">Pracownik produkcji</option>
                        <option value="Kontrola jakości">Kontrola jakości</option>
                        <option value="Dział Technologi">Dział Technologi</option>
                    </optgroup>

                    <optgroup label="Działy biurowe">
                        <option value="HR">HR</option>
                        <option value="Dział zakupów">Dział zakupów</option>
                        <option value="Dział finansów">Dział finansów</option>
                    </optgroup>
                </select>
                </label>

                <input type="submit" value="Rejestruj!" style="float: right; font-size: 25px;">
                <a href="../index.php">Cofnij stronę</a>
            </fieldset>
            
        </form>
    </div>
</body>