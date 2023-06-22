<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
const ABSPATH = __DIR__ . '/';
include_once ABSPATH . 'config.php';
//include_once ABSPATH . 'dbconfig.php';
include_once ABSPATH . 'classes/Managers.php';
include_once ABSPATH . 'classes/UpdateDB.php';
include_once ABSPATH . 'classes/CreateTable.php';
include_once ABSPATH . 'classes/CallBack.php';
include_once ABSPATH . 'type/managers.php';
include_once ABSPATH . 'type/callBack.php';
define("ARG1", date('Y-m-d'));
define("ARG2", date('Y-m-d'));
$unansweredCalls = callBack();
$countUnansweredCalls = count($unansweredCalls);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные по моиз звонкам</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            position: relative;
        }

        div, p {
            margin: 0;
            box-sizing: border-box;
        }

        .big_text {
            font-size: 160px;
        }

        .small_text {
            font-size: 20px;
        }

        .image-center {
            /*position: absolute;*/
            left: calc(50% - 75px);
            top: calc(35% - 75px);
        }

        img {
            max-width: 150px;
            max-height: 150px;
        }

    </style>
</head>
<body>

<div class="row h-50">
    <div class="col-lg-9 col-12 text-center pt-4">
        <p class="big_text"></p>
        <p class="small_text">Номера телефонов с неудачным последним контактом</p>
        <div style="column-count: 3">
            <?php
            $i = 1;
            foreach ($unansweredCalls as $phone) {
                echo '<div class="phone">' . $phone . '</div>';
            }
            ?>
        </div>
    </div>
    <div class="col-lg-3 col-1 text-center pt-4">
        <div class='image-center'>
            <img src="./image/i.webp" alt="youtube">
        </div>
        <p class="big_text"><?php echo $countUnansweredCalls; ?></p>
        <p class="small_text">Число неотвеченных звонков</p>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    setTimeout(() => window.location.reload(), 12 * 300000);
</script>
</body>
</html>