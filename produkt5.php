
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
    
        <?php
        //Panle admninistratora
            if($_SESSION['valid']=="admin@admin"){
                echo '<a href="panel.php"><input type="submit" value="Panel administratora"></a>';
            }

    @include 'config.php';
    
    if(isset($_POST['add_to_cart'])){
    
      
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
       $product_quantity = 1;

       $sesja=$_SESSION['valid'];
    
       $select_cart = mysqli_query($conn, "SELECT * FROM `koszyk` WHERE tytul = '$product_name' && email = '$sesja'");

       
       if(mysqli_num_rows($select_cart) > 0){
          $message[] = 'Produkt już jest dodany do koszyka';
       }else{
          $insert_product = mysqli_query($conn, "INSERT INTO `koszyk`(tytul, cena, grafika, ilosc, email) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$sesja')");
          $message[] = 'Dodano do koszyka';
       }
    
    }
    
    ?>

</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="produkt-strona.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Sklep z gitarami</title>
</head>
<body>
<div id="menu-sklep">

<h1 id="logo">Sklep z gitarami</h1>
<div id="menu-cat">
    <a href="sklep.php" id="menu-cat-w">Strona Główna</a>
    <a href="gitary-klasyczne.php" id="menu-cat-w">Gitary Klasyczne</a>
    <a href="gitary-akustyczne.php" id="menu-cat-w">Gitary Akustyczne</a>
    <a href="gitary-elektryczne.php" id="menu-cat-w">Gitary Elektryczne</a>
    <a href="koszyk.php" id="menu-cat-w">Koszyk</a>
</div>
<div id="produkt">
                <?php
                    $numerproduktu = 5;

                    
                    $result = mysqli_query($conn,"SELECT * FROM produkty where id_gitary=$numerproduktu");

                    while($row = mysqli_fetch_array($result)){
                       $tytul=$row['tytul'];
                       $cena=$row['cena'];
                       $grafika=$row['grafika'];
                    }
                ?>
            <img class="grafika" src="<?php echo $grafika?>" height="650px" width="266px"/>
                <div class="tyt-cen">

                    <p class="tytul"><?php echo $tytul?></p>
                    <p class="cena"><?php echo $cena; echo "zł"?></p>
                
                
                    <form method="POST">  
                        <input type="hidden" name="product_name" value="<?php echo $tytul; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $cena; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $grafika; ?>">
                        <input type="submit" id="dodaj" name="add_to_cart" value="Dodaj do koszyka">
                        
                    </form>
                    <?php

                        if(isset($message)){
                        foreach($message as $message){
                            echo '<div class="message"><span>'.$message.'</span></div>';
                        };
                        };

                    ?>

                </div>
                </div>
</body>
</html>