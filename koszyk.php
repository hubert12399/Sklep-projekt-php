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

<?php

@include 'config.php';

$sesja=$_SESSION['valid'];

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `koszyk` SET ilosc = '$update_value' WHERE id_gitary = '$update_id' && email = '$sesja'");
   if($update_quantity_query){
      header('location:koszyk.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `koszyk` WHERE id_gitary = '$remove_id' && email = '$sesja'");
   header('location:koszyk.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `koszyk` WHERE email = '$sesja'");
   header('location:koszyk.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Koszyk</title>
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Semi+Condensed:wght@300&display=swap" rel="stylesheet">

</head>
<body>

<div class="container">

<section class="shopping-cart">

        <div id="menu-sklep">

        <h1 id="logo">Sklep z gitarami</h1>
        <div id="menu-cat">
            <a href="sklep.php" id="menu-cat-w">Strona Główna</a>
            <a href="gitary-klasyczne.php" id="menu-cat-w">Gitary Klasyczne</a>
            <a href="gitary-akustyczne.php" id="menu-cat-w">Gitary Akustyczne</a>
            <a href="gitary-elektryczne.php" id="menu-cat-w">Gitary Elektryczne</a>
        </div>



   <h1 class="heading">Koszyk</h1>


   <div id="zawartosc">
   <table>

      <thead>
         <th></th>
         <th>Nazwa</th>
         <th>Cena</th>
         <th>Ilość</th>
         <th>Cena całości</th>
         <th></th>
      </thead>
      
      

      <tbody>

         <?php 

         $sesja=$_SESSION['valid'];
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `koszyk` WHERE `email`='$sesja'");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="<?php echo $fetch_cart['grafika']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['tytul']; ?></td>
            <td>$<?php echo $fetch_cart['cena']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id_gitary']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['ilosc']; ?>" >
                  <input type="submit" value="Zmień" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $sub_total = $fetch_cart['cena'] * $fetch_cart['ilosc']; ?>/-</td>
            <td><a href="koszyk.php?remove=<?php echo $fetch_cart['id_gitary']; ?>" onclick="return confirm('Usunąć rzecz z koszyka?')" class="delete-btn"> <i class="fas fa-trash"></i> Usuń</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="sklep.php" class="option-btn" style="margin-top: 0;">Kontynuuj zakupy!</a></td>
            <td colspan="3">Łącznie</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="koszyk.php?delete_all" onclick="return confirm('Jesteś pewien, że chcesz usunąć wszystko?');" class="delete-btn"> <i class="fas fa-trash"></i> Usuń wszystko </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Przejdź do checkout-u!</a>
   </div>
      </div>

</section>

</div>
        </div>
<!-- custom js file link  
<script src="js/script.js"></script>
-->
</body>
</html>