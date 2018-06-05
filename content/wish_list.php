<div class="col-lg-12">
    <?php if (isset ($_COOKIE["wish"])): ?>
        <?php $wish_list_products = unserialize($_COOKIE["wish"])?>
        <h3><?php echo "В вашем списке желаний ".count($wish_list_products)." товаров" ?></h3>
            <?php foreach ($wish_list_products as $value): ?>
                <?php $product = getProduct($products,$value) ?>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="image text-left">
                                <img src="/images/image.png" width="70px">
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <p><span style="color: blue;"><?php echo $product->name?></span>
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
        <h3><?php  echo 'Ваш список желаний пуст'?></h3>
    <?php endif ?>
</div>