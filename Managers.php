<?php

class Managers
{
    private array $managers;
    public function __construct($managersData)
    {
        foreach($managersData as $key => $managerData)
        {
            $this->managers[$key] = [INCOMING => ['count' => 0 , 'time' => 0], OUTGOING => ['count' => 0 , 'time' => 0]] + $managerData;
        }
    }
    public function setApiData($calls)
    {
        foreach ($calls as $call)
        {
            $email = $call['user_account'];
            $direction = $call['direction'];
            if(!array_key_exists($email, $this->managers))
            {
                $firstPathMail = $this->firstPathEmail($email);
                $this->managers[$email] =  [INCOMING => ['count' => 0 , 'time' => 0], OUTGOING => ['count' => 0 , 'time' => 0]] + ['reg' => 'un', 'FIO' => $firstPathMail];
            }
            $this->managers[$email][$direction]['count']++;
            $this->managers[$email][$direction]['time'] += $call['duration'];
        }
    }
    private function firstPathEmail($email)
    {
        return substr($email,0, strpos($email, '@'));
    }
    public function format()
    {
        foreach ($this->managers as &$manager)
        {
            $manager[INCOMING]['time'] = date('Y-m-d', $manager[INCOMING]['time']);
            $manager[OUTGOING]['time'] = date('Y-m-d', $manager[INCOMING]['time']);
        }
    }
    public function return()
    {
        return $this->managers;
    }
}