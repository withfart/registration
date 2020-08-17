<?php

$user = 'root';
$password = 'root';
$db = 'users';
$host = 'localhost';

$dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);

