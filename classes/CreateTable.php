<?php

class CreateTable
{
    public static function calls(){
        global $pdo;
        $sql = "CREATE TABLE IF NOT EXISTS " . CALLS . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            date DATE NOT NULL,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            count_in INT(11) NOT NULL,
            time_in TIME NOT NULL,
            count_out INT(11) NOT NULL,
            time_out TIME NOT NULL,
            PRIMARY KEY (id)
        )";
        $pdo->exec($sql);
    }
    public static function base(){
        global $pdo;
        $sql = "CREATE TABLE IF NOT EXISTS " . BASE . " (
            id INT(11) NOT NULL AUTO_INCREMENT,
            name VARCHAR(100) NOT NULL,
            value VARCHAR(300) NOT NULL,
            date DATETIME,
            PRIMARY KEY (id)        
        )";
        $pdo->exec($sql);
    }
}