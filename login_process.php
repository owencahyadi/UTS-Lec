<?php
    session_start();
    require_once('db.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['iduser'] = $row['iduser'];
    $_SESSION['username'] = $row['username'];
    header('location: crudadmin.php');
?>