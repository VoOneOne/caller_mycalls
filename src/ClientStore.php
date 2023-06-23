<?php

namespace MyCalls;

class ClientStore
{
    private static array $clients = [];
    static function getClient($phone){
        if(isset(self::$clients[$phone])) return self::$clients[$phone];
        else
        {
            $client = new Client($phone);
            self::$clients[$phone] = $client;
            return $client;
        }
    }
    public static function getClients():array
    {
        return self::$clients;
    }
}