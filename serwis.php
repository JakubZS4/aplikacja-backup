<?php
    session_start();

    if(!isset($_SESSION['user']))
    {
        header('Location: index.php');
        exit;
    }
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
            margin: 0;
            font-family: 'Vollkorn', serif;
            background-color: aquamarine;
        }

        nav ul{
            background: lightgray;
            height: 50px;
            box-shadow: 0px 0px 20px 2px #000;
            list-style-type: none;
        }

        li{
            float: left;
            width: 25%;
            text-align: center;
            list-style-position: inside;
            color: black;
            padding: 15px 0;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover, a:focus{
            color: green;
        }

        h2{
            font-size: 60px;
            display:flex;
            justify-content: center;
        }

        h3{
            font-size: 50px;
            display:flex;
            justify-content: center;
        }

        p {
            display:flex;
            justify-content: center;
            font-size: 25px;
        }

        .zalogowany {
            display:flex;
            justify-content: center;
            font-size: 22px;
            text-decoration: underline;
        }




    </style>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Domine&family=Press+Start+2P&family=Vollkorn&display=swap" rel="stylesheet">
</head>

<body>

    <section>
        <nav>
            <ul>
                <li><a href="link">Płyta główna</a></li>
                <li><a href="link">Karta graficzna</a></li>
                <li><a href="link">Procesor</a></li>
                <li><a href="link">Pamięć RAM</a></li>
            </ul>
        </nav>
    </section> 

    <h2>Witaj w wirtualnym magazynie</h2>
    <h3>Tutaj sprawdzisz gdzie znjaduję się produkt którego szukasz</h3>
    <p>jesteś zalogowany jako:  
        <span>
            <?php
                if(isset($_SESSION['user']))
                {
                    echo $_SESSION['user'];
                }
            ?>
        </span>
    </p>
    <div class='zalogowany'><a href="wyloguj.php"> Wyloguj się </a></div>
</body>

</html>





    