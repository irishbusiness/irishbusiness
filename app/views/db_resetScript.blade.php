<?php
$mysqli = new mysqli("localhost", "root", "");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->query('drop database irishbusiness');
$mysqli->query('create database irishbusiness');

system('php artisan migrate');
system('php artisan db:seed');

?>