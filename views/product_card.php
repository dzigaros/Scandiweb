
<div class="card col-3  p-3">
    <input type="checkbox" style="display:none" class="to_delete" value="<?=$product->id?>">
    <div class="row mx-auto">
        <?=$product->sku?>
    </div>
    <div class="row mx-auto">
        <?=$product->name?>
    </div>
    <div class="row mx-auto">
        <?=number_format($product->price, 2)?> $
    </div>
    <hr>
    <?php foreach ($product->attrs as $attr) : ?>
        <div class="row mx-auto">
            <?=ucfirst($attr)?>: <?=$product->{$attr}?> <?= $product->unit; ?>
        </div>
    <?php endforeach; ?>
</div>
