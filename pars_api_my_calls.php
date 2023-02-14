<?php
    $servername = "localhost";
    $username = "u1593167_sops";
    $password = "1sopsroot1";
    $dbname = "u1593167_sops";

    //получение времени "до"
    $time_is_now = time();
    //echo "Время сейчас: " . $time_is_now . "<br />";
  
    //получение времени "начало"
    $time=time();
    $the_time = ($time-$time%86400);
    //echo "Время начала суток: " . $the_time . "<br />";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    //Запрос для данных сегодня
    $string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=0&from_date=$the_time&to_date=$time_is_now");
    
    //Запрос для конкретных дат.
    // $start = 1669939200;
    // $finish = 1670025599;
    //$string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=0&from_date=$start&to_date=$finish");
    //Конец запроса для конкретных дат
    
    $json = json_decode($string, true);
    //var_dump($json);
    
    // $calls = 0; 
    // $tmp_calls = $json['results_count'];
    // if ($tmp_calls > 0) {
    //     $calls = $tmp_calls;
    // }
    // echo "Общее количество звонков за день: " . $tmp_calls . "<br />";
    //=================================================================================
    
    //функци преобразование время в секундах в нормальное время
    function normal_time($time) {
        $hours = floor($time / 60 / 60); //часы
        $minutes = floor(($time / 60) % 60); //минуты
        $seconds = floor($time % 60); //секунды
    
        //добавь 0 если врямя меньше 10
        if ($hours < 10) {
            $hours = '0' . $hours;
        }
        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }
        if ($seconds < 10) {
            $seconds = '0' . $seconds;
        }
        $times = $hours . ":" . $minutes . ":" . $seconds;
        return $times;
    }
    //=================================================================================
    //массив звонков
    $arr_calls = $json['results'];
    //var_dump($arr_calls);
    
    //счётчик входящих звонков количество
    $incoming_counter = 0;
    
    //счётчик времени входящих звонков
    $incoming_call_time_counter = 0;
    
    //нулевые значения переменных для менеджеров 
    //Всего звонков Бурлака 1
    $call_burlaka = 0; //количество
    $time_burlaka = 0; //время входящих
    $number_of_outgoing_calls_burlaka = 0; //количество исходящих звонков
    $outgoing_call_time_burlaka = 0; //время исходящих звонков 

    //Всего звонков Гетигежев 2
    $call_getigejev = 0; //количество
    $time_getigejev = 0; //время входящих
    $number_of_outgoing_calls_getigejev = 0; //количество исходящих звонков
    $outgoing_call_time_getigejev = 0; //время исходящих звонков
    
    //Всего звонков Горбатовский 3
    $call_gorbas = 0; //количество
    $time_gorbas = 0; //время входящих
    $number_of_outgoing_calls_gorbas = 0; //количество исходящих звонков
    $outgoing_call_time_gorbas = 0; //время исходящих звонков
    
    //Всего звонков Дубнов 4
    $call_dubnov = 0; //количество
    $time_dubnov = 0; //время входящих
    $number_of_outgoing_calls_dubnov = 0; //количество исходящих звонков
    $outgoing_call_time_dubnov = 0; //время исходящих звонков
    
    //Всего звонков Зозуля 5
    $call_zozulya = 0; //количество
    $time_zozulya = 0; //время входящих
    $number_of_outgoing_calls_zozulya = 0; //количество исходящих звонков
    $outgoing_call_time_zozulya = 0; //время исходящих звонков 
    
    //Всего звонков Киреев 6
    $call_kireev = 0; //количество
    $time_kireev = 0; //время входящих
    $number_of_outgoing_calls_kireev = 0; //количество исходящих звонков
    $outgoing_call_time_kireev = 0; //время исходящих звонков
    
    //Всего звонков Королёв 7
    $call_korolev = 0; //количество
    $time_korolev = 0; //время входящих
    $number_of_outgoing_calls_korolev = 0; //количество исходящих звонков
    $outgoing_call_time_korolev = 0; //время исходящих звонков
    
    //Всего звонков Муравьев 8
    $call_muraviev = 0; //количество
    $time_muraviev = 0; //время входящих
    $number_of_outgoing_calls_muraviev = 0; //количество исходящих звонков
    $outgoing_call_time_muraviev = 0; //время исходящих звонков 
    
    //Всего звонков Мустяца 9
    $call_mustyaca = 0; //количество
    $time_mustyaca = 0; //время входящих
    $number_of_outgoing_calls_mustyaca = 0; //количество исходящих звонков
    $outgoing_call_time_mustyaca = 0; //время исходящих звонков 
    
    //Всего звонков Носовский 10
    $call_nosovskiy = 0; //количество
    $time_nosovskiy = 0; //время входящих
    $number_of_outgoing_calls_nosovskiy = 0; //количество исходящих звонков
    $outgoing_call_time_nosovskiy = 0; //время исходящих звонков
    
    //Всего звонков Румянцев 11
    $call_rumyancev = 0; //количество
    $time_rumyancev = 0; //время входящих
    $number_of_outgoing_calls_rumyancev = 0; //количество исходящих звонков
    $outgoing_call_time_rumyancev = 0; //время исходящих звонков
    
    //Всего звонков Таранков 12
    $call_tarankov = 0; //количество
    $time_tarankov = 0; //время входящих
    $number_of_outgoing_calls_tarankov = 0; //количество исходящих звонков
    $outgoing_call_time_tarankov = 0; //время исходящих звонков
    
    //Всего звонков Чувилёв 13
    $call_chuvilev = 0; //количество
    $time_chuvilev = 0; //время входящих
    $number_of_outgoing_calls_chuvilev = 0; //количество исходящих звонков
    $outgoing_call_time_chuvilev = 0; //время исходящих звонков
    
    //Всего звонков Статистика 14
    $call_stats = 0; //количество
    $time_stats = 0; //время входящих
    
    //Всего звонков НН
    $all_call_NN = 0; //количество
    $all_time_NN = 0; //время входящих
    
    //Всего звонков Москва
    $all_call_Msk = 0; //количество
    $all_time_Msk = 0; //время входящих
    
    //Всего время звонков
    $all_call_duration = 0;
    
    //=================================================================================
    foreach ($arr_calls as $call) {
        if ($call['user_account'] == "tarankov@worktruck.ru" or $call['user_account'] == "maa@worktruck.ru" or $call['user_account'] == "1661@worktruck.ru" or $call['user_account'] == "korolev@worktruck.ru" or $call['user_account'] == "burlaka@worktruck.ru" or $call['user_account'] == "kireev@worktruck.ru" or $call['user_account'] == "polikanin@worktruck.ru" or $call['user_account'] == "zozulya@worktruck.ru") {
            $all_call_NN = $all_call_NN + 1;
            $all_time_NN = $all_time_NN + $call['duration'];
        }
        if ($call['user_account'] == "3036@worktruck.ru" or $call['user_account'] == "gorbas@worktruck.ru" or $call['user_account'] == "mchuvilev@worktruck.ru" or $call['user_account'] == "9788@worktruck.ru" or $call['user_account'] == "getigezhev@worktruck.ru") {
            $all_call_Msk = $all_call_Msk + 1;
            $all_time_Msk = $all_time_Msk + $call['duration'];
        }
        $all_call_duration = $all_call_duration + $call['duration'];
        
        if ($call['direction'] == 0) {
            
            
            $incoming_counter++;
            $incoming_call_time_counter = $incoming_call_time_counter + $call['duration']; 
            if ($call['user_account'] == "burlaka@worktruck.ru") { //1
                $call_burlaka = $call_burlaka + 1;
                $time_burlaka = $time_burlaka + $call['duration'];
            }
            if ($call['user_account'] == "getigezhev@worktruck.ru") { //2
                $call_getigejev = $call_getigejev + 1;
                $time_getigejev = $time_getigejev + $call['duration'];
            }
            if ($call['user_account'] == "gorbas@worktruck.ru") { //3
                $call_gorbas = $call_gorbas + 1;
                $time_gorbas = $time_gorbas + $call['duration'];
            }
            if ($call['user_account'] == "1661@worktruck.ru") { //4
                $call_dubnov = $call_dubnov + 1;
                $time_dubnov = $time_dubnov + $call['duration'];
            }
            if ($call['user_account'] == "zozulya@worktruck.ru") { //5
                $call_zozulya = $call_zozulya + 1;
                $time_zozulya = $time_zozulya + $call['duration'];
            }
            if ($call['user_account'] == "kireev@worktruck.ru") { //6
                $call_kireev = $call_kireev + 1;
                $time_kireev = $time_kireev + $call['duration'];
            }
            if ($call['user_account'] == "korolev@worktruck.ru") { //7
                $call_korolev = $call_korolev + 1;
                $time_korolev = $time_korolev + $call['duration'];
            }
            if ($call['user_account'] == "maa@worktruck.ru") { //8
                $call_muraviev = $call_muraviev + 1;
                $time_muraviev = $time_muraviev + $call['duration'];
            }
            if ($call['user_account'] == "3036@worktruck.ru") { //9
                $call_mustyaca = $call_mustyaca + 1;
                $time_mustyaca = $time_mustyaca + $call['duration'];
            }
            if ($call['user_account'] == "9788@worktruck.ru") { //10
                $call_nosovskiy = $call_nosovskiy + 1;
                $time_nosovskiy = $time_nosovskiy + $call['duration'];
            }
            if ($call['user_account'] == "polikanin@worktruck.ru") { //11
                $call_rumyancev = $call_rumyancev + 1;
                $time_rumyancev = $time_rumyancev + $call['duration'];
            }
            if ($call['user_account'] == "tarankov@worktruck.ru") { //12
                $call_tarankov = $call_tarankov + 1;
                $time_tarankov = $time_tarankov + $call['duration'];
            }
            if ($call['user_account'] == "mchuvilev@worktruck.ru") { //13
                $call_chuvilev = $call_chuvilev + 1;
                $time_chuvilev = $time_chuvilev + $call['duration'];
            }
            if ($call['user_account'] == "statistika@worktruck.ru") { //14
                $call_stats = $call_stats + 1;
                $time_stats = $time_stats + $call['duration'];
            }
        }
        if ($call['direction'] == 1) {
            if ($call['user_account'] == "burlaka@worktruck.ru") { //1
                $number_of_outgoing_calls_burlaka = $number_of_outgoing_calls_burlaka + 1;
                $outgoing_call_time_burlaka = $outgoing_call_time_burlaka + $call['duration'];
            }
            if ($call['user_account'] == "getigezhev@worktruck.ru") { //2
                $number_of_outgoing_calls_getigejev = $number_of_outgoing_calls_getigejev + 1;
                $outgoing_call_time_getigejev = $outgoing_call_time_getigejev + $call['duration'];
            }
            if ($call['user_account'] == "gorbas@worktruck.ru") { //3
                $number_of_outgoing_calls_gorbas = $number_of_outgoing_calls_gorbas + 1;
                $outgoing_call_time_gorbas = $outgoing_call_time_gorbas + $call['duration'];
            }
            if ($call['user_account'] == "1661@worktruck.ru") { //4
                $number_of_outgoing_calls_dubnov = $number_of_outgoing_calls_dubnov + 1;
                $outgoing_call_time_dubnov = $outgoing_call_time_dubnov + $call['duration'];
            }
            if ($call['user_account'] == "zozulya@worktruck.ru") { //5
                $number_of_outgoing_calls_zozulya = $number_of_outgoing_calls_zozulya + 1;
                $outgoing_call_time_zozulya = $outgoing_call_time_zozulya + $call['duration'];
            }
            if ($call['user_account'] == "kireev@worktruck.ru") { //6
                $number_of_outgoing_calls_kireev = $number_of_outgoing_calls_kireev + 1;
                $outgoing_call_time_kireev = $outgoing_call_time_kireev + $call['duration'];
            }
            if ($call['user_account'] == "korolev@worktruck.ru") { //7
                $number_of_outgoing_calls_korolev = $number_of_outgoing_calls_korolev + 1;
                $outgoing_call_time_korolev = $outgoing_call_time_korolev + $call['duration'];
            }
            if ($call['user_account'] == "maa@worktruck.ru") { //8
                $number_of_outgoing_calls_muraviev = $number_of_outgoing_calls_muraviev + 1;
                $outgoing_call_time_muraviev = $outgoing_call_time_muraviev + $call['duration'];
            }
            if ($call['user_account'] == "3036@worktruck.ru") { //9
                $number_of_outgoing_calls_mustyaca = $number_of_outgoing_calls_mustyaca + 1;
                $outgoing_call_time_mustyaca = $outgoing_call_time_mustyaca + $call['duration'];
            }
            if ($call['user_account'] == "9788@worktruck.ru") { //10
                $number_of_outgoing_calls_nosovskiy = $number_of_outgoing_calls_nosovskiy + 1;
                $outgoing_call_time_nosovskiy = $outgoing_call_time_nosovskiy + $call['duration'];
            }
            if ($call['user_account'] == "polikanin@worktruck.ru") { //11
                $number_of_outgoing_calls_rumyancev = $number_of_outgoing_calls_rumyancev + 1;
                $outgoing_call_time_rumyancev = $outgoing_call_time_rumyancev + $call['duration'];
            }
            if ($call['user_account'] == "tarankov@worktruck.ru") { //12
                $number_of_outgoing_calls_tarankov = $number_of_outgoing_calls_tarankov + 1;
                $outgoing_call_time_tarankov = $outgoing_call_time_tarankov + $call['duration'];
            }
            if ($call['user_account'] == "mchuvilev@worktruck.ru") { //13
                $number_of_outgoing_calls_chuvilev = $number_of_outgoing_calls_chuvilev + 1;
                $outgoing_call_time_chuvilev = $outgoing_call_time_chuvilev + $call['duration'];
            }
        }
        //echo $call['user_account'];
    }
    unset($value);
    
    //Общее время звонков НН - $all_time_NN
    'Общее время звонков НН: ' . normal_time($all_time_NN) . '<br />';
    //Общее время входящих звонков НН
    $time_NN = $time_dubnov + $time_muraviev + $time_korolev + $time_zozulya + $time_burlaka + $time_kireev + $time_tarankov + $time_stats + $time_rumyancev;
    'Время нижегородских входящих звонков: ' . normal_time($time_NN) . '<br />';
    //Общее количество входящих звонков НН
    $call_NN = $call_dubnov + $call_muraviev + $call_korolev + $call_zozulya + $call_burlaka + $call_kireev + $call_tarankov + $call_stats + $call_rumyancev;
    'Количество нижегородских входящих звонков: ' . $call_NN . '<br />';
    //Общее количество звонков НН - $all_call_NN
    'Общее колличество звонков НН: ' . $all_call_NN . '<br />';
    
    //Общее время звонков Москва - $all_time_Msk
    'Общее время звонков Москва: ' . normal_time($all_time_Msk) . '<br />'; 
    //Общее время входящих звонков Москва
    $time_Msk = $time_mustyaca + $time_nosovskiy + $time_getigejev + $time_gorbas + $time_chuvilev;
    'Время московских входящих звонков: ' . normal_time($time_Msk) . '<br />';
    //Общее количество входящих звонков Москва 
    $call_Msk = $call_mustyaca + $call_nosovskiy + $call_getigejev + $call_gorbas + $call_chuvilev;
    'Количество московских входящих звонков: ' . $call_Msk . '<br />';
    //Общее количество звонков Москва - $all_call_Msk
    'Общее количество звонков Москва: ' . $all_call_Msk . '<br />';
    
    //Всего НН + Москва
    //$all_call_NN_Msk = $json['results_count']; //общее количество звонков - получаю из $json
    
    $all_call_NN_Msk = $all_call_Msk + $all_call_NN;
    'Всего звонков: ' . $all_call_NN_Msk . '<br />';
    'Всего входящих звонков: ' . $incoming_counter . '<br />'; //общее количество входящих звонков
    'Время звонков: ' . normal_time($all_call_duration) . '<br />'; //общее время звонков
    'Время входящих звонков: ' . normal_time($incoming_call_time_counter) . '<br />';  //общее время входящих звонков
    
    
    //метод изменения даты	======================================================================================
