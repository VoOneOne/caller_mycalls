<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные по моиз звонкам</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet"
          href="<?php echo get_request_url_without_parameters() ?>/css/unanswered-customer-calls-line-table.css"/>
</head>
<body>
<div class="container">
    <ul class="responsive-table">
        <div style="display: flex; align-content: center">
            <img id="my-calls-img" src="<?php echo get_request_url_without_parameters() ?>/image/i.webp">
            <h2>Пропущенные звонки(<?php echo $TableHtml->getRowsCount() ?>)</h2>
        </div>
        <li class="table-header">
            <div class="col col-1">Номер телефона</div>
            <div class="col col-2">Время звонка</div>
        </li>
        <?php echo $TableHtml->getRows('        
        <li class="table-row">
            <div class="col col-1">%phone$s</div>
            <div class="col col-2">%start_time$s</div>
        </li>');
        ?>
    </ul>
</div>
</body>
</html>
<script>
    setTimeout(() => window.location.reload(), 1000);
</script>