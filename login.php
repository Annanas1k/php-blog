<?php
// Conectare la baza de date
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bloging";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificarea conexiunii
if ($conn->connect_error) {
  die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

function login($username, $password) {
    global $conn;
    
    $sql = "SELECT * FROM utilizatori WHERE nume_utilizator = '$username' AND parola = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['utilizator'] = $username;
        header("Location: profile.php");
        exit();
    } else {
        echo "Nume de utilizator sau parolă incorectă.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    login($username, $password);
}



$conn->close();
?>
