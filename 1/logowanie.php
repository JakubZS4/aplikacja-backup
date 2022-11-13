<?php
    session_start();
?>

<?php
    //weryfikacja pól formularza
    if(isset($_POST['loguj']))
    {
        if(empty($_POST['login']) || empty($_POST['haslo']))
        {
            $_SESSION['error'] = 'Wpisz login i hasła';
            header('Location: index.php');
            exit();
        }
    }
?>

<?php
    
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    //proces łączenia z bazą danych i obsługa logowania 
    require_once('baza.php');

    mysqli_report(MYSQLI_REPORT_STRICT);
    try {
         $polaczenie = new mysqli($server, $user, $pass, $database);
    } 
    catch (mysqli_sql_exception $e)
    {
        $_SESSION['error'] = $e;
        header('Location: index.php');
        exit();
    }

    //udało się połączyć z bazą danych


    //zabezpieczenia
    $login = htmlentities($login);
    $haslo = htmlentities($haslo);
    $login = $polaczenie->real_escape_string($login);
    $haslo = $polaczenie->real_escape_string($haslo);

    //weryfikacja loginu
    $zapytanie = "SELECT login FROM users WHERE login='$login'";
    $wynik = $polaczenie->query($zapytanie);

    //sprawdzamy czy baza zwróciła dokładnie 1 rekord
    if($wynik->num_rows == 1)
    {
        //weryfikacja hasła 
        $zapytanie = "SELECT haslo FROM users WHERE login='$login'";
        $wynik = $polaczenie->query($zapytanie);
        $rekord = $wynik->fetch_assoc();

        if($rekord['haslo'] == $haslo)
        {
            $_SESSION['user'] = $login;
            header('Location: serwis.php');  

            $polaczenie->close();
        }
        else
        {
            $_SESSION['error'] = 'Nieprawidłowe hasło';
            header('Location: index.php');
            exit();
        }
    

        $_SESSION['user'] = $login;
        header('Location: serwis.php');
    }
    else 
    {
        $_SESSION['error'] = 'Błędny login';
        header('Location: index.php');
        exit();
    }

    $polaczenie->close();
    
?>