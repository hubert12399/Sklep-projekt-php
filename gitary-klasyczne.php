<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Gitary Klasyczne</title>
</head>
<body>
    <!-- Początek treści sklepu -->
    <div id="header">
        <p1>Witaj na naszym sklepie!</p1>
    </div>
    <div id="menu-sklep">
        <h1 id="logo">Gitary Klasyczne</h1>
        <div id="menu-cat">
            <a href="sklep.php" id="menu-cat-w">Strona Główna</a>
            <a href="gitary-akustyczne.php" id="menu-cat-w">Gitary Akustyczne</a>
            <a href="gitary-elektryczne.php" id="menu-cat-w">Gitary Elektryczne</a>
            <a href="koszyk.php" id="menu-cat-w">Koszyk</a>
            <a href="mojezamowienie.php" id="menu-cat-w">Moje Zamówienie</a>
        </div>
        <!-- Logout -->
        <div id="log-out">
    <?php
        session_start();
        //Sprawdzenie czy jest otwarta sesja
        if(isset($_SESSION['valid'])){
            echo "E-mail zalogowanego<br /> użytkownika: ";
            echo $_SESSION['valid'];
        }else{
            header('Location: .\index.php');
        }
    ?>
    <form method="POST" action="wyloguj.php">  
        <input type="submit" id="wyloguj" value="Wyloguj">
    </form>
    
    <div id="panel">
        <?php
        //Panle admninistratora
            if($_SESSION['valid']=="admin@admin"){
                echo '<a href="panel.php"><input type="submit" value="Panel administratora"></a>';
            }
        ?>
            </div>
        </div>
    </div>
    <div id="produkty-main">
            <a href="produkt3.php"><div id="produkt1">
                <?php
                    $numerproduktu = 3;

                    $servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img src="<?php echo $grafika?>" height="200px" width="81px"/>
            <p><?php echo $tytul?></p>
            <p><?php echo $cena; echo "zł"?></p>
                </div>
                </a>
                <a href="produkt6.php"><div id="produkt2">
                <?php
                    $numerproduktu = 36;

                    $servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img src="<?php echo $grafika?>" height="200px" width="81px"/>
            <p><?php echo $tytul?></p>
            <p><?php echo $cena; echo "zł"?></p>
                </div>
                </a>
                <a href="produkt7.php"><div id="produkt3">
                <?php
                    $numerproduktu = 37;

                    $servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img src="<?php echo $grafika?>" height="200px" width="81px"/>
            <p><?php echo $tytul?></p>
            <p><?php echo $cena; echo "zł"?></p>
                </div>
                </a>
                <a href="produkt8.php"><div id="produkt4">
                <?php
                    $numerproduktu = 38;

                    $servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img src="<?php echo $grafika?>" height="200px" width="81px"/>
            <p><?php echo $tytul?></p>
            <p><?php echo $cena; echo "zł"?></p>
                </div>
                </a>
                <a href="produkt9.php"><div id="produkt5">
                <?php
                    $numerproduktu = 39;

                    $servername = "localhost";
                    $username = "root";
                    $passwrd = "";
                    $dbname = "sklep";

                    $conn = new mysqli($servername, $username, $passwrd, $dbname);


                    // Sprawdzenie połączenia
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img src="<?php echo $grafika?>" height="200px" width="81px"/>
            <p><?php echo $tytul?></p>
            <p><?php echo $cena; echo "zł"?></p>
                </div>
                </a>
            </div>
        </div>
    <div id="footer">

    </div>
    
</body>
</html>