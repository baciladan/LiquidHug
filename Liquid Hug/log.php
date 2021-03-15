<?php
        include("conexiuneDB.php");
        session_start();
        if(isset($_POST['submit'])){
        $id=$_POST['id'];

         if(isset($_SESSION['cart'])){
                array_push($_SESSION['cart'],$id);
              }
         else{
               $shop_array= array($id);
               $_SESSION['cart'] = $shop_array;
         }
        }
        header("location:index.php");
      // foreach ($_SESSION['cart'] as $data) {
      //   echo $data.'<br>';
      // }
?>
