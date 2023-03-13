<?php

class GetData
{
    public static function callsList($dateStartUnix, $dateEndUnix){
        $offset = 0;
        $arr_calls = [];
        while (true){
            $string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=$offset&from_date=$dateStartUnix&to_date=$dateEndUnix");
            $arr = json_decode($string, true);
            $offset += $arr['results_next_offset'];
            array_push($arr_calls, ...$arr['results']);
            if(!$arr['results_next_offset']) break;
        }
        return $arr_calls;
    }
}