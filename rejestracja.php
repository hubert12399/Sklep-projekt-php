<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Zarejestruj się</title>
</head>
<body>
    <div id="menu">
        <h1>Guitar Store</h1>
    </div>
    <?php
            session_start();

            if(isset($_SESSION['valid'])){
                header('Location: .\sklep.php');
            }
    ?>
    <div id="menu">
        <h3>Nie znaleźliśmy twojego użytkownika w bazie danych.</h3>
        <p1>Aby zalogować się do sklepu najpierw musisz się zarejestrować</p1>
        <form method="POST">
        <input type="text" name="nazwa" placeholder="Nazwa"><br />
        <input type="text" name="email" placeholder="E-mail"><br />
        <input type="password" name="password" placeholder="Hasło"><br />
        <input type="password" name="password2" placeholder="Powtórz hasło"><br />
        <input type="submit" id="zarejestruj" value="Zarejestruj">
        </form>
    <?php
        if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password2'])&&isset($_POST['nazwa'])){
            $nazwa = $_POST['nazwa'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $email = $_POST['email'];

        //Rejestracja
            
            if($password==$password2){

                //Połączenie z bazą

        $servername = "localhost";
        $username = "root";
        $passwrd = "";
        $dbname = "sklep";

        $conn = new mysqli($servername, $username, $passwrd, $dbname);
        

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        if(isset($email)){

            $nazwa = mysqli_real_escape_string($conn, $_POST["nazwa"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);
            
            //$passwordhash = password_hash($password, PASSWORD_DEFAULT);
            
            $result = mysqli_query($conn, "SELECT * FROM users WHERE `email`='$email'");

            if($result->num_rows > 0){
                echo "Podany e-mail jest już zajęty.";
            }else{
            if (mysqli_query($conn, "INSERT INTO users (nazwa, email, passwordhash) VALUES ('$nazwa', '$email', '$password')")){
                echo "Rejestracja przebiegła pomyślnie. <br />";
                echo '<a href="index.php"><input type="submit" value="Zaloguj się"></a>';
             } else{
                echo "Nieoczekiwany błąd - użytkownik już istnieje lub błąd serwera MySQL.";
             }
            }
            
            }else{
                echo "Podane hasła nie zgadzają się";
            }
            }
        }
        
        
    ?>
    </div>
    <div id="footer">

    </div>
    
</body>
</html>