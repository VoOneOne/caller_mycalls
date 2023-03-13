<?php

class UpdateDB
{
    public static function managers($data, $dateStartUnix){
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
    public static function callBack($data){
        global $pdo;
        $dateNow = date('Y-m-d H:i:s', time() + 3 * HOUR);
        $sql = 'DELETE FROM ' . BASE . ' WHERE name=\'call_back\';' ;
        $pdo->exec($sql);
        $sql = '';
        foreach ($data as $phone){
            $sql .= 'INSERT INTO ' . BASE . " (name, value, date) VALUES ('call_back', '$phone', '$dateNow');";
        }
        $count_phone = count($data);
        $sql .= 'DELETE FROM ' . BASE . ' WHERE name=\'count_call_back\';' ;
        $sql .= 'INSERT INTO ' . BASE . " (name, value, date) VALUES ('count_call_back', $count_phone, '$dateNow');";
        $pdo->exec($sql);
    }

}