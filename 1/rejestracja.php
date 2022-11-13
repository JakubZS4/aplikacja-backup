<?php
session_start();


//walidacja formularza
if(isset($_POST['zaloz']))

{
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];

    $walidacja = true;


    //imie
    if(strlen($imie) < 3)
    {
        $walidacja = false;
        $_SESSION['imie_error'] = 'Wpisz poprawne imię';
    }

    //nazwisko
    if(strlen($nazwisko) < 3)
    {
        $walidacja = false;
        $_SESSION['nazwisko_error'] = 'Wpisz poprawne nazwisko';
    }

    //email
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    {
        $walidacja = false;
        $_SESSION['email_error'] = 'Wpisz prawidłowy adres email';
    }

    //login
    if(!ctype_alnum($login))
    {
        $walidacja = false;
        $_SESSION['login_error'] = 'Login musi składać się tylko z liter i cyfr';
    }

    //haslo
    if($haslo1 != $haslo2)
    {
        $walidacja = false;
        $_SESSION['haslo_error'] = 'Hasła są różne';
    }



    //łączenie do bazy 

    if($walidacja)
    {
        require_once('baza.php');

        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
             $polaczenie = new mysqli($server, $user, $pass, $database);
        } 
        catch (mysqli_sql_exception $e)
        {
            $_SESSION['error'] = $e;
            
            exit();
        }

        //zabezpieczenia
        $login = htmlentities($login);
        $haslo = htmlentities($haslo1);
        $login = $polaczenie->real_escape_string($login);
        $haslo1 = $polaczenie->real_escape_string($haslo1);

        // sprawdzamy czy podany login już istnieje 
        
        $zapytanie = "SELECT login FROM users WHERE login='$login'";
        $wynik = $polaczenie->query($zapytanie);

        if($wynik->num_rows > 1)
        {
            $_SESSION['login_error'] = 'Podany login już istnieje';
        }
        else {
            //login prawidłowy 

            //szyfrowanie hasła 

            // $haslo1 = password_hash($haslo1, PASSWORD_DEFAULT);        hasło jest widoczne  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            //rejestracja użytkownika  

            $zapytanie = "INSERT INTO users VALUES (NULL, '$imie', '$nazwisko', '$email', '$login', '$haslo1')";

            if($polaczenie->query($zapytanie))
            {
                //udało się
                header('Location: index.php');
                $polaczenie->close();
            }
            else 
            {
                //nie udało się
            }
            $polaczenie->close();
        }

    }


}


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <style>
        body {
            font-family: 'Vollkorn', serif;
            background-color: aquamarine;
        }

        h2 {
            display: flex;
            justify-content: center;
            font-size: 50px;
        }

        form {
            padding: 10px 10px;
            text-decoration: none;
            color: black;
            margin: 10px;
            font-size: 60px;
            position: absolute;
            left: 45%;
           
        }

        .error {
            font-size: 35px;
            
            
        }

    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Domine&family=Press+Start+2P&family=Vollkorn&display=swap" rel="stylesheet">

</head>


<body>

    <h2> Wpisz dane aby założyć konto!</h2>

    <form action="rejestracja.php" method="POST" novalidate>
        <input type="text" name="imie" placeholder="Imie">
        <div class="error">
            <?php
                if(isset($_SESSION['imie_error']))
                {
                    echo $_SESSION['imie_error'];
                    unset($_SESSION['imie_error']);
                }
            ?>
        </div>
        <input type="text" name="nazwisko" placeholder="Nazwisko">
        <div class="error">
            <?php
                if(isset($_SESSION['nazwisko_error']))
                {
                    echo $_SESSION['nazwisko_error'];
                    unset($_SESSION['nazwisko_error']);
                }
            ?>
        </div>
        <input type="email" name="email" placeholder="Email">
        <div class="error">
            <?php
                if(isset($_SESSION['email_error']))
                {
                    echo $_SESSION['email_error'];
                    unset($_SESSION['email_error']);
                }
            ?>
        </div>
        <input type="text" name="login" placeholder="Login">
        <div class="error">
            <?php
                if(isset($_SESSION['login_error']))
                {
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                }
            ?>
        </div>
        <input type="password" name="haslo1" placeholder="Hasło">
        <div class="error">
            <?php
                if(isset($_SESSION['haslo_error']))
                {
                    echo $_SESSION['haslo_error'];
                    unset($_SESSION['haslo_error']);
                }
            ?>
        </div>
        <input type="password" name="haslo2" placeholder="Powtórz hasło">
        <div class="error">
            <?php
                if(isset($_SESSION['haslo_error']))
                {
                    echo $_SESSION['haslo_error'];
                    unset($_SESSION['haslo_error']);
                }
            ?>
        <input type="submit" value="Załóż konto" name="zaloz" >
    </form>

    <div class="obrazek">
    <img src="2.png">
    
</body>
</html>