//      $sql6 = "SELECT * FROM `wp_api_my_calls`"; //выбираю последнюю строку в таблице
//     $result6 = mysqli_query($conn, $sql6); // проверка соединения
//     $rows6 = mysqli_fetch_all($result6, MYSQLI_ASSOC); //преобразование result в массив

// foreach ($rows6 as $row) {
// 	$chaenge_date = $row['date'];
// 	$arr_chaenge_date = explode("-", $chaenge_date);
// 	$d = $arr_chaenge_date[0];
// 	$m = $arr_chaenge_date[1];
//  	$Y = $arr_chaenge_date[2];
// 	$call_id = $row['id'];
// 	echo $new_date = $Y . '-' . $m . '-' . $d;
  
// 	$sql = "UPDATE `wp_api_my_calls` SET `date`='$new_date' WHERE `id`=$call_id";
// 	  if ($conn->query($sql) === TRUE) {
// 		echo "Дату поменял. ";
// 	} else {
// 		echo "Error: " . $sql . "<br>" . $conn->error."<br>";
// 	}
// }
//конец метода изменения даты	===================================================================================
    
    
    
    //приведение времени из секунд к нормальному времени
    $today = date("Y-m-d");
    // $today = date("Y-m-d", $start); //преобразование unix в нормальную дату для конкретной даты
    // echo $today;
    
    // Общее время звонков менеджеров
    $all_time_burlaka = $time_burlaka + $outgoing_call_time_burlaka;
    $all_time_burlaka = normal_time($all_time_burlaka); //------------------1
    
    $all_time_getigejev = $time_getigejev + $outgoing_call_time_getigejev;
    $all_time_getigejev = normal_time($all_time_getigejev); //--------------2
    
    $all_time_gorbas = $time_gorbas + $outgoing_call_time_gorbas;
    $all_time_gorbas = normal_time($all_time_gorbas); //--------------------3
    
    $all_time_dubnov = $time_dubnov + $outgoing_call_time_dubnov;
    $all_time_dubnov = normal_time($all_time_dubnov); //--------------------4
    
    $all_time_zozulya = $time_zozulya + $outgoing_call_time_zozulya;
    $all_time_zozulya = normal_time($all_time_zozulya); //------------------5
    
    $all_time_kireev = $time_kireev + $outgoing_call_time_kireev;
    $all_time_kireev = normal_time($all_time_kireev); //--------------------6
    
    $all_time_korolev = $time_korolev + $outgoing_call_time_korolev;
    $all_time_korolev = normal_time($all_time_korolev); //------------------7
    
    $all_time_muraviev = $time_muraviev + $outgoing_call_time_muraviev;
    $all_time_muraviev = normal_time($all_time_muraviev); //----------------8
    
    $all_time_mustyaca = $time_mustyaca + $outgoing_call_time_mustyaca;
    $all_time_mustyaca = normal_time($all_time_mustyaca); //----------------9
    
    $all_time_nosovskiy = $time_nosovskiy + $outgoing_call_time_nosovskiy;
    $all_time_nosovskiy = normal_time($all_time_nosovskiy); //-------------10
    
    $all_time_rumyancev = $time_rumyancev + $outgoing_call_time_rumyancev;
    $all_time_rumyancev = normal_time($all_time_rumyancev); //-------------11
    
    $all_time_tarankov = $time_tarankov + $outgoing_call_time_tarankov;
    $all_time_tarankov = normal_time($all_time_tarankov); //---------------12
    
    $all_time_chuvilev = $time_chuvilev + $outgoing_call_time_chuvilev; 
    $all_time_chuvilev = normal_time($all_time_chuvilev); //---------------13
    // Конц Общее время звонков менеджеров
    
    //Время входящих
    $all_call_duration_sql =  normal_time($all_call_duration);
    $incoming_call_time_counter_sql = normal_time($incoming_call_time_counter);
    $all_time_NN_sql = normal_time($all_time_NN);
    $time_NN_sql = normal_time($time_NN);
    $all_time_Msk_sql = normal_time($all_time_Msk);
    $time_Msk_sql = normal_time($time_Msk);
    $time_burlaka_sql = normal_time($time_burlaka);//-----------------------------------1
    $time_getigejev_sql = normal_time($time_getigejev);//-------------------------------2
    $time_gorbas_sql = normal_time($time_gorbas);//-------------------------------------3
    $time_dubnov_sql = normal_time($time_dubnov);//-------------------------------------4
    $time_zozulya_sql = normal_time($time_zozulya);//-----------------------------------5
    $time_kireev_sql = normal_time($time_kireev);//-------------------------------------6
    $time_korolev_sql = normal_time($time_korolev);//-----------------------------------7
    $time_muraviev_sql = normal_time($time_muraviev);//---------------------------------8
    $time_mustyaca_sql = normal_time($time_mustyaca);//---------------------------------9
    $time_nosovskiy_sql = normal_time($time_nosovskiy);//------------------------------10
    $time_rumyancev_sql = normal_time($time_rumyancev);//------------------------------11
    $time_tarankov_sql = normal_time($time_tarankov);//--------------------------------12
    $time_chuvilev_sql = normal_time($time_chuvilev);//--------------------------------13
    $time_stats_sql = normal_time($time_stats);
    //Конец время входящих
    
    //Время исходящих звонков
    $outgoing_call_time_burlaka_sql = normal_time($outgoing_call_time_burlaka);//-------1
    $outgoing_call_time_getigejev_sql = normal_time($outgoing_call_time_getigejev);//---2
    $outgoing_call_time_gorbas_sql = normal_time($outgoing_call_time_gorbas);//---------3
    $outgoing_call_time_dubnov_sql = normal_time($outgoing_call_time_dubnov);//---------4
    $outgoing_call_time_zozulya_sql = normal_time($outgoing_call_time_zozulya);//-------5
    $outgoing_call_time_kireev_sql = normal_time($outgoing_call_time_kireev);//---------6
    $outgoing_call_time_korolev_sql = normal_time($outgoing_call_time_korolev);//-------7
    $outgoing_call_time_muraviev_sql = normal_time($outgoing_call_time_muraviev);//-----8
    $outgoing_call_time_mustyaca_sql = normal_time($outgoing_call_time_mustyaca);//-----9
    $outgoing_call_time_nosovskiy_sql = normal_time($outgoing_call_time_nosovskiy);//--10
    $outgoing_call_time_rumyancev_sql = normal_time($outgoing_call_time_rumyancev);//--11
    $outgoing_call_time_tarankov_sql = normal_time($outgoing_call_time_tarankov); //---12
    $outgoing_call_time_chuvilev_sql = normal_time($outgoing_call_time_chuvilev);//----13
    //Конец время исходящих звонков

