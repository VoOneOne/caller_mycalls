<?php

class Update
{
    public static function calls($data, $dateStartUnix){
        global $pdo;
        $dateNow = date('Y-m-d', $dateStartUnix);
        $sql = '';
        foreach ($data as $email => $manager) {
            $sqlCheck = "SELECT id FROM " . CALLS . " WHERE date='$dateNow' AND email='$email'";
            $sth = $pdo->query($sqlCheck);
            $name = $manager['FIO'];
            $inCount = $manager[INCOMING]['count'];
            $inTime = $manager[INCOMING]['time'];
            $outCount = $manager[OUTGOING]['count'];
            $outTime = $manager[OUTGOING]['time'];

            if (!($sth->fetch()))
            {
                $sql .= "INSERT INTO " . CALLS . " (`date`, `name`, `email`, `count_in`, `time_in`, `count_out`, `time_out`) VALUES ('$dateNow','$name','$email',$inCount,'$inTime',$outCount, '$outTime');";
            }
            else
            {
                $sql .= "UPDATE " . CALLS . " SET `count_in` = $inCount, `time_in` = '$inTime', `count_out` = $outCount, `time_out` = '$outTime' WHERE date = '$dateNow' AND email = '$email';";
            }
        }
        $pdo->exec($sql);
    }
}