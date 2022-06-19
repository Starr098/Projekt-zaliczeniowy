<?php
    session_start();
    require_once "../php/connect.php";
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz</title>

        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/form.css">
        <link rel="stylesheet" href="../style/table.css">
</head>
<body>

    <form action="../php/send.php" method="POST" class="form-style">
            <fieldset>
                 <h1 class="fs-title">Twoje Dane</h1>

                <div class="form-section">
                     <!--Imię-->
                        <div class="form-elements">
                            <h2 class="fs-subtitles">Imię:</h2>
                            <h3 class="fs-h3"><?php echo $_SESSION['IMIE']?></h3>
                        </div>
                
                    <!--Nazwisko-->

                        <div class="form-elements">
                            <h2 class="fs-subtitles">Nazwisko:</h2>
                            <h3 class="fs-h3"><?php echo $_SESSION['NAZWISKO']?></h3>
                        </div>
                
                    <!--Numer telefonu-->
                        <div class="form-elements">
                            <h2 class="fs-subtitles">Telefon Służbowy:</h2>
                            <h3 class="fs-h3"><?php echo $_SESSION['TELEFON']?></h3>
                        </div>
                </div>

                <div class="form-section">
                
                    <!--Dział pracy-->                
                    <div class="form-elements">
                        <label for="spis-id"> id pracownika:</label><br>
                        <h3 class="fs-h3"><?php 
                            echo $_SESSION['KEY_U'];
                        ?></h3>
                    </div>

                    <div class="form-elements">
                        <label for="spis-id"> Dział pracy:</label><br>
                        <h3 class="fs-h3"><?php 
                            echo $_SESSION['DZIAL_ZATRUDNIENIA'];
                        ?></h3>
                    </div>

                    <!--Początek urlopu-->
                    <div class="form-elements">
                        <label for="data-rozpoczecia">Data rozpoczęcia urlopu:</label><br>
                        <input id="data-rozpoczecia" type="date" name="data-rozpoczecia" min="2022-01-01" ><br>
                    </div>

                    <!--Koniec urlopu-->
                    <div class="form-elements">  
                        <label for="data-zakonczenia">Data zakończenia urlopu:</label><br>
                        <input id="data-zakonczenia" type="date" name="data-zakonczenia" max="2022-12-12" ><br>
                    </div>

                    
                </div>

                <div class="form-section">
                    <div class="form-elements ">
                        <label for="info">Powód urlopu:</label><br>
                        <textarea name="info" id="info" rows="4" cols="50" minlength="0" maxlength="10000" autocapitalize="words"></textarea>
                    </div>
                </div>


                <div class="form-section">
                    <!--Wyślij-->
                    <div class="form-elements">
                        <input class="send-form-button" type='submit' value="Wyslij wniosek"> 
                    </div>

                    <!--Reset-->
                    <div class="form-elements">
                        <input class="send-form-button" type='reset' value="Wypełnij ponownie"> 
                    </div>
                </div>
                <h3><a href="../php/logout.php">Wyloguj</a></h3>
                
                <div class="form-list">
                    <Table class="style-table">
                        <thead>
                            <tr>
                                <th colspan="6">Wnioski urlopowe</th>
                                    <h3 class="fs-h3"><?php 
                                        if(isset($_SESSION['e_wniosek_wystawiony'])){
                                            echo $_SESSION['e_wniosek_wystawiony'];
                                        }

                                    ?></h3>
                                                        
                            </tr>
                            <tr>
                                <td>Numer Wniosku:</td>
                                <td>ID pracownika</td>
                                <td>Data rozpoczecia</td>
                                <td>Data zakończenia</td>
                                <td>Uzasadnienie</td>
                                <td>Status</td>
                            </tr>

                        </thead>    
                        <tbody>
                            <?php
                                $connect = @new mysqli($host,$db_user,$db_password,$db_name);
                                $worker = $_SESSION['KEY_U'];
                                
                                $wnioski_urlopowe = $connect->query("SELECT * FROM URLOPY WHERE PRACOWNIK_ID='$worker'");


                                foreach($wnioski_urlopowe as $row) {
                                    echo "<tr>
                                            <td>".$row['URLOP_ID']."</td>
                                            <td>".$row['PRACOWNIK_ID']."</td>
                                            <td>".$row['DATA_ROZP']."</td>
                                            <td>".$row['DATA_ZAK']."</td>
                                            <td>".$row['INFO']."</td>
                                            <td>".$row['STATUS']."</td>
                                        </tr>";
                                    }
                            ?>

                        </tbody>

                    </Table>
                </div>
        </fieldset>
          
    </form>
    </div>
<body>
</html>
