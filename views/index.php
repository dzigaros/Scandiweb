
<div class="container">
    <div class="row">
        <?php foreach($products as $product) : ?>
            <?=$product->render()?>
        <?php endforeach; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#delete').on('click', function (e) {
            e.preventDefault();
            if ($('.to_delete:checked').length > 0) {
                // Delete checked products
                let product_ids = $('.to_delete:checked').map((i, el) => $(el).val()).toArray().join(',');
                $.get('http://<?=misc\App::$app_url?>product.php?action=delete&product_ids='+product_ids, function (data) {
                });
                // hide their cards
                $('.to_delete:checked').each(function (i, el) { $(el).parent().hide() } );
            }
            // Toggle to delete checkboxes
                $('.to_delete').toggle();
        });
    });
</script>