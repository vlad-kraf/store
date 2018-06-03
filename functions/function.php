<?php

$pages = unserialize($data_pages);
$products = unserialize($data_products);
$categories = unserialize($data_categories);

$flag_cat = 1;
function renderMenu($pages, $flag_cat) {
    echo $flag_cat ? "<ul class=horizontal>" : "<ul>";
    //echo "<ul>";
        foreach($pages as $page) {
            if($page->menu_id == 1 && $page->visible) {
                echo "<li>
                        <a href=/?route=page&id=$page->id >$page->name</a>
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
                    echo "<a href=?route=product&id=$product->id><img src=images/image.png width=230 height=230 alt=$product->name></a><br>";
                    echo "<a href=?route=product&id=$product->id>$product->name</a><br>";
                
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
                    echo "<a href=?route=product&id=$product->id><img src=images/image.png width=230 height=230 alt=$product->name></a><br>";
                    echo "<p><a href=?route=product&id=$product->id>$product->name</a></p>";
                    
                    echo  "<select>";
                    echo "<option>".$product->variants[0]->price."</option>";
                    echo "</select><br>";
                    echo "<br>";
                echo "</div>";
               

            }
        }  

 
    } 
    
}


function getPage ($id, $pages)
{
    $page = $pages[$id];
    return $page;
}


function getProduct($products,$id)
{
    $product = $products[$id];
    return $product;
}

if (isset ($_GET['buy'])) {
    $product_id = intval($_GET['id']);
    $amount = floatval($_GET['amount']);

    $cart = array();
    if(isset($_COOKIE['cart'])){
        //$cart = unserialize($_COOKIE['cart']);
    } else {
        //$cart = asdadas;
    }

    setcookie('cart', unserialize($cart), time()+60*60*24),'/');




}