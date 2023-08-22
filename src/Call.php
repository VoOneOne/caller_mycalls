<?php

namespace MyCalls;

class Call
{
    private int $direction;
    private string $client_number;
    private int $start_time;
    private int $end_time;
    private int $answered;
//    private int $src_slot;
//    private string $client_name;
//    private int $src_id;
//    private int $upload_time;
    private int $answer_time;
//    private int $user_id;
//    private int $duration;
//    private string $src_number;

    private string $user_account;

    private function __construct($data)
    {

        $this->direction = $data['direction'];
        $this->client_number = $data['client_number'];
        $this->start_time = $data['start_time'];
        $this->end_time = $data['end_time'];
        $this->answered = $data['answered'];
        $this->user_account = $data['user_account'];
//        $this->src_slot = $data['start_time'];
//        $this->client_name = $data['start_time'];
//        $this->src_id = $data['start_time'];
//        $this->upload_time = $data['start_time'];
        $this->answer_time = $data['answer_time'];
//        $this->user_id = $data['start_time'];
//        $this->duration = $data['start_time'];
//        $this->src_number = $data['start_time'];
    }

    public static function getCall($data)
    {
        if ($phone = self::clearPhoneNumber($data['client_number'])){
            $data['client_number'] = $phone;
            return new Call($data);
        }
        return false;
    }

    public static function clearPhoneNumber($phone)
    {
        $client_number = preg_replace('/[^0-9+]/', '', strval($phone));
        if ((strlen($client_number) === 11) and substr($client_number, 0, 1) === '7') {
            $client_number = '+7' . substr($client_number, -10);
        } elseif ((strlen($client_number) === 11) and substr($client_number, 0, 1) === '8') {
            $client_number = '+7' . substr($client_number, -10);
        }
        if ((strlen($client_number) === 12 and substr($client_number, 0, 2) === '+7') or (strlen($client_number) === 7))
            return $client_number;
        else
            return false;
    }

    public function __get($name)
    {
        switch ($name) {
            case ('direction'):
                return $this->direction;
            case ('client_number'):
                return $this->client_number;
            case ('start_time'):
                return $this->start_time;
            case ('end_time'):
                return $this->end_time;
            case ('answered'):
                return $this->answered;
            case ('answer_time'):
                return $this->answer_time;
            case ('user_account'):
                return $this->user_account;
            default:
                new \Exception('Обращение к несуществующему свойству класса' . self::class);
        }
    }
}