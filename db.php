<?php
    define('DSN', 'mysql:host=localhost;port=3308;dbname=restoran');
    define('DBUSER', 'root');
    define('DBPASS', '');

    $db = new PDO(DSN, DBUSER, DBPASS);
?>