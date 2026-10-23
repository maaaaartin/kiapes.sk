<?php
declare(strict_types=1);
namespace Kiapes;
use PDO;
final class Db{private static ?PDO $pdo=null;
public static function connection():PDO{if(self::$pdo instanceof PDO)return self::$pdo;$c=require dirname(__DIR__).'/config/config.php';$d=$c['database'];self::$pdo=new PDO(sprintf('mysql:host=%s;port=%d;dbname=%s;charset=%s',$d['host'],$d['port'],$d['database'],$d['charset']),$d['username'],$d['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);return self::$pdo;}}
