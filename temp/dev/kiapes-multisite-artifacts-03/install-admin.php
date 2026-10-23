<?php
declare(strict_types=1);
require __DIR__.'/src/bootstrap.php';
$config=require __DIR__.'/config/config.php';$pdo=Kiapes\Db::connection();
$stmt=$pdo->prepare('INSERT INTO users (email,password_hash,role) VALUES (?,?,"superadmin") ON DUPLICATE KEY UPDATE password_hash=VALUES(password_hash), role="superadmin"');
$stmt->execute([$config['admin']['email'],password_hash($config['admin']['password'],PASSWORD_DEFAULT)]);
echo 'Administrátor bol vytvorený. Okamžite odstráň tento súbor.';
