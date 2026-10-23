<?php
declare(strict_types=1);
namespace Kiapes;
final class Auth {
 public static function start():void{if(session_status()===PHP_SESSION_ACTIVE)return;session_name('kiapes_session');session_set_cookie_params(['lifetime'=>7200,'path'=>'/','secure'=>true,'httponly'=>true,'samesite'=>'Lax']);session_start();}
 public static function user():?array{return $_SESSION['user']??null;}
 public static function isAdmin():bool{return ($_SESSION['user']['role']??'')==='superadmin';}
 public static function login(string $email,string $password,string $totp=''):bool{
  $pdo=Db::connection();$s=$pdo->prepare('SELECT * FROM users WHERE email=? LIMIT 1');$s->execute([$email]);$u=$s->fetch();
  if(!$u||!password_verify($password,$u['password_hash']))return false;
  if(!empty($u['totp_secret'])&&!Totp::verify($u['totp_secret'],$totp))return false;
  session_regenerate_id(true);$_SESSION['user']=['id'=>(int)$u['id'],'email'=>$u['email'],'role'=>$u['role']];return true;}
 public static function logout():void{$_SESSION=[];session_destroy();}}
