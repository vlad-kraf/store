<?php
header("Content-Type: text/html; charset=utf-8");
ini_set('display_errors',true);
error_reporting(E_ALL);

include 'data_pages.php';
include 'data_products.php';
include 'data_categories.php';

$pages = unserialize($data_pages);
$products = unserialize($data_products);
$categories = unserialize($data_categories);

//print_r($products);

$flag_cat = 1;
function renderMenu($pages, $flag_cat) {
    echo $flag_cat ? "<ul class=horizontal>" : "<ul>";
    //echo "<ul>";
        foreach($pages as $page) {
            if($page->menu_id == 1 && $page->visible) {
                echo "<li>
                        <a href=$page->url>$page->name</a>
                    </li>";
            }
        }
    echo "</ul>";
}



function makeTree($categories) {

    $tree = new stdClass();
    $tree->subcategories = array();
    
    // Указатели на узлы дерева
    $pointers = array();
    $pointers[0] = &$tree;
    
    $finish = false;
    // Не кончаем, пока не кончатся категории, или пока ниодну из оставшихся некуда приткнуть
    while(!empty($categories)  && !$finish)
    {
        $flag = false;
        foreach($categories as $k=>$category)
        {
            if(isset($pointers[$category->parent_id]))
            {
                // В дерево категорий (через указатель) добавляем текущую категорию
                $pointers[$category->id] = $pointers[$category->parent_id]->subcategories[] = $category;
                unset($categories[$k]);
                $flag = true;
            }
        }
        if(!$flag) $finish = true;
    }
    
    unset($pointers[0]);


    return $tree->subcategories;
}

function renderTree($categories) {
    echo"<ul>";
        foreach($categories as $category){
            echo "<li>";
            echo $category->name;
            if (!empty($category->subcategories)){
                renderTree($category->subcategories);
            }
            echo "</li>";
}
    echo"</ul>";
}

$cat = makeTree($categories);

function renderProducts($products){

    foreach ($products as $product) {
        
        if($product->visible){
            if(count($product->variants) > 1){
                echo "<div class=col-lg-4>";
            
                    echo "<a>$product->created</a><br>";
                    echo "<a href=$product->url><img src=images/image.png width=230 height=230 alt=$product->name></a><br>";
                    echo "<a href=$product->url>$product->name</a><br>";   
                
                    echo  "<select>";
                            foreach ($product->variants as $var1){ 
                                echo "<option>".$var1->price."</option>";
                            }
                    echo "</select><br>";
                    echo "<br>";
                
                echo "</div>";
            } else {
                echo "<div class=col-lg-4>";
            
                    echo "<a>$product->created</a><br>";
                    echo "<a href=$product->url><img src=images/image.png width=230 height=230 alt=$product->name></a><br>";
                    echo "<p><a href=$product->url>$product->name</a></p>";   
                    
                    echo  "<select>";
                    echo "<option>".$product->variants[0]->price."</option>";
                    echo "</select><br>";
                    echo "<br>";
                echo "</div>";
               

            }
        }  

 
    } 
    
}
   





?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Page Title1</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet" type="text/css" >
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info">
                        <ul>
                            <li>Днепр</li>
                            <li>+06711111111</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <header class="col-lg-12">
                    <div class="site_menu">
                        <div class="main-logo">
                            <a href=http://store/><img src=images/logo.png width=100 height=70 alt=SuperManStore></a></li>
                        </div>
                            <?php renderMenu($pages,$flag_cat) ?>
                </header>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="caregory">
                       <h2> Категории </h2>
                       <?php renderTree($cat)?>
                    </div>
                </div>

                <div class="col-lg-8">
                    <h2 margin> Товары </h2>
                    <div class="row">
                    <?php renderProducts($products)?>
                    </div>
                </div>
            </div>


            <div class="row">
                <footer class="col-lg-12">
                <h2> footer </h2>
                </footer>
            </div>
        </div>
    </body>
</html>