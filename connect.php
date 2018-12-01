<?php

DEFINE (USER, 'root');
DEFINE (PASS, 'root');
DEFINE (HOST, 'localhost');
DEFINE (NAME, 'prison');

$dbc = @mysqli_connect(HOST, USER, PASS, NAME, '3306');
?>