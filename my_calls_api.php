<?php
const ABSPATH = __DIR__ . '/';
include_once ABSPATH . 'config.php';
include_once ABSPATH . 'dbconfig.php';
include_once ABSPATH . 'Managers.php';

$now = time(); //
$nowDay = ($now - $now % 86400); // timestamp начала дня
$string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=0&from_date=$nowDay&to_date=$now");
$json = json_decode($string, true);
$arr_calls = $json['results'];
$Man = new Managers(MANAGERS);
$Man->setApiData($arr_calls);


global $pdo;
$sql = "CREATE TABLE IF NOT EXISTS " . CALLS . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            date DATE NOT NULL,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            count_in INT(11) NOT NULL,
            time_in INT(11) NOT NULL,
            count_out INT(11) NOT NULL,
            time_out INT(11) NOT NULL,
            PRIMARY KEY (id)
        )";
$pdo->exec($sql);
$dateNow = date('Y-m-d', $now);
echo $dateNow;
$sql = '';
foreach ($Man->return() as $email => $manager) {
    $sqlCheck = "SELECT id FROM " . CALLS . " WHERE date='$dateNow' AND email='$email'";
    $sth = $pdo->query($sqlCheck);
    $name = $manager['FIO'];
    $inCount = $manager[INCOMING]['count'];
    $inTime = $manager[INCOMING]['time'];
    $outCount = $manager[OUTGOING]['count'];
    $outTime = $manager[OUTGOING]['time'];

    if (!($sth->fetch()))
    {
        $sql .= "INSERT INTO " . CALLS . " (`date`, `name`, `email`, `count_in`, `time_in`, `count_out`, `time_out`) VALUES ('$dateNow','$name','$email',$inCount,$inTime,$outCount, $outTime);";
    }
    else
    {
        $sql .= "UPDATE " . CALLS . " SET `count_in` = $inCount, `time_in` = $inTime, `count_out` = $outCount, `time_out` = $outTime WHERE date = '$dateNow' AND email = '$email';";
    }
}
echo $sql;
$pdo->exec($sql);