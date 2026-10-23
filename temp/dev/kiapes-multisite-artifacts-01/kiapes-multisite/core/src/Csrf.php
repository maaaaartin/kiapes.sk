<?php
declare(strict_types=1);
namespace Kiapes;
final class Csrf{public static function token():string{if(empty($_SESSION['csrf']))$_SESSION['csrf']=bin2hex(random_bytes(32));return $_SESSION['csrf'];}
public static function validate():void{$s=$_POST['_csrf']??'';if(!is_string($s)||!hash_equals($_SESSION['csrf']??'',$s)){http_response_code(419);exit('Neplatný bezpečnostný token.');}}}
