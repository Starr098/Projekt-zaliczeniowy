<!--Sprawdza czy istnieje sesja zalogowanego-->
<!--Sprawdza czy istnieje sesja zalogowanego-->
<?php
    session_start();    

    if ((isset($_SESSION['login_true'])) && ($_SESSION['login_true'] == true)) {
        
        /*sprawdza typ użytkownika i przekierowóje do odpowiedniego formularza*/
        if((isset($_SESSION['TYP'])) && ($_SESSION['TYP'] == 1)) {      

            header("Location: ./forms/formularz_menadzera.php");
            exit();
        }

        else {

            header("Location: ./forms/formularz_urlopowy.php");
            exit();
        }
          
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/form.css">

    <title>Logowanie</title>
</head>

<body>

    <div id="login-style" class="container">
        <form action="./php/login.php"  method="POST" class="form-style">
            <fieldset>
                <h2 class="fs-title">Logowanie do strony pracownikai</h2>
                <?php
                    if(isset($_SESSION['zarejestrowano'])){
                        echo '<span style="color: green;">'.$_SESSION['zarejestrowano'].'</span><br>';
                        unset($_SESSION['zarejestrowano']);
                    }
                ?>

                <input id="email" type="text" name="email" placeholder="Email" />
                <input id="passwd" type="password" name="password" placeholder="Password" />
                
                <input type="submit" value="Zaloguj" name="zaloguj" class=" action-button"/><br>
                    
                    <?php
                        if(isset($_SESSION['error'])) echo $_SESSION['error'];
                    ?>
                <p>Nie posiadasz konta?</p>
                <a href="./forms/formularz_rejestracja.php">Zarejestruj się</a>
            </fieldset>
        </form>
    </div>
</body>

</html>