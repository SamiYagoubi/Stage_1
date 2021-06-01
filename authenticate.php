<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'qlxi';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['Nom'], $_POST['MotDePasse']) ) {
    exit('Remplissez les champs !');
}
if ($stmt = $con->prepare('SELECT Nom, MotDePasse FROM Administrateur WHERE Nom = ?')) {
    $stmt->bind_param('s', $_POST['Nom']);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($IdAdmin, $MotDePasse);
        $stmt->fetch();
        if ($_POST['MotDePasse'] === $MotDePasse) {
            session_regenerate_id();
            $_SESSION['Nom'] = $_POST['Nom'];
            $_SESSION['IdAdmin'] = $IdAdmin;
            header('Location: Admin.php');
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }

    $stmt->close();
}
?>