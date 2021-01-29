<form id="product_info" class="form-group  col-12 col-sm-4 col-md-4 col-lg-4 d-flex flex-column align-items-md-end "
      action="http://<?= misc\App::$app_url ?>product.php?action=save"
      method="POST">
    <div class="form-group">
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" placeholder="JVC200123">
        <p class="error sku_error">
        <p>
    </div>
    <div class="form-group">
        <label for="sku">Name:</label>
        <input type="text" name="name" id="name" placeholder="Acme DISC">
        <p class="error name_error">
        <p>
    </div>
    <div class="form-group">
        <label for="sku">Price:</label>
        <input type="number" name="price" id="price" placeholder="30.99">
        <p class="error price_error">
        <p>
    </div>
    <!-- type -->
    <div class="form-group">
        <label for="types">Product type:</label>
        <select id="types" name="type">
            <option value="" disabled selected>Select product type</option>
            <option id="dvdcheck" value="book">Book</option>
            <option id="bookcheck" value="dvd">DVD</option>
            <option id="furncheck" value="furniture">Furniture</option>
        </select>
    </div>

    <div id="attributes">

    </div>
</form>

<script>
    $(document).ready(function () {
        let types = $('#types');
        if (types.find('option:selected').val()) {
            $.get('http://<?=misc\App::$app_url?>product.php?type_form=' + types.find('option:selected').val(), function (data) {
                $('#attributes')[0].innerHTML = data;
            });
        }
        types.on('change', function () {
            $.get('http://<?=misc\App::$app_url?>product.php?type_form=' + types.find('option:selected').val(), function (data) {
                $('#attributes')[0].innerHTML = data;
            });
        });
        $('#save').on('click', function (e) {
            e.preventDefault();
            if ($('#types').find('option:selected').val() == 0) {
                $('#types').addClass('error')
            } else {
                $('#types').removeClass('error')
            }
            $('input').each(function (i, el) {
                if ($(el).val() == '') {
                    $(el).addClass('error');
                    $(el).parent() .find('p.error ') .text('Required field');
                    $(el).parent() .find('p.error ') .show();

                } else {
                    $(el).removeClass('error')
                    $(el).parent() .find('p.error ') .text('');
                }
            });

            let form = document.getElementById("product_info");
            if ($('input.error, select.error').length == 0) {
                form.submit();
            }
        })
        ;
    })
    ;
</script>