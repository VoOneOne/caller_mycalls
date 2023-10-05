<?php

namespace MyCalls;

class ManagersStore
{
    private static array $managers;
    static function getManager($email){
        if(isset($managers[$email])) return $managers[$email];
        else
        {
            $manager = new Manager($email);
            self::$managers[$email] = $manager;
            return $manager;
        }
    }
}