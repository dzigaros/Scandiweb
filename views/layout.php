<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productsapp</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../libs/bootstrap.min.css">
    <script src="../libs/jquery.js"></script>

</head>

<body>

<?= misc\App::renderHeader($buttons); ?>

<div class="container">
    <div class="row">
        <div class="col" id="content">
            <?= $content; ?>
        </div>
    </div>
</div>

</body>

<script src="../js/Validation.js"></script>
</html>