//Получение вчерашних РЕКОРДОВ
    $sql2 = "SELECT * FROM `wp_api_my_calls` ORDER BY `id` DESC LIMIT 2 "; //выбираю последнюю строку в таблице
    $result2 = mysqli_query($conn, $sql2); // проверка соединения
    $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC); //преобразование result в массив
    
    $yesterday_record_number_of_calls = $rows2[1]['record_number_of_calls'];                    // рекорд кол звонков из вчера
    $yesterday_record_number_of_incoming_calls = $rows2[1]['record_number_of_incoming_calls'];  // рекорд входящих звонков из вчера
    $yesterday_record_incoming_call_time = $rows2[1]['record_incoming_call_time'];              // рекорд входящего времени из вчера

    //Добавление данных в БД и обновление последней строки  ====================================================================== РЕКОРДЫ
    $sql = "SELECT * FROM `wp_api_my_calls` ORDER BY `id` DESC LIMIT 1 "; //выбираю последнюю строку в таблице
    $result = mysqli_query($conn, $sql); // проверка соединения
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); //преобразование result в массив
    $call_id = $rows[0]['id']; //получаю id последней строки
    echo 'Данные за ' . $rows[0]['date'] . '. ';
    
    $record1 = $rows[0]['record_incoming_call_time'];
    
    $arr15 = explode(":", $record1);
    $h = (int)$arr15[0];
    $m = (int)$arr15[1];
    $s = (int)$arr15[2];
    $record_in_second = ($h * 60 * 60) + ($m * 60) + $s; //ПЕРЕМЕННАЯ СЕГОДНЕШНЕГО ВРЕМЕННОГО РЕКОРДА В СЕКУНДАХ
    
    //Установка рекордов, сравнение с текущим значением. =============================================================
    if ($incoming_call_time_counter > $record_in_second) {
        $record1 = normal_time($incoming_call_time_counter);
        $sql = "UPDATE `wp_api_my_calls` SET `record_incoming_call_time`= $record1 WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    $record2 = $rows[0]['record_number_of_incoming_calls'];
    if ($incoming_counter > $record2) {
        $sql = "UPDATE `wp_api_my_calls` SET `record_number_of_incoming_calls`= $incoming_counter WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    $record3 = $rows[0]['record_number_of_calls'];
    if ($all_call_NN_Msk > $record3) {
        $sql = "UPDATE `wp_api_my_calls` SET `record_number_of_calls`= $all_call_NN_Msk WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    //Конец установки рекордов, сравнение с текущим значением. =======================================================


    //========================================================================================================================= РЕКОРДЫ

    if ($rows[0]['date'] == $today) {
        $sql = "UPDATE `wp_api_my_calls` SET `nn_m_all_count`=$all_call_NN_Msk,`nn_m_count_incoming`='$incoming_counter',`nn_m_all_time`='$all_call_duration_sql',`nn_m_time_incoming`='$incoming_call_time_counter_sql', 
        `nn_all_count`=$all_call_NN, `nn_count_incoming`=$call_NN, `nn_all_time`='$all_time_NN_sql', `nn_time_incoming`='$time_NN_sql', 
        `m_all_count`=$all_call_Msk, `m_count_incoming`=$call_Msk, `m_all_time`='$all_time_Msk_sql', `m_time_incoming`='$time_Msk_sql', 
        `burlaka_count`=$call_burlaka, `burlaka_time`='$time_burlaka_sql', `getigejev_count`=$call_getigejev, `getigejev_time`='$time_getigejev_sql', 
        `gorbas_count`=$call_gorbas, `gorbas_time`='$time_gorbas_sql', `dubnov_count`=$call_dubnov, `dubnov_time`='$time_dubnov_sql', 
        `zozulya_count`=$call_zozulya, `zozulya_time`='$time_zozulya_sql', `kireev_count`=$call_kireev, `kireev_time`='$time_kireev_sql', 
        `korolev_count`=$call_korolev, `korolev_time`='$time_korolev_sql', `muraviev_count`=$call_muraviev, `muraviev_time`='$time_muraviev_sql',
        `mustyaca_count`=$call_mustyaca, `mustyaca_time`='$time_mustyaca_sql', `nosovskiy_count`=$call_nosovskiy, `nosovskiy_time`='$time_nosovskiy_sql', 
        `rumyancev_count`=$call_rumyancev, `rumyancev_time`='$time_rumyancev_sql', `stats_count`=$call_stats, `stats_time`='$time_stats_sql', 
        `tarankov_count`=$call_tarankov, `tarankov_time`='$time_tarankov_sql', `chuvilev_count`=$call_chuvilev, `chuvilev_time`='$time_chuvilev_sql',
        `number_of_outgoing_calls_tarankov`=$number_of_outgoing_calls_tarankov, `outgoing_call_time_tarankov` = '$outgoing_call_time_tarankov_sql',
        `number_of_outgoing_calls_burlaka`=$number_of_outgoing_calls_burlaka, `outgoing_call_time_burlaka`='$outgoing_call_time_burlaka_sql',
        `number_of_outgoing_calls_muraviev`=$number_of_outgoing_calls_muraviev, `outgoing_call_time_muraviev`='$outgoing_call_time_muraviev_sql',
        `number_of_outgoing_calls_dubnov`=$number_of_outgoing_calls_dubnov, `outgoing_call_time_dubnov`='$outgoing_call_time_dubnov_sql',
        `number_of_outgoing_calls_mustyaca`=$number_of_outgoing_calls_mustyaca, `outgoing_call_time_mustyaca`='$outgoing_call_time_mustyaca_sql',
        `number_of_outgoing_calls_korolev`=$number_of_outgoing_calls_korolev, `outgoing_call_time_korolev`='$outgoing_call_time_korolev_sql',
        `number_of_outgoing_calls_gorbas`=$number_of_outgoing_calls_gorbas, `outgoing_call_time_gorbas`='$outgoing_call_time_gorbas_sql',
        `number_of_outgoing_calls_kireev`=$number_of_outgoing_calls_kireev, `outgoing_call_time_kireev`='$outgoing_call_time_kireev_sql',
        `number_of_outgoing_calls_chuvilev`=$number_of_outgoing_calls_chuvilev, `outgoing_call_time_chuvilev`='$outgoing_call_time_chuvilev_sql',
        `number_of_outgoing_calls_rumyancev`=$number_of_outgoing_calls_rumyancev, `outgoing_call_time_rumyancev`='$outgoing_call_time_rumyancev_sql',
        `number_of_outgoing_calls_nosovskiy`=$number_of_outgoing_calls_nosovskiy, `outgoing_call_time_nosovskiy`='$outgoing_call_time_nosovskiy_sql',
        `number_of_outgoing_calls_getigejev`=$number_of_outgoing_calls_getigejev, `outgoing_call_time_getigejev`='$outgoing_call_time_getigejev_sql',
        `number_of_outgoing_calls_zozulya`=$number_of_outgoing_calls_zozulya, `outgoing_call_time_zozulya`='$outgoing_call_time_zozulya_sql',
        
        `all_time_burlaka`='$all_time_burlaka',`all_time_getigejev`='$all_time_getigejev', `all_time_gorbas`='$all_time_gorbas', `all_time_dubnov`='$all_time_dubnov',
        `all_time_zozulya`='$all_time_zozulya', `all_time_kireev`='$all_time_kireev', `all_time_korolev`='$all_time_korolev', `all_time_muraviev`='$all_time_muraviev',
        `all_time_mustyaca`='$all_time_mustyaca', `all_time_nosovskiy`='$all_time_nosovskiy', `all_time_rumyancev`='$all_time_rumyancev', `all_time_tarankov`='$all_time_tarankov',
        `all_time_chuvilev`='$all_time_chuvilev'
        WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    } else {
        $sql = "INSERT INTO wp_api_my_calls (`date`, `record_incoming_call_time` , `record_number_of_incoming_calls` , record_number_of_calls,
        `nn_m_all_count`, `nn_m_count_incoming`, `nn_m_all_time`, `nn_m_time_incoming`, 
        `nn_all_count`, `nn_count_incoming`, `nn_all_time`, `nn_time_incoming`, 
        `m_all_count`, `m_count_incoming`, `m_all_time`, `m_time_incoming`, 
        `burlaka_count`, `burlaka_time`, `getigejev_count`, `getigejev_time`, `gorbas_count`, `gorbas_time`, `dubnov_count`, `dubnov_time`, 
        `zozulya_count`, `zozulya_time`, `kireev_count`, `kireev_time`, `korolev_count`, `korolev_time`, `muraviev_count`, `muraviev_time`, 
        `mustyaca_count`, `mustyaca_time`, `nosovskiy_count`, `nosovskiy_time`, `rumyancev_count`, `rumyancev_time`, `stats_count`, `stats_time`, 
        `tarankov_count`, `tarankov_time`, `chuvilev_count`, `chuvilev_time`, `number_of_outgoing_calls_tarankov`,`outgoing_call_time_tarankov`,
        `number_of_outgoing_calls_burlaka`,`outgoing_call_time_burlaka`,`number_of_outgoing_calls_muraviev`,`outgoing_call_time_muraviev`,
        `number_of_outgoing_calls_dubnov`, `outgoing_call_time_dubnov`,`number_of_outgoing_calls_mustyaca`, `outgoing_call_time_mustyaca`,
        `number_of_outgoing_calls_korolev`,`outgoing_call_time_korolev`, `number_of_outgoing_calls_gorbas`, `outgoing_call_time_gorbas`,
        `number_of_outgoing_calls_kireev`, `outgoing_call_time_kireev`, `number_of_outgoing_calls_chuvilev`, `outgoing_call_time_chuvilev`,
        `number_of_outgoing_calls_rumyancev`, `outgoing_call_time_rumyancev`, `number_of_outgoing_calls_nosovskiy`, `outgoing_call_time_nosovskiy`,
        `number_of_outgoing_calls_getigejev`, `outgoing_call_time_getigejev`, `number_of_outgoing_calls_zozulya`, `outgoing_call_time_zozulya`,
        `all_time_burlaka`, `all_time_getigejev`, `all_time_gorbas`, `all_time_dubnov`, `all_time_zozulya`, `all_time_kireev`, `all_time_korolev`,
        `all_time_muraviev`, `all_time_mustyaca`, `all_time_nosovskiy`, `all_time_rumyancev`, `all_time_tarankov`, `all_time_chuvilev`
        ) VALUES 
            ('$today', '$yesterday_record_incoming_call_time', $yesterday_record_number_of_incoming_calls, $yesterday_record_number_of_calls,
            $all_call_NN_Msk, $incoming_counter, '$all_call_duration_sql', '$incoming_call_time_counter_sql', 
            $all_call_NN, $call_NN, '$all_time_NN_sql', '$time_NN_sql', 
            $all_call_Msk, $call_Msk, '$all_time_Msk_sql', '$time_Msk_sql'
            ,$call_burlaka, '$time_burlaka_sql',$call_getigejev, '$time_getigejev_sql', $call_gorbas, '$time_gorbas_sql', $call_dubnov, '$time_dubnov_sql', 
            $call_zozulya, '$time_zozulya_sql', $call_kireev, '$time_kireev_sql', $call_korolev, '$time_korolev_sql', $call_muraviev, '$time_muraviev_sql',
            $call_mustyaca, '$time_mustyaca_sql', $call_nosovskiy, '$time_nosovskiy_sql', $call_rumyancev, '$time_rumyancev_sql', $call_stats, '$time_stats_sql', 
            $call_tarankov, '$time_tarankov_sql', $call_chuvilev, '$time_chuvilev_sql',$number_of_outgoing_calls_tarankov,'$outgoing_call_time_tarankov_sql',
            $number_of_outgoing_calls_burlaka, '$outgoing_call_time_burlaka_sql',$number_of_outgoing_calls_muraviev,'$outgoing_call_time_muraviev_sql',
            $number_of_outgoing_calls_dubnov, '$outgoing_call_time_dubnov_sql',$number_of_outgoing_calls_mustyaca,'$outgoing_call_time_mustyaca_sql',
            $number_of_outgoing_calls_korolev, '$outgoing_call_time_korolev_sql', $number_of_outgoing_calls_gorbas, '$outgoing_call_time_gorbas_sql',
            $number_of_outgoing_calls_kireev, '$outgoing_call_time_kireev_sql', $number_of_outgoing_calls_chuvilev, '$outgoing_call_time_chuvilev_sql',
            $number_of_outgoing_calls_rumyancev, '$outgoing_call_time_rumyancev_sql', $number_of_outgoing_calls_nosovskiy, '$outgoing_call_time_nosovskiy_sql',
            $number_of_outgoing_calls_getigejev, '$outgoing_call_time_getigejev_sql', $number_of_outgoing_calls_zozulya, '$outgoing_call_time_zozulya_sql',
            '$all_time_burlaka', '$all_time_getigejev', '$all_time_gorbas', '$all_time_dubnov', '$all_time_zozulya', '$all_time_kireev', '$all_time_korolev',
            '$all_time_muraviev', '$all_time_mustyaca', '$all_time_nosovskiy', '$all_time_rumyancev', '$all_time_tarankov', '$all_time_chuvilev'
            )";

        if ($conn->query($sql) === TRUE) {
            echo "Создана новая запись."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    
//Проверка рекордов на max
    $today_time = $rows[0]['record_incoming_call_time'];         //рекорд входящего времени СЕГОДНЯ
    $yesterday_time = $rows2[1]['record_incoming_call_time'];    // рекорд входящего времени ВЧЕРА

    function time_second($arr) {
        $arr15 = explode(":", $arr);
        $h = (int)$arr15[0];
        $m = (int)$arr15[1];
        $s = (int)$arr15[2];
        $second = ($h * 60 * 60) + ($m * 60) + $s;
        return $second;
    }

    if ($yesterday_record_number_of_calls > $record3) {
        $sql = "UPDATE `wp_api_my_calls` SET `record_number_of_calls`= $yesterday_record_number_of_calls WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    if ($yesterday_record_number_of_incoming_calls > $record2) {
        $sql = "UPDATE `wp_api_my_calls` SET `record_number_of_incoming_calls`= $yesterday_record_number_of_incoming_calls WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
    if (time_second($yesterday_time) > time_second($today_time)) {
        $sql = "UPDATE `wp_api_my_calls` SET `record_incoming_call_time`= '$yesterday_time' WHERE `id`=$call_id";
        if ($conn->query($sql) === TRUE) {
            echo "Запись обновлена."."<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error."<br>";
        }
    }
//Конец Проверки рекордов на max   
    
    
    if ($all_call_NN_Msk == 500) {
        $string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=500&from_date=$the_time&to_date=$time_is_now");
        
        //запрос для конкретных дат при оффсет больше 500
        //$string = file_get_contents("https://worktruck.moizvonki.ru/api/v1/?user_name=admin@worktruck.ru&api_key=vow5s7xvh17o6v04588eumb1noe5y5gg&action=calls.list&supervised=1&from_offset=500&from_date=$start&to_date=$finish");
        $json = json_decode($string, true);
        var_dump($json);
        
        $arr_calls = $json['results'];
        
        foreach ($arr_calls as $call) {
            if ($call['user_account'] == "tarankov@worktruck.ru" or $call['user_account'] == "maa@worktruck.ru" or $call['user_account'] == "1661@worktruck.ru" or $call['user_account'] == "korolev@worktruck.ru" or $call['user_account'] == "burlaka@worktruck.ru" or $call['user_account'] == "kireev@worktruck.ru" or $call['user_account'] == "polikanin@worktruck.ru" or $call['user_account'] == "zozulya@worktruck.ru" or $call['user_account'] == "statistika@worktruck.ru") {
                $all_call_NN = $all_call_NN + 1;
                $all_time_NN = $all_time_NN + $call['duration'];
            }
            if ($call['user_account'] == "3036@worktruck.ru" or $call['user_account'] == "gorbas@worktruck.ru" or $call['user_account'] == "mchuvilev@worktruck.ru" or $call['user_account'] == "9788@worktruck.ru" or $call['user_account'] == "getigezhev@worktruck.ru") {
                $all_call_Msk = $all_call_Msk + 1;
                $all_time_Msk = $all_time_Msk + $call['duration'];
            }
            $all_call_duration = $all_call_duration + $call['duration'];
        
            if ($call['direction'] == 0) {
                $incoming_counter++;
                $incoming_call_time_counter = $incoming_call_time_counter + $call['duration'];
                if ($call['user_account'] == "burlaka@worktruck.ru") { //1
                    $call_burlaka = $call_burlaka + 1;
                    $time_burlaka = $time_burlaka + $call['duration'];
                }
                if ($call['user_account'] == "getigezhev@worktruck.ru") { //2
                    $call_getigejev = $call_getigejev + 1;
                    $time_getigejev = $time_getigejev + $call['duration'];
                }
                if ($call['user_account'] == "gorbas@worktruck.ru") { //3
                    $call_gorbas = $call_gorbas + 1;
                    $time_gorbas = $time_gorbas + $call['duration'];
                }
                if ($call['user_account'] == "1661@worktruck.ru") { //4
                    $call_dubnov = $call_dubnov + 1;
                    $time_dubnov = $time_dubnov + $call['duration'];
                }
                if ($call['user_account'] == "zozulya@worktruck.ru") { //5
                    $call_zozulya = $call_zozulya + 1;
                    $time_zozulya = $time_zozulya + $call['duration'];
                }
                if ($call['user_account'] == "kireev@worktruck.ru") { //6
                    $call_kireev = $call_kireev + 1;
                    $time_kireev = $time_kireev + $call['duration'];
                }
                if ($call['user_account'] == "korolev@worktruck.ru") { //7
                    $call_korolev = $call_korolev + 1;
                    $time_korolev = $time_korolev + $call['duration'];
                }
                if ($call['user_account'] == "maa@worktruck.ru") { //8
                    $call_muraviev = $call_muraviev + 1;
                    $time_muraviev = $time_muraviev + $call['duration'];
                }
                if ($call['user_account'] == "3036@worktruck.ru") { //9
                    $call_mustyaca = $call_mustyaca + 1;
                    $time_mustyaca = $time_mustyaca + $call['duration'];
                }
                if ($call['user_account'] == "9788@worktruck.ru") { //10
                    $call_nosovskiy = $call_nosovskiy + 1;
                    $time_nosovskiy = $time_nosovskiy + $call['duration'];
                }
                if ($call['user_account'] == "polikanin@worktruck.ru") { //11
                    $call_rumyancev = $call_rumyancev + 1;
                    $time_rumyancev = $time_rumyancev + $call['duration'];
                }
                if ($call['user_account'] == "tarankov@worktruck.ru") { //12
                    $call_tarankov = $call_tarankov + 1;
                    $time_tarankov = $time_tarankov + $call['duration'];
                }
                if ($call['user_account'] == "mchuvilev@worktruck.ru") { //13
                    $call_chuvilev = $call_chuvilev + 1;
                    $time_chuvilev = $time_chuvilev + $call['duration'];
                }
                if ($call['user_account'] == "statistika@worktruck.ru") { //14
                    $call_stats = $call_stats + 1;
                    $time_stats = $time_stats + $call['duration'];
                }
            }
            if ($call['direction'] == 1) {
                if ($call['user_account'] == "burlaka@worktruck.ru") { //1
                    $number_of_outgoing_calls_burlaka = $number_of_outgoing_calls_burlaka + 1;
                    $outgoing_call_time_burlaka = $outgoing_call_time_burlaka + $call['duration'];
                }
                if ($call['user_account'] == "getigezhev@worktruck.ru") { //2
                    $number_of_outgoing_calls_getigejev = $number_of_outgoing_calls_getigejev + 1;
                    $outgoing_call_time_getigejev = $outgoing_call_time_getigejev + $call['duration'];
                }
                if ($call['user_account'] == "gorbas@worktruck.ru") { //3
                    $number_of_outgoing_calls_gorbas = $number_of_outgoing_calls_gorbas + 1;
                    $outgoing_call_time_gorbas = $outgoing_call_time_gorbas + $call['duration'];
                }
                if ($call['user_account'] == "1661@worktruck.ru") { //4
                    $number_of_outgoing_calls_dubnov = $number_of_outgoing_calls_dubnov + 1;
                    $outgoing_call_time_dubnov = $outgoing_call_time_dubnov + $call['duration'];
                }
                if ($call['user_account'] == "zozulya@worktruck.ru") { //5
                    $number_of_outgoing_calls_zozulya = $number_of_outgoing_calls_zozulya + 1;
                    $outgoing_call_time_zozulya = $outgoing_call_time_zozulya + $call['duration'];
                }
                if ($call['user_account'] == "kireev@worktruck.ru") { //6
                    $number_of_outgoing_calls_kireev = $number_of_outgoing_calls_kireev + 1;
                    $outgoing_call_time_kireev = $outgoing_call_time_kireev + $call['duration'];
                }
                if ($call['user_account'] == "korolev@worktruck.ru") { //7
                    $number_of_outgoing_calls_korolev = $number_of_outgoing_calls_korolev + 1;
                    $outgoing_call_time_korolev = $outgoing_call_time_korolev + $call['duration'];
                }
                if ($call['user_account'] == "maa@worktruck.ru") { //8
                    $number_of_outgoing_calls_muraviev = $number_of_outgoing_calls_muraviev + 1;
                    $outgoing_call_time_muraviev = $outgoing_call_time_muraviev + $call['duration'];
                }
                if ($call['user_account'] == "3036@worktruck.ru") { //9
                    $number_of_outgoing_calls_mustyaca = $number_of_outgoing_calls_mustyaca + 1;
                    $outgoing_call_time_mustyaca = $outgoing_call_time_mustyaca + $call['duration'];
                }
                if ($call['user_account'] == "9788@worktruck.ru") { //10
                    $number_of_outgoing_calls_nosovskiy = $number_of_outgoing_calls_nosovskiy + 1;
                    $outgoing_call_time_nosovskiy = $outgoing_call_time_nosovskiy + $call['duration'];
                }
                if ($call['user_account'] == "polikanin@worktruck.ru") { //11
                    $number_of_outgoing_calls_rumyancev = $number_of_outgoing_calls_rumyancev + 1;
                    $outgoing_call_time_rumyancev = $outgoing_call_time_rumyancev + $call['duration'];
                }
                if ($call['user_account'] == "tarankov@worktruck.ru") { //12
                    $number_of_outgoing_calls_tarankov = $number_of_outgoing_calls_tarankov + 1;
                    $outgoing_call_time_tarankov = $outgoing_call_time_tarankov + $call['duration'];
                }
                if ($call['user_account'] == "mchuvilev@worktruck.ru") { //13
                    $number_of_outgoing_calls_chuvilev = $number_of_outgoing_calls_chuvilev + 1;
                    $outgoing_call_time_chuvilev = $outgoing_call_time_chuvilev + $call['duration'];
                }   
            }
        //echo $call['user_account'];
        }
        unset($value);
    
    //Общее время звонков НН - $all_time_NN
        'Общее время звонков НН: ' . normal_time($all_time_NN) . '<br />';
    //Общее время входящих звонков НН
    $time_NN = $time_dubnov + $time_muraviev + $time_korolev + $time_zozulya + $time_burlaka + $time_kireev + $time_tarankov + $time_stats + $time_rumyancev;
        'Время нижегородских входящих звонков: ' . normal_time($time_NN) . '<br />';
    //Общее количество входящих звонков НН
    $call_NN = $call_dubnov + $call_muraviev + $call_korolev + $call_zozulya + $call_burlaka + $call_kireev + $call_tarankov + $call_stats + $call_rumyancev;
        'Количество нижегородских входящих звонков: ' . $call_NN . '<br />';
    //Общее количество звонков НН - $all_call_NN
        'Общее колличество звонков НН: ' . $all_call_NN . '<br />';
    
    //Общее время звонков Москва - $all_time_Msk
        'Общее время звонков Москва: ' . normal_time($all_time_Msk) . '<br />'; 
    //Общее время входящих звонков Москва
    $time_Msk = $time_mustyaca + $time_nosovskiy + $time_getigejev + $time_gorbas + $time_chuvilev;
        'Время московских входящих звонков: ' . normal_time($time_Msk) . '<br />';
    //Общее количество входящих звонков Москва 
    $call_Msk = $call_mustyaca + $call_nosovskiy + $call_getigejev + $call_gorbas + $call_chuvilev;
        'Количество московских входящих звонков: ' . $call_Msk . '<br />';
    //Общее количество звонков Москва - $all_call_Msk
        'Общее количество звонков Москва: ' . $all_call_Msk . '<br />';
    
        //Всего НН + Москва
        $all_call_NN_Msk = $all_call_NN_Msk + $json['results_count']; //общее количество звонков - получаю из $json
        'Всего звонков: ' . $all_call_NN_Msk . '<br />';
        'Всего входящих звонков: ' . $incoming_counter . '<br />'; //общее количество входящих звонков
        'Время звонков: ' . normal_time($all_call_duration) . '<br />'; //общее время звонков
        'Время входящих звонков: ' . normal_time($incoming_call_time_counter) . '<br />';  //общее время входящих звонков

        $today = date("Y-m-d");
        $all_call_duration_sql = normal_time($all_call_duration);
        $incoming_call_time_counter_sql = normal_time($incoming_call_time_counter);
        $all_time_NN_sql = normal_time($all_time_NN);
        $time_NN_sql = normal_time($time_NN);
        $all_time_Msk_sql = normal_time($all_time_Msk);
        $time_Msk_sql = normal_time($time_Msk);
        $time_burlaka_sql = normal_time($time_burlaka);//------1
        $time_getigejev_sql = normal_time($time_getigejev);//--2
        $time_gorbas_sql = normal_time($time_gorbas);//--------3
        $time_dubnov_sql = normal_time($time_dubnov);//--------4
        $time_zozulya_sql = normal_time($time_zozulya);//------5
        $time_kireev_sql = normal_time($time_kireev);//--------6
        $time_korolev_sql = normal_time($time_korolev);//------7
        $time_muraviev_sql = normal_time($time_muraviev);//----8
        $time_mustyaca_sql = normal_time($time_mustyaca);//----9
        $time_nosovskiy_sql = normal_time($time_nosovskiy);//-10
        $time_rumyancev_sql = normal_time($time_rumyancev);//-11
        $time_tarankov_sql = normal_time($time_tarankov);//---12
        $time_chuvilev_sql = normal_time($time_chuvilev);//---13
        $time_stats_sql = normal_time($time_stats);
        
        //Время исходящих звонков
        $outgoing_call_time_tarankov_sql = normal_time($outgoing_call_time_tarankov); //---1
        $outgoing_call_time_burlaka_sql = normal_time($outgoing_call_time_burlaka);//------2
        $outgoing_call_time_muraviev_sql = normal_time($outgoing_call_time_muraviev);//----3
        $outgoing_call_time_dubnov_sql = normal_time($outgoing_call_time_dubnov);//--------4
        $outgoing_call_time_mustyaca_sql = normal_time($outgoing_call_time_mustyaca);//----5
        $outgoing_call_time_korolev_sql = normal_time($outgoing_call_time_korolev);//------6
        $outgoing_call_time_gorbas_sql = normal_time($outgoing_call_time_gorbas);//--------7
        $outgoing_call_time_kireev_sql = normal_time($outgoing_call_time_kireev);//--------8
        $outgoing_call_time_chuvilev_sql = normal_time($outgoing_call_time_chuvilev);//----9
        $outgoing_call_time_rumyancev_sql = normal_time($outgoing_call_time_rumyancev);//-10
        $outgoing_call_time_nosovskiy_sql = normal_time($outgoing_call_time_nosovskiy);//-11
        $outgoing_call_time_getigejev_sql = normal_time($outgoing_call_time_getigejev);//-12
        $outgoing_call_time_zozulya_sql = normal_time($outgoing_call_time_zozulya);//-----13
        //Конец время исходящих звонков

    //цикл для заполнения таблицы
    //foreach($json['response'] as $date => $conversion){
        // Добавление данных в БД и обновление последней строки
        $sql = "SELECT * FROM `wp_api_my_calls` ORDER BY `id` DESC LIMIT 1 "; //выбираю последнюю строку в таблице
        $result = mysqli_query($conn, $sql); // проверка соединения
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); //преобразование result в массив
        $call_id = $rows[0]['id']; //получаю id последней строки
        echo 'Данные за ' . $rows[0]['date'] . '. ';
        if ($rows[0]['date'] == $today) {
            $sql = "UPDATE `wp_api_my_calls` SET `nn_m_all_count`=$all_call_NN_Msk,`nn_m_count_incoming`='$incoming_counter',`nn_m_all_time`='$all_call_duration_sql',`nn_m_time_incoming`='$incoming_call_time_counter_sql', 
            `nn_all_count`=$all_call_NN, `nn_count_incoming`=$call_NN, `nn_all_time`='$all_time_NN_sql', `nn_time_incoming`='$time_NN_sql', 
            `m_all_count`=$all_call_Msk, `m_count_incoming`=$call_Msk, `m_all_time`='$all_time_Msk_sql', `m_time_incoming`='$time_Msk_sql', 
            `burlaka_count`=$call_burlaka, `burlaka_time`='$time_burlaka_sql', `getigejev_count`=$call_getigejev, `getigejev_time`='$time_getigejev_sql', 
            `gorbas_count`=$call_gorbas, `gorbas_time`='$time_gorbas_sql', `dubnov_count`=$call_dubnov, `dubnov_time`='$time_dubnov_sql', 
            `zozulya_count`=$call_zozulya, `zozulya_time`='$time_zozulya_sql', `kireev_count`=$call_kireev, `kireev_time`='$time_kireev_sql', 
            `korolev_count`=$call_korolev, `korolev_time`='$time_korolev_sql', `muraviev_count`=$call_muraviev, `muraviev_time`='$time_muraviev_sql',
            `mustyaca_count`=$call_mustyaca, `mustyaca_time`='$time_mustyaca_sql', `nosovskiy_count`=$call_nosovskiy, `nosovskiy_time`='$time_nosovskiy_sql', 
            `rumyancev_count`=$call_rumyancev, `rumyancev_time`='$time_rumyancev_sql', `stats_count`=$call_stats, `stats_time`='$time_stats_sql', 
            `tarankov_count`=$call_tarankov, `tarankov_time`='$time_tarankov_sql', `chuvilev_count`=$call_chuvilev, `chuvilev_time`='$time_chuvilev_sql',
            `number_of_outgoing_calls_tarankov`=$number_of_outgoing_calls_tarankov, `outgoing_call_time_tarankov` = '$outgoing_call_time_tarankov_sql',
            `number_of_outgoing_calls_burlaka`=$number_of_outgoing_calls_burlaka, `outgoing_call_time_burlaka`='$outgoing_call_time_burlaka_sql',
            `number_of_outgoing_calls_muraviev`=$number_of_outgoing_calls_muraviev, `outgoing_call_time_muraviev`='$outgoing_call_time_muraviev_sql',
            `number_of_outgoing_calls_dubnov`=$number_of_outgoing_calls_dubnov, `outgoing_call_time_dubnov`='$outgoing_call_time_dubnov_sql',
            `number_of_outgoing_calls_mustyaca`=$number_of_outgoing_calls_mustyaca, `outgoing_call_time_mustyaca`='$outgoing_call_time_mustyaca_sql',
            `number_of_outgoing_calls_korolev`='$number_of_outgoing_calls_korolev', `outgoing_call_time_korolev`='$outgoing_call_time_korolev_sql',
            `number_of_outgoing_calls_gorbas`='$number_of_outgoing_calls_gorbas', `outgoing_call_time_gorbas`='$outgoing_call_time_gorbas_sql',
            `number_of_outgoing_calls_kireev`='$number_of_outgoing_calls_kireev', `outgoing_call_time_kireev`='$outgoing_call_time_kireev_sql',
            `number_of_outgoing_calls_chuvilev`='$number_of_outgoing_calls_chuvilev', `outgoing_call_time_chuvilev`='$outgoing_call_time_chuvilev_sql',
            `number_of_outgoing_calls_rumyancev`='$number_of_outgoing_calls_rumyancev', `outgoing_call_time_rumyancev`='$outgoing_call_time_rumyancev_sql',
            `number_of_outgoing_calls_nosovskiy`='$number_of_outgoing_calls_nosovskiy', `outgoing_call_time_nosovskiy`='$outgoing_call_time_nosovskiy_sql',
            `number_of_outgoing_calls_getigejev`='$number_of_outgoing_calls_getigejev', `outgoing_call_time_getigejev`='$outgoing_call_time_getigejev_sql',
            `number_of_outgoing_calls_zozulya`='$number_of_outgoing_calls_zozulya', `outgoing_call_time_zozulya`='$outgoing_call_time_zozulya_sql',
            `all_time_burlaka`='$all_time_burlaka', `all_time_getigejev`='$all_time_getigejev', `all_time_gorbas`='$all_time_gorbas', `all_time_dubnov`='$all_time_dubnov',
            `all_time_zozulya`='$all_time_zozulya', `all_time_kireev`='$all_time_kireev', `all_time_korolev`='$all_time_korolev', `all_time_muraviev`='$all_time_muraviev',
            `all_time_mustyaca`='$all_time_mustyaca', `all_time_nosovskiy`='$all_time_nosovskiy', `all_time_rumyancev`='$all_time_rumyancev', `all_time_tarankov`='$all_time_tarankov',
            `all_time_chuvilev`='$all_time_chuvilev'
            WHERE `id`=$call_id";
            if ($conn->query($sql) === TRUE) {
                echo "Запись обновлена 500+."."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error."<br>";
            }
        } else {
            $sql = "INSERT INTO wp_api_my_calls (`date`, `nn_m_all_count`, `nn_m_count_incoming`, `nn_m_all_time`, `nn_m_time_incoming`, 
            `nn_all_count`, `nn_count_incoming`, `nn_all_time`, `nn_time_incoming`, 
            `m_all_count`, `m_count_incoming`, `m_all_time`, `m_time_incoming`, 
            `burlaka_count`, `burlaka_time`, `getigejev_count`, `getigejev_time`, `gorbas_count`, `gorbas_time`, `dubnov_count`, `dubnov_time`, 
            `zozulya_count`, `zozulya_time`, `kireev_count`, `kireev_time`, `korolev_count`, `korolev_time`, `muraviev_count`, `muraviev_time`, 
            `mustyaca_count`, `mustyaca_time`, `nosovskiy_count`, `nosovskiy_time`, `rumyancev_count`, `rumyancev_time`, `stats_count`, `stats_time`, 
            `tarankov_count`, `tarankov_time`, `chuvilev_count`, `chuvilev_time`, `number_of_outgoing_calls_tarankov`,`outgoing_call_time_tarankov`,
            `number_of_outgoing_calls_burlaka`,`outgoing_call_time_burlaka`,`number_of_outgoing_calls_muraviev`,`outgoing_call_time_muraviev`,
            `number_of_outgoing_calls_dubnov`, `outgoing_call_time_dubnov`,`number_of_outgoing_calls_mustyaca`, `outgoing_call_time_mustyaca`,
            `number_of_outgoing_calls_korolev`,`outgoing_call_time_korolev`, `number_of_outgoing_calls_gorbas`, `outgoing_call_time_gorbas`,
            `number_of_outgoing_calls_kireev`, `outgoing_call_time_kireev`, `number_of_outgoing_calls_chuvilev`, `outgoing_call_time_chuvilev`,
            `number_of_outgoing_calls_rumyancev`, `outgoing_call_time_rumyancev`, `number_of_outgoing_calls_nosovskiy`, `outgoing_call_time_nosovskiy`,
            `number_of_outgoing_calls_getigejev`, `outgoing_call_time_getigejev`, `number_of_outgoing_calls_zozulya`, `outgoing_call_time_zozulya`
            `all_time_burlaka`, `all_time_getigejev`, `all_time_gorbas`, `all_time_dubnov`, `all_time_zozulya`, `all_time_kireev`, `all_time_korolev`,
            `all_time_muraviev`, `all_time_mustyaca`, `all_time_nosovskiy`, `all_time_rumyancev`, `all_time_tarankov`, `all_time_chuvilev`) VALUES 
                ('$today', 
                $all_call_NN_Msk, $incoming_counter, '$all_call_duration_sql', '$incoming_call_time_counter_sql', 
                $all_call_NN, $call_NN, '$all_time_NN_sql', '$time_NN_sql', 
                $all_call_Msk, $call_Msk, '$all_time_Msk_sql', '$time_Msk_sql',
                $call_burlaka, '$time_burlaka_sql',$call_getigejev, '$time_getigejev_sql', $call_gorbas, '$time_gorbas_sql', $call_dubnov, '$time_dubnov_sql', 
                $call_zozulya, '$time_zozulya_sql', $call_kireev, '$time_kireev_sql', $call_korolev, '$time_korolev_sql', $call_muraviev, '$time_muraviev_sql',
                $call_mustyaca, '$time_mustyaca_sql', $call_nosovskiy, '$time_nosovskiy_sql', $call_rumyancev, '$time_rumyancev_sql', $call_stats, '$time_stats_sql', 
                $call_tarankov, '$time_tarankov_sql', $call_chuvilev, '$time_chuvilev_sql', $number_of_outgoing_calls_tarankov,'$outgoing_call_time_tarankov_sql',
                $number_of_outgoing_calls_burlaka, '$outgoing_call_time_burlaka_sql',$number_of_outgoing_calls_muraviev,'$outgoing_call_time_muraviev_sql',
                $number_of_outgoing_calls_dubnov, '$outgoing_call_time_dubnov_sql',$number_of_outgoing_calls_mustyaca,'$outgoing_call_time_mustyaca_sql',
                $number_of_outgoing_calls_korolev, '$outgoing_call_time_korolev_sql', $number_of_outgoing_calls_gorbas, '$outgoing_call_time_gorbas_sql',
                $number_of_outgoing_calls_kireev, '$outgoing_call_time_kireev_sql', $number_of_outgoing_calls_chuvilev, '$outgoing_call_time_chuvilev_sql',
                $number_of_outgoing_calls_rumyancev, '$outgoing_call_time_rumyancev_sql', $number_of_outgoing_calls_nosovskiy, '$outgoing_call_time_nosovskiy_sql',
                $number_of_outgoing_calls_getigejev, '$outgoing_call_time_getigejev_sql', $number_of_outgoing_calls_zozulya, '$outgoing_call_time_zozulya_sql',
                '$all_time_burlaka', '$all_time_getigejev', '$all_time_gorbas', '$all_time_dubnov', '$all_time_zozulya', '$all_time_kireev', '$all_time_korolev',
                '$all_time_muraviev', '$all_time_mustyaca', '$all_time_nosovskiy', '$all_time_rumyancev', '$all_time_tarankov', '$all_time_chuvilev')";
                
            if ($conn->query($sql) === TRUE) {
                echo "Создана новая запись."."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error."<br>";
            }
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    $yesterday_record_number_of_calls = $rows2[1]['record_number_of_calls'];                    // рекорд кол звонков из вчера
    $yesterday_record_number_of_incoming_calls = $rows2[1]['record_number_of_incoming_calls'];  // рекорд входящих звонков из вчера
    $yesterday_record_incoming_call_time = $rows2[1]['record_incoming_call_time'];              // рекорд входящего времени из вчера
    
    $incoming_counter; //количество входящих звонков
    $all_call_NN_Msk;  //количество звонков
    normal_time($incoming_call_time_counter); //время входящих звонков (в секундах)
    ///////////////////////////////////////////////////////////////////////////////////////////////

    if ($incoming_counter > $yesterday_record_number_of_incoming_calls) {
        $message_incoming_counter = 'Новый рекорд' . $rows[0]['record_number_of_incoming_calls'];
    } else {
        $message_incoming_counter = 'Рекорд ' . $rows[0]['record_number_of_incoming_calls'];
    }

    if ($all_call_NN_Msk > $yesterday_record_number_of_calls) {
        $message_all_call_NN_Msk = 'Новый рекорд' . $rows[0]['record_number_of_calls'];
    } else {
        $message_all_call_NN_Msk = 'Рекорд ' . $rows[0]['record_number_of_calls'];
    }
    if ($incoming_call_time_counter > $record_in_second) {
        $record1 = normal_time($incoming_call_time_counter);
        $message_incoming_call_time = 'Новый рекорд ' . $rows[0]['record_incoming_call_time'];
    } else {
        $message_incoming_call_time = 'Рекорд ' . $rows[0]['record_incoming_call_time'];
    }
    
//==================================================================================================================== SQL
    // $sql = "SELECT * FROM `wp_api_my_calls` ORDER BY `id` DESC LIMIT 1 "; //выбираю последний элемент в таблице
    // $result = mysqli_query($conn, $sql); // проверка соединения
    // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); //преобразование result в массив
    // // var_dump($rows);
    // $call_id = $rows[0]['id'];
    // if ($rows[0]['date'] == $today) {
    //     $sql = "UPDATE wp_api_my_calls (`date`, `nn_m_all_count`, `nn_m_count_incoming`, `nn_m_all_time`, `nn_m_time_incoming`, `nn_all_count`, `nn_count_incoming`, `nn_all_time`, `nn_time_incoming`, `m_all_count`, `m_count_incoming`, `m_all_time`, `m_time_incoming`, `burlaka_count`, `burlaka_time`, `getigejev_count`, `getigejev_time`, `gorbas_count`, `gorbas_time`, `dubnov_count`, `dubnov_time`, `zozulya_count`, `zozulya_time`, `kireev_count`, `kireev_time`, `korolev_count`, `korolev_time`, `muraviev_count`, `muraviev_time`, `mustyaca_count`, `mustyaca_time`, `nosovskiy_count`, `nosovskiy_time`, `rumyancev_count`, `rumyancev_time`, `stats_count`, `stats_time`, `tarankov_count`, `tarankov_time`, `chuvilev_count`, `chuvilev_time`)         VALUES ('$today', $all_call_NN_Msk, $incoming_counter, '$all_call_duration_sql', '$incoming_call_time_counter_sql', $all_call_NN, $call_NN, '$all_time_NN_sql', '$time_NN_sql', $all_call_Msk, $call_Msk, '$all_time_Msk_sql', '$time_Msk_sql',$call_burlaka, '$time_burlaka_sql',$call_getigejev, '$time_getigejev_sql', $call_gorbas, '$time_gorbas_sql', $call_dubnov, '$time_dubnov_sql', $call_zozulya, '$time_zozulya_sql', $call_kireev, '$time_kireev_sql', $call_korolev, '$time_korolev_sql', $call_muraviev, '$time_muraviev_sql', $call_mustyaca, '$time_mustyaca_sql', $call_nosovskiy, '$time_nosovskiy_sql', $call_rumyancev, '$time_rumyancev_sql', $call_stats, '$time_stats_sql', $call_tarankov, '$time_tarankov_sql', $call_chuvilev, '$time_chuvilev_sql') WHERE id = '$call_id'";
    // }
    // // $timestamp = strtotime($date);
    // // $sql = "INSERT INTO wp_api_my_calls (`date`, `nn_m_all_count`, `nn_m_count_incoming`, `nn_m_all_time`, `nn_m_time_incoming`, `nn_all_count`, `nn_count_incoming`, `nn_all_time`, `nn_time_incoming`, `m_all_count`, `m_count_incoming`, `m_all_time`, `m_time_incoming`, `burlaka_count`, `burlaka_time`, `getigejev_count`, `getigejev_time`, `gorbas_count`, `gorbas_time`, `dubnov_count`, `dubnov_time`, `zozulya_count`, `zozulya_time`, `kireev_count`, `kireev_time`, `korolev_count`, `korolev_time`, `muraviev_count`, `muraviev_time`, `mustyaca_count`, `mustyaca_time`, `nosovskiy_count`, `nosovskiy_time`, `rumyancev_count`, `rumyancev_time`, `stats_count`, `stats_time`, `tarankov_count`, `tarankov_time`, `chuvilev_count`, `chuvilev_time`) VALUES 
    // // ('$today', 
    // // $all_call_NN_Msk, $incoming_counter, '$all_call_duration_sql', '$incoming_call_time_counter_sql', 
    // // $all_call_NN, $call_NN, '$all_time_NN_sql', '$time_NN_sql', 
    // // $all_call_Msk, $call_Msk, '$all_time_Msk_sql', '$time_Msk_sql'
    // // ,$call_burlaka, '$time_burlaka_sql',$call_getigejev, '$time_getigejev_sql', $call_gorbas, '$time_gorbas_sql', $call_dubnov, '$time_dubnov_sql', $call_zozulya, '$time_zozulya_sql', $call_kireev, '$time_kireev_sql', $call_korolev, '$time_korolev_sql', $call_muraviev, '$time_muraviev_sql', $call_mustyaca, '$time_mustyaca_sql', $call_nosovskiy, '$time_nosovskiy_sql', $call_rumyancev, '$time_rumyancev_sql', $call_stats, '$time_stats_sql', $call_tarankov, '$time_tarankov_sql', $call_chuvilev, '$time_chuvilev_sql')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully"."<br>";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error."<br>";
    // }
    // }
//====================================================================================================================sql
    $conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные с "Мои звонки"</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            font-size: 40px;
        }
        .image-center{
           position: absolute; 
           left: calc(50% - 100px);
           top: calc(50vh - 100px);
        }
        img {
            background-size: cover;
            width: 200px;
            height: 200px;
        }
        .rotate {
            writing-mode: tb-rl;
            transform:rotate(180deg);
            font-size:20px;
            width: 6%;
            line-height: 60px;
            border-left: 2px solid black;
        }
        .rotate1 {
            font-size:20px;
            width: 6%;  
            text-align: center;
            padding-left: auto;
            padding-right: auto;
            line-height: 80px;
            font-size:45px;
            border-right: 2px solid black;
        }
        .name {
            background: pink;
        }
        .all_call{
            background: #ff36df;
        }
        .call {
            background: yellowgreen; 
        }
        .count {
            background: orange; 
        }
        .record {
            font-size: 25px;
        }
    </style>
</head>
<body>
    <div class='image-center'>
        <img src="./img/mycall.png" alt="my calls">
    </div>
    <div class="row h-50">
        <div class="col-12 text-center pt-4">
            <p class="big_text"><?php echo normal_time($incoming_call_time_counter); ?></p>
            <p class="small_text">Время входящих звонков</p>
            <p class="record"><?php echo $message_incoming_call_time; ?></p>
        </div>
    </div>
    <div class="row h-50">
        <div class="col-6 text-center ">
            <p class="big_text"><?php echo $incoming_counter; ?></p>
            <p class="small_text">Количество входящих звонков</p>
            <p class="record"><?php echo $message_incoming_counter; ?></p>
        </div>
        <div class="col-6 text-center">
            <p class="big_text"><?php echo $all_call_NN_Msk; ?></p>
            <p class="small_text">Общее количество звонков</p>
            <p class="record"><?php echo $message_all_call_NN_Msk; ?></p>
        </div>
    </div>
    
    <div class="d-flex flex-row" style="height: 150px;">
        <div class="px-2 text-center my-auto" style="width: 12%; font-size:20px;"><b></b></div>
        <div class="p-2 rotate name">Бурлака</div>
        <div class="p-2 rotate name">Дубнов</div>
        <div class="p-2 rotate name">Зозуля</div>
        <div class="p-2 rotate name">Киреев</div>
        <div class="p-2 rotate name">Королёв</div>
        <div class="p-2 rotate name">Муравьев</div>
        <div class="p-2 rotate name">Румянцев</div>
        <div class="p-2 rotate name">Статистика</div>
        <div class="p-2 rotate name">Таранков</div>
        
        <div class="p-2 rotate name ms-4">Гетигежев</div>
        <div class="p-2 rotate name">Горбатовский</div>
        <div class="p-2 rotate name">Мустяца</div>
        <div class="p-2 rotate name">Носовский</div>
        <div class="p-2 rotate name">Чувилёв</div>
    </div>
    <div class="d-flex flex-row" style="height: 100px;">
        <div class="p-2 text-center my-auto" style="width: 12%; font-size:20px;"><b>Общее время звонков</b></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_burlaka ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_dubnov ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_zozulya ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_kireev ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_korolev ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_muraviev ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_rumyancev ?></div>
        <div class="p-2 rotate all_call"><?php echo normal_time($time_stats) ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_tarankov ?></div>
        
        <div class="p-2 rotate all_call ms-4"><?php echo $all_time_getigejev ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_gorbas ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_mustyaca ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_nosovskiy ?></div>
        <div class="p-2 rotate all_call"><?php echo $all_time_chuvilev ?></div>
    </div>
    <div class="d-flex flex-row" style="height: 100px;">
        <div class="p-2 text-center my-auto" style="width: 12%; font-size:20px;"><b>Время входящих звонков</b></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_burlaka) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_dubnov) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_zozulya) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_kireev) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_korolev) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_muraviev) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_rumyancev) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_stats) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_tarankov) ?></div>
        
        <div class="p-2 rotate call ms-4"><?php echo normal_time($time_getigejev) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_gorbas) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_mustyaca) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_nosovskiy) ?></div>
        <div class="p-2 rotate call"><?php echo normal_time($time_chuvilev) ?></div>
    </div>
    <div class="d-flex flex-row" style="height: 100px;">
        <div class="px-2 text-center my-auto" style="width: 12%; font-size:20px;"><b>Количество звонков</b></div>
        <div class="p-2 rotate1 count"><?php echo $call_burlaka ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_dubnov ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_zozulya ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_kireev ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_korolev ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_muraviev ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_rumyancev ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_stats ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_tarankov ?></div>
        
        <div class="p-2 rotate1 count ms-4"><?php echo $call_getigejev ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_gorbas ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_mustyaca ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_nosovskiy ?></div>
        <div class="p-2 rotate1 count"><?php echo $call_chuvilev ?></div>
    </div>
    <section>
        <div class="row mt-4 justify-content-center bg-info">
            <div class="col-lg-2"></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary">Нижний Новгород</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary">Москва</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary">Нижний Новгород + Мосвка</div>
        </div>
        <div class="row justify-content-center bg-dark text-white">
            <div class="col-lg-2 fs-4 fw-bolder text-center">Всего звонков</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $all_call_NN ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $all_call_Msk ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $all_call_NN_Msk ?></div>
        </div>
        <div class="row justify-content-center bg-info">
            <div class="col-lg-2 fs-4 fw-bolder text-center">Всего входящих звонков</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $call_NN ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $call_Msk ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo $incoming_counter ?></div>
        </div>
        <div class="row justify-content-center bg-warning">
            <div class="col-lg-2 fs-4 fw-bolder text-center">Время звонков</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($all_time_NN) ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($all_time_Msk) ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($all_call_duration) ?></div>
        </div>
        <div class="row justify-content-center bg-info">
            <div class="col-lg-2 fs-4 fw-bolder text-center">Время входящих звонков</div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($time_NN) ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($time_Msk) ?></div>
            <div class="col-lg-2 fs-4 fw-bolder text-center border-start border-secondary"><?php echo normal_time($incoming_call_time_counter) ?></div>
        </div>
    </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        setTimeout(() => window.location.reload(), 60000);
    </script>
</body>
</html>



