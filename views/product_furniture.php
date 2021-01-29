
<div class="col-3 card p-2">
    <input type="checkbox" style="display:none" class="to_delete" value="<?=$product->id?>">
<div class="row mx-auto">
    SKU: <?=$product->sku?>
</div>
<div class="row mx-auto">
    Name: <?=$product->name?>
</div>
<div class="row mx-auto">
    Price: <?=number_format($product->price, 2)?> $
</div>
<hr>
<div class="row mx-auto">
    Dimension: <?=$product->height?>
    x <?=$product->width?>
    x <?=$product->length?>
</div>
</div>
