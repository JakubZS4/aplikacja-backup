<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazyn części komputerowych</title>
    <style>
        body {
            font-family: 'Vollkorn', serif;
            background-color: aquamarine;
        }

        .form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form input {
            display: block;
            padding: 10px 10px;
            text-decoration: none;
            color: black;
            margin: 20px;
            font-size: 30px;
        }

       h2 {
           display: flex;
           justify-content: center;
           font-size: 40px;
       }

       p { 
        font-size: 25px;
       }

       .error{
           color: red;   
           font-size: 25px;
       }

       .obrazek {
           position: absolute;
           left: 39%;
       }
       

    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Domine&family=Press+Start+2P&family=Vollkorn&display=swap" rel="stylesheet">

</head>

<body>

    <h2>Witaj! Aby rozpocząć pracę musisz się zalogować</h2>

    <div class="obrazek">
    <img src="1.png">
       
    <div class="form">
        <form action ="logowanie.php" method="POST">
            <input type="text" name="login" placeholder="wpisz login"/>
            <input type="password" name="haslo" placeholder="wpisz hasło"/>
            <input type="submit" value="Zaloguj się" name="loguj"/>
        </form>

        <?php if(isset($_SESSION['error'])) : ?>

        <div class="error">
            <?php 
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
        <?php endif; ?>

        <p>Nie masz konta? <a href="rejestracja.php"> Utwórz konto </a></p>

    </div>
</body>



</html>