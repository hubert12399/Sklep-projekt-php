
<?php
$servername = "localhost";
        $username = "root";
        $passwrd = "";
        $dbname = "sklep";

        $conn = new mysqli($servername, $username, $passwrd, $dbname);
        

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }


        $result = mysqli_query($conn,"SELECT * FROM Produkty");

            $tytul = mysqli_real_escape_string($conn, $_POST["tytul"]);
            $cena = mysqli_real_escape_string($conn, $_POST["cena"]);
            $grafika = mysqli_real_escape_string($conn, $_POST["grafika"]);
            
            //$passwordhash = password_hash($password, PASSWORD_DEFAULT);
            
           
            if (mysqli_query($conn, "UPDATE produkty (tytul, cena, grafika) VALUES ('$tytul', '$cena', '$grafika')")){
                header('Location: .\panel.php');
             } else{
                echo "Nieoczekiwany błąd - użytkownik już istnieje lub błąd serwera MySQL.";
             }
        
        ?>