<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dzienik</title>
	
    <style>
        body{
        border: 1px solid gray;
        background-color: #2b2b2b;
        color: white;
        font-size: 28px;
        }

        .header{
            text-align: center;
            border-bottom: 1px solid gray;
        }

        .lewy{
            float: left;
            border-right: 1px solid gray;
        }

        .prawy{
            float: left;
        }

        .stopka{
            clear: both;
            border-top: 1px solid gray;
            text-align: center;
        }

        button{
            font-size: 18px;
        }

    </style>

</head>
<body>
<div class="header">
	<h1>Dziennik</h1>
</div>
<div class="lewy">
	<div>
		<h3>Szukaj ucznia</h3>
		<form action="plyta_glowna.php" method="GET">
			Imie: <input type="text" name="nazwa"><br>
			<button type="submit">Szukaj</button>
		</form>
	</div>
	<hr>
	<div>
		<h3>Dodaj ucznia</h3>
		<form>
			Imie: <input type="text" name="imie"><br>
			Nazwisko: <input type="text" name="nazwisko"><br>
			Wiek: <input type="number" name="wiek"><br>
			<button type="submit">Dodaj</button>
		</form>
	</div>
</div>
<div class="prawy">
	<h1>Lista Uczniów</h1>
    <?php
        skrypt();
    ?>
</div>
<div class="stopka">Subskrybuj</div>
</body>
</html>

<?php

function skrypt(){
	if(isset($_GET["nazwa"]) && $_GET["nazwa"] != ""){

		$conn = mysqli_connect("localhost", "root", "", "jlipien");
		if(!$conn){
			echo "nie udalo sie polaczyc z baza";
			return;
		}
		$nazwa = $_GET["nazwa"];
		$sql = "SELECT numer_produktu, nazwa, ilosc from urzadzenia WHERE nazwa = '$nazwa'";
		$res = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_row($res)) {
            echo "$row[0] $row[1] $row[2]<br>";
        }
        mysqli_close($conn);
	}else{
		echo "wpisz imie ucznia";
	}
}

?>