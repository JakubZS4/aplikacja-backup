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
            background-color: DarkSalmon;
            height: 50px;
            box-shadow: 0px 0px 20px 2px #000;
            list-style-type: none;
        }

        li{
            float: left;
            width: 25%;
            text-align: center;
            font-size: 20px;
            list-style-position: inside;
            color: black;
            padding: 15px 0;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover, a:focus{
            color: red;
            transform scale(1.4);
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

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: DarkSalmon;
            color: white;
            text-align: center;
        }

       /* .wyszukiwanie {
            display:flex;
            align-items: center;
            justify-content: center;
            height: 350px;
        }

       */

        .form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .form input {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: black;
            margin: 20px;
            font-size: 50px;
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

    
    <div class="form">
        <form action ="wyszukiwanie" method="POST">
            <input type="text" name="" placeholder="Wpisz numer produktu"/>
            <input type="submit" value="Szukaj" name="Szukaj"/>
        </form>

    <footer>
    <p>W razie problemów skontaktuj się z administracją magazynu lub napisz do nas wiadomość</p>
    <p><a href="mailto:magazynapp3@gmail.com">magazyn_app@gmail.com</a></p>
    </footer>


</body>

</html>





    