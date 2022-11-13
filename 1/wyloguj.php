<?php
session_start();

unset($_SESSION['error']);
unset($_SESSION['user']);

session_destroy();

header('Location: index.php');

?>