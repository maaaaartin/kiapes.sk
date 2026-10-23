<?php
declare(strict_types=1);
namespace Kiapes;
final class Audit {
 public static function log(string $action,string $entity,?int $id=null):void{
  try{$pdo=Db::connection();$uid=Auth::user()['id']??null;
  $pdo->prepare('INSERT INTO audit_log (user_id,action,entity,entity_id,ip_address,user_agent) VALUES (?,?,?,?,?,?)')
   ->execute([$uid,$action,$entity,$id,$_SERVER['REMOTE_ADDR']??null,substr((string)($_SERVER['HTTP_USER_AGENT']??''),0,255)]);}catch(\Throwable){}}}
