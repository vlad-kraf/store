
<div class="col-lg-12">
    <?php if (isset ($_COOKIE["cart"])): ?>
        <?php $cart_products = unserialize($_COOKIE["cart"])?>
        <h3><?php echo "В вашей корзине ".count($cart_products)." товаров" ?></h3>
            <?php foreach ($cart_products as $key => $qty): ?>
                <?php $product = getProduct($products,$key) ?>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="image text-left">
                                <img src="/images/image.png" width="70px">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <p><span style="color: blue;"><?php echo $product->name." -"?></span>
                            <?php echo $qty."шт. -"?>
                                        <?php foreach ($product->variants as $variant):?>
                                            <?php echo "Цена: ".$variant->price."грн."?>
                                        <?php endforeach;?>
                            </p>
                            <p>
                            <p>
                        </div>
                    </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h3><?php  echo 'Ваша корзина пуста'?></h3>
    <?php endif ?>
</div>
