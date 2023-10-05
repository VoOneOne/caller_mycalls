<?php

class Managers
{
    private array $managers;

    public function __construct($managersData)
    {
        foreach ($managersData as $key => $managerData) {
            $this->managers[$key] = [INCOMING => ['count' => 0, 'time' => 0], OUTGOING => ['count' => 0, 'time' => 0]] + $managerData;

        }
    }

    public function setApiData($calls)
    {
        foreach ($calls as $call) {
            $email = $call['user_account'];
            $direction = $call['direction'];
            if (!array_key_exists($email, $this->managers)) {
                $firstPathMail = $this->firstPathEmail($email);
                $this->managers[$email] = [INCOMING => ['count' => 0, 'time' => 0], OUTGOING => ['count' => 0, 'time' => 0]] + ['reg' => 'un', 'FIO' => $firstPathMail];
            }
            $this->managers[$email][$direction]['count']++;
            $this->managers[$email][$direction]['time'] += $call['duration'];
        }
    }



    private function firstPathEmail($email)
    {
        return substr($email, 0, strpos($email, '@'));
    }

    private function formatTime()
    {
        foreach ($this->managers as &$manager) {
            $manager[INCOMING]['time'] = $this->normal_time($manager[INCOMING]['time']);
            $manager[OUTGOING]['time'] = $this->normal_time($manager[OUTGOING]['time']);
        }
    }

    private function normal_time($time)
    {
        $hours = floor(intval($time) / 60 / 60); //часы
        $minutes = floor((intval($time) / 60)) % 60; //минуты
        $seconds = floor(intval($time) % 60); //секунды
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

    public function return()
    {
        $this->formatTime();
        return $this->managers;
    }
}