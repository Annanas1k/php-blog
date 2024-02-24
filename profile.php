<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="img/user.png" />
    <link rel="stylesheet" href="profile.css" />
</head>
<body>
    <div class="profile_info">
        <?php
     session_start();

     // Verificați dacă sesiunea este inițializată și dacă există utilizator logat
     if (isset($_SESSION['utilizator'])) {
         // Conectați-vă la baza de date
         $servername = "localhost";
         $username = "root";
         $password = "root";
         $dbname = "bloging";
     
         $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
             die("Conectarea la baza de date a eșuat: " . $conn->connect_error);
         }
     
         // Obțineți numele utilizatorului din baza de date
         $nume_utilizator = $_SESSION['utilizator'];
     
         $query = "SELECT nume FROM utilizatori WHERE nume_utilizator = '$nume_utilizator'";
         $result = $conn->query($query);
     
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $nume = $row['nume'];
                 echo "Bun venit: " . $nume . " !!!";
             }
         } else {
             echo "Nu există utilizator cu acest nume în baza de date.";
         }
     
         $conn->close();
     } else {
         echo "Utilizatorul nu este autentificat.";
     }
     $conn->close();


        ?>
        <div class="btn">
        <button id="profilebtn"></button>
        <button id="logoutbtn"></button>
        </div>

    </div>
    <div class="content">

    <div class="postari">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "bloging";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if($conn->connect_error) {
                die("Conectarea la baza de date a esuat: " . $conn->connect_error);
            }


            $sql = "SELECT p.*, u.nume AS nume_utilizator FROM postari p JOIN utilizatori u ON p.utilizator_id = u.id";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $imagine = $row['imagine'];
                $continut = $row['continut'];
                $data_publicare = $row['data_publicare'];
                $utilizator_id = $row['utilizator_id'];
                $nume_utilizator = $row['nume_utilizator'];

                
                echo '<div class="postare">';
                echo '<p2>' . $nume_utilizator . '</p2>';
                echo '<img src="' . $imagine . '" alt="Imagine postare">';
                echo '<p>' . $nume_utilizator . ': ' . $continut . '</p>';
                echo '<p1>Data publicării: ' . $data_publicare . '</p1>';
                echo '<button class="heart-button"></button>';
                echo '</div>';
            }
            

            $conn->close();


        ?>
    </div>



</div>

<script src="scr.js" ></script>
</body>
</html>