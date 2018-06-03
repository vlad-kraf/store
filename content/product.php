<?php $product = getProduct($products,$_GET['id']);

//print_r ($products);


?>


    <div class="col-lg-12">
        <div class="row">
        <div class="col-lg-4">
            <div class="image text-center">
                <img src="/images/image.png" width="250px">
            </div>
        </div>

        <div class="col-lg-8">
            <form action="">
                <input type="hidden" name="route" value="<?php echo $_GET['route']?>">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

            <h5 class="page-header"><?php echo $product->name ?></h5>
            <div class="price">
                <?php if(count($product->variants) > 1) :?>
                    <select name="variant">
                        <?foreach ($product->variants as $variant) :?>
                            <option><?php echo $variant->name ?> <?php echo ceil($variant->price) ?> грн.</option>
                        <?php endforeach;?>
                    </select>
                <?php else:?>
                    <span class="label label-info">Цена товара: <?php echo ceil($product->variant->price) ?> грн.</span>
                <?php endif;?>
            </div>
            <div class="sku">
                <span class="label label-info">Артикул товара: <?php echo $product->variant->sku ?></span>
            </div>

            <?php if($product->description):?>
                <h5>Описание товара</h5>
                <div class="bg-info">
                    <?php echo $product->description ?>
                </div>
            <?php endif;?>
            <div>
                Количество: <input type="number" name="amount" value="1">
            </div>

            <input type="submit" name="buy" value="Купить">

            </form>
        </div>







        </div>

    </div>
