<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
date_default_timezone_set('Europe/Bratislava');
spl_autoload_register(function(string $c){$p='Kiapes\\';if(!str_starts_with($c,$p))return;$f=__DIR__.'/'.str_replace('\\','/',substr($c,strlen($p))).'.php';if(is_file($f))require $f;});
$config=require dirname(__DIR__).'/config/config.php';
Kiapes\Application::boot($config)->run();
