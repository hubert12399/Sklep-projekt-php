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


session_start();
            //Sprawdzenie czy jest otwarta sesja
            if(isset($_SESSION['valid'])){
                echo "E-mail zalogowanego<br /> użytkownika: ";
                echo $_SESSION['valid'];
            }else{
                header('Location: .\index.php');
            }

$sesja=$_SESSION['valid'];
if(isset($_GET['remove'])){

   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `order` WHERE `id_order` = '".$remove_id."' && `email` = '".$sesja."'");
   header('location:mojezamowienie.php');
   echo "tesd";
};
?>
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
        <form method="POST" action="wyloguj.php">  
            <input type="submit" id="wyloguj" value="Wyloguj">
        </form>
        <div id="menu-sklep">

        <h1 id="logo">Sklep z gitarami</h1>
            <div id="menu-cat">
                <a href="sklep.php" id="menu-cat-w">Strona Główna</a>
                <a href="gitary-klasyczne.php" id="menu-cat-w">Gitary Klasyczne</a>
                <a href="gitary-akustyczne.php" id="menu-cat-w">Gitary Akustyczne</a>
                <a href="gitary-elektryczne.php" id="menu-cat-w">Gitary Elektryczne</a>
                <a href="koszyk.php" id="menu-cat-w">Koszyk</a>
            </div>
        </div>
        <?php

            $result = mysqli_query($conn, "SELECT * FROM `order` WHERE `email` = '$sesja'");

            if(mysqli_num_rows($result)>=1){

            while($row = mysqli_fetch_array($result)){
                ?>
                <div id="zamowienie">
                    <tr>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $row['ID_order']; ?>" >
                        </form> 
                        <td><b>Produkty: </b><br /></td>
                        <td>
                            <?php echo $row['total_products'];?><br />
                        </td>
                        <td><b>Łączna cena: </b><br /></td>
                        <td>
                            $<?php echo $row['total_price'];?><br />
                        </td>
                        <td><b>Twoje imię i nazwisko: </b><br /></td>
                        <td>
                            <?php echo $row['name'];?><br />
                        </td>
                        <td><b>Twój numer telefonu: </b><br /></td>
                        <td>
                            <?php echo $row['number'];?><br />
                        </td>
                        <td><b>Twój e-mail: </b><br /></td>
                        <td>
                            <?php echo $row['email'];?><br />
                        </td>
                        <td><b>Twoja metoda płatności: </b><br /></td>
                        <td>
                            <?php echo $row['method'];?><br />
                        </td>
                        <td><a href="mojezamowienie.php?remove=<?php echo $row['ID_order']; ?>" onclick="return confirm('Usunąć zamówienie?')" class="delete-btn">Usuń</a></td>
                    
                    </tr>
                </div>
                <?php
            }
            }else{
                echo "Nie masz żadnych zamówień.";
            }

            mysqli_close($conn);
        ?>
    </div>
    
</body>
</html>