<?php
require 'environment.php';

global $config;
$config = [];

if (ENVIRONMENT == 'development') {
    $config['dbname'] = 'gerenciamento_academico_db';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    $config['dbname'] = '';
    $config['host'] = '';
    $config['dbuser'] = '';
    $config['dbpass'] = '';
}
?>