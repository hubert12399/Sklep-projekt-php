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

        $sesja=$_SESSION['valid'];
    ?>
    <form method="POST" action="wyloguj.php">  
        <input type="submit" id="wyloguj" value="Wyloguj">
    </form>
    </div>
<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   //sprawdzanie warunków
  

   $cart_query = mysqli_query($conn, "SELECT * FROM `koszyk`  WHERE email = '$sesja'");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['tytul'] .' ('. $product_item['ilosc'] .') ';
         $product_price = $product_item['cena'] * $product_item['ilosc'];
         $price_total += $product_price;
      };
   };

   if (!preg_match("/^[a-zA-Z ]*$/",$name) === true){
      $msg1="Nazwa może posiadać tylko litery.";
   }else {//imie

   if (!preg_match("/^[0-9]*$/",$number) === true){
      $msg2 = "Numer składa się tylko z cyfr.";
   }else{//numer
   
   if (filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
      $msg3 = "E-mail jest nie poprawny.";
   }else{//email
      
   if ($method != 'Gotówką przy odbiorze' AND $method != 'Blik' AND $method != 'Karta kredytowa' ){
      $msg4 = "Specjalnie ustawiłeś złą metode płatności, nie zadziała :)";
   }else{//metoda

   if (!preg_match("/^[a-zA-Z ]*$/",$city) === true){
      $msg5="Miasto może posiadać tylko litery.";
   }else {//miasto

   if (!preg_match("/^[a-zA-Z ]*$/",$state) === true){
      $msg6="Województwo może posiadać tylko litery.";
   }else {//wojewodztwo
      
   if (!preg_match("/^[a-zA-Z ]*$/",$country) === true){
      $msg6="Kraj może posiadać tylko litery.";
   }else {//kraj
   if (!preg_match("/^[0-9 -]*$/",$pin_code) === true){
      $msg8 = "Kod pocztowy może składać się tylko z cyfr.";
   }else{//kod          

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Dziękujemy za zakupy!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Łącznie : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <b><p>Twoje dane:</p></b>
            <p> Twoje imię i nazwisko : <span>".$name."</span> </p>
            <p> Twój numer : <span>".$number."</span> </p>
            <p> Twój e-mail : <span>".$email."</span> </p>
            <p> Twój adres : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> Metoda płatności : <span>".$method."</span> </p>
            <p>(*zapłać po otrzymaniu produktu*)</p>
         </div>
            <a href='sklep.php' class='btn'>Kontynuuj zakupy!</a>
         </div>
      </div>
      ";
   }
   //
}//imie
}//numer
}//email
}//metoda
}//miasto
}//wojewodztwo
}//kraj
}//kod
   
}

        $servername = "localhost";
        $username = "root";
        $passwrd = "";
        $dbname = "sklep";

        $conn = new mysqli($servername, $username, $passwrd, $dbname);
        

        // Sprawdzenie połączenia
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$sesja'");

        while($row = mysqli_fetch_array($result)){
         $nazwa=$row['nazwa'];
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>
   <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Dokończ swoje zamówienie</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `koszyk` WHERE email = '$sesja'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['cena'] * $fetch_cart['ilosc'];
            $grand_total = $total += $total_price;
      ?>
      <span><?= $fetch_cart['tytul']; ?>(<?= $fetch_cart['ilosc']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>Twój koszyk jest pusty!</span></div>";
      }
      ?>
      <span class="grand-total"> Łącznie : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>Twoje imię i nazwisko</span>
            <input type="text" value="<?php echo $nazwa ;?>" placeholder="Wprowadź swoje imię i nazwisko" name="name" required>
            <?php if(isset($msg1)){ echo $msg1; }?>
         </div>
         <div class="inputBox">
            <span>Twój numer</span>
            <input type="number" placeholder="Wprowadź swój numer" name="number" required>
            <?php if(isset($msg2)){ echo $msg2; }?>
         </div>
         <div class="inputBox">
            <span>Twój e-mail</span>
            <input type="email" value="<?php echo $sesja ;?>" placeholder="Wprowadź swój e-mail" name="email" required>
            <?php if(isset($msg3)){ echo $msg3; }?>
         </div>
         <div class="inputBox">
            <span>Metoda płatności</span>
            <select name="method">
               <option value="Gotówką przy odbiorze" selected>Gotówką przy odbiorze</option>
               <option value="Karta kredytowa">Karta kredytowa</option>
               <option value="Blik">Blik</option>
            </select>
            <?php if(isset($msg4)){ echo $msg4; }?>
         </div>
         <div class="inputBox">
            <span>Adress 1</span>
            <input type="text" placeholder="Numer domu" name="flat" required>
         </div>
         <div class="inputBox">
            <span>Adress 2</span>
            <input type="text" placeholder="Nazwa ulicy" name="street" required>
         </div>
         <div class="inputBox">
            <span>Miasto</span>
            <input type="text" placeholder="Nazwa miasta" name="city" required>
            <?php if(isset($msg5)){ echo $msg5; }?>
         </div>
         <div class="inputBox">
            <span>Województwo</span>
            <input type="text" placeholder="Województwo" name="state" required>
            <?php if(isset($msg6)){ echo $msg6; }?>
         </div>
         <div class="inputBox">
            <span>Kraj</span>
            <input type="text" placeholder="Twój kraj" name="country" required>
            <?php if(isset($msg7)){ echo $msg7; }?>
         </div>
         <div class="inputBox">
            <span>Kod Pocztowy</span>
            <input type="text" placeholder="Twój kod pocztowy" name="pin_code" required>
            <?php if(isset($msg8)){ echo $msg8; }?>
         </div>
      </div>
      <?php if(mysqli_num_rows($select_cart)){    
         echo '<input type="submit" value="Zamów teraz" name="order_btn" class="btn">';
      }
      ?>
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>