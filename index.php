<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Zaloguj się</title>
</head>
<body>
    <div id="menu">
        <h1>Guitar Store</h1>
    </div>
    <div id="menu">
        <h3>Aby przejść do zakupu zaloguj się</h3>
        <form method="POST">
        <input type="text" name="email" placeholder="E-mail"><br />
        <input type="password" name="password" placeholder="Hasło"><br />
        <input type="submit" id="zaloguj" value="Zaloguj">
        </form>
        <?php
            session_start();

            if(isset($_SESSION['valid'])){
                header('Location: .\sklep.php');
            }

            // Połączenie z bazą danych
            $servername = "localhost";
            $username = "root";
            $passwrd = "";
            $dbname = "sklep";

            $conn = new mysqli($servername, $username, $passwrd, $dbname);

            // Sprawdzenie połączenia
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            // Pobranie danych z formularza logowania
            if(isset($_POST['email'])&&isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            //$passwordhash = $conn->query("SELECT passwordhash FROM users WHERE email='$email'");
            }

            //Sprawdzenie czy formularze są wypełnione

            if(isset($email)){
            
            //Sprawdzenie czy istnieje uzytkownik z danym emailem
            
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {

                // Sprawdzenie, czy użytkownik istnieje w bazie danych
            $sql = "SELECT * FROM users WHERE email='$email' AND passwordhash='$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Zalogowanie użytkownika && password_verify($password, $passwordhash)
            
            echo "Zalogowano pomyślnie!";
            $_SESSION['valid'] = $email;
            //$_SESSION['timeout'] = time();
            header('Location: .\sklep.php');
            
        } else {
            // Wyświetlenie komunikatu o błędzie logowania
            echo "Niepoprawne hasło.";
            }

            $conn->close();
                
            } else {
                // Wyświetlenie komunikatu o błędzie logowania

                echo "Nie istnieje konto z podanym e-mailem. <br />Musisz się zarejestrować. <br />";
                }
            }

         ?>
         <a href="rejestracja.php"><input type="submit" value="Zarejestruj się"></a>
    </div>
    
    <div id="footer">

    </div>
</body>
</html>