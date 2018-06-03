<?php
require_once 'config/config.php';
require_once 'functions/headers.php';
require_once 'data/data_pages.php';
require_once 'data/data_products.php';
require_once 'data/data_categories.php';
require_once 'functions/function.php';



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Store.com: Online Shopping & more</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" >
    </head>

    <body>
        <div class="container">
            <div class="row">
                <?php require 'content/header.php' ?>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <?php require 'content/sidebar.php' ?> 
                </div>

                <div class="col-lg-9">
                    <?php require 'content/content.php' ?>
                </div>
            </div>

            <div class="row">
                <?php require 'content/footer.php' ?> 
            </div>
        </div>
    </body>
</html>