<?php

    session_start();
    $_SESSION['cart'] = '';
    header("location: cart.php");
    session_destroy();

?>