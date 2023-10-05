<?php

namespace MyCalls;

class Manager
{
    private string $email;
    private string $firstEmailPath;
    private string $region;
    private string $FIO;
    private array $calls;
    public function __construct($email)
    {
        if(isset(MANAGERS[$email])){
            $this->email = $email;
            $this->firstEmailPath = substr($email, 0, strpos($email, '@'));
            $this->region = MANAGER[$email]['reg'];
            $this->FIO = MANAGER[$email]['FIO'];
        }
    }
    public function addCall(Call $Call){
            $this->calls[] = $Call;
    }
}