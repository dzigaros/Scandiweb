
<div class="header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="http://<?=misc\App::$app_url;?>">Product list</a>
            <div class="container">
                <div class="col-3 offset-9">
                    <div class="row">
                        <?php foreach($buttons as $button) : ?>
                            <a class="col-5 mx-auto btn btn-primary" id="<?=$button['id']?>" href="<?=$button['href']?>" onclick="<?=$button['action']?>">
                                <?=$button['title']?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </nav>
    <hr>
    </div>
