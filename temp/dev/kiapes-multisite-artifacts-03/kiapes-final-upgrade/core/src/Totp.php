<?php
declare(strict_types=1);
namespace Kiapes;
final class Totp {
 public static function generateSecret():string{return rtrim(strtr(base64_encode(random_bytes(20)),'+/','-_'),'=');}
 public static function verify(string $secret,string $code):bool{
  if(!preg_match('/^\d{6}$/',$code))return false;
  foreach([0,-30,30] as $o){if(hash_equals(self::code($secret,$o),$code))return true;}
  return false;}
 private static function code(string $secret,int $offset):string{
  $key=base64_decode(strtr($secret,'-_','+/'));
  $time=pack('N',0).pack('N',intdiv(time()+$offset,30));
  $hash=hash_hmac('sha1',$time,$key,true);
  $o=ord(substr($hash,-1))&0x0F;
  $v=unpack('N',substr($hash,$o,4))[1]&0x7FFFFFFF;
  return str_pad((string)($v%1000000),6,'0',STR_PAD_LEFT);}}
