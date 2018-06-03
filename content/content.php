<?php
//var_dump($_GET);

if (isset($_GET['route'])) {
    switch($_GET['route']){
    case 'page':
        include 'page.php';
        break;
    case 'product':
        include 'product.php';
        break;
    case 'cart':
       include 'cart.php';
       break;
    }
} else {
    include 'main.php';
}