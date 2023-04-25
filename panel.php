<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Panel administratora</title>
</head>
<body>
    <div>
        <?php
            session_start();
            //Sprawdzenie czy jest otwarta sesja
            if(isset($_SESSION['valid'])&&$_SESSION['valid']=="admin@admin"){
                echo "E-mail zalogowanego<br /> użytkownika: ";
                echo $_SESSION['valid'];
            }else{
                header('Location: .\index.php');
            }
        ?>
        <form method="POST" action="wyloguj.php">  
            <input type="submit" id="wyloguj" value="Wyloguj">
        </form>
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

            while($row = mysqli_fetch_array($result)){
                echo '<table id="tabela">';
                echo '<tr>'; 
                echo '<td id="tytul"><form method="POST" action="edycja.php">
                <input type="text" name="tytul" value="' . $row['tytul'] . '"></td>';
                echo '<td id="cena"><input type="text" name="cena" value="' . $row['cena'] . '"></td>';
                echo '<td id="grafika"><input type="text" name="grafika" value="' . $row['grafika'] . '"></td>';
                echo '<td>
                <input type="submit" id="edytuj" name="edytuj" value="Edytuj" >
                        </form></td>';
                echo '</tr>';
                echo '</table>';
            }

            mysqli_close($conn);
        ?>
    </div>
    
</body>
</html>