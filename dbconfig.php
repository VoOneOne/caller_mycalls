<?php

define( 'DB_NAME', 'sops_test' );

define( 'DB_USER', 'root' );

define( 'DB_PASSWORD', '' );

define( 'DB_HOST', 'localhost' );

$pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASSWORD
);