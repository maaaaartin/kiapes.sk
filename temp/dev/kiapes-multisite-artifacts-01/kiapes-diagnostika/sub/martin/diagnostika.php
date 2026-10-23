<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
echo 'PHP: ' . PHP_VERSION . '<br>';
echo 'Tento subdoménový webroot je: ' . __DIR__ . '<br>';
echo 'Očakávané jadro: ' . dirname(__DIR__, 2) . '/core/src/bootstrap.php<br>';
echo 'Jadro existuje: ' . (is_file(dirname(__DIR__, 2) . '/core/src/bootstrap.php') ? 'ÁNO' : 'NIE');
