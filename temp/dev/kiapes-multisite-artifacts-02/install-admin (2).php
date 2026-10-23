<?php

declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';

$config = require __DIR__ . '/config/config.php';
$pdo = Kiapes\Db::connection();
$email = $config['admin']['email'];
$hash = password_hash($config['admin']['password'], PASSWORD_ARGON2ID);

$stmt = $pdo->prepare('INSERT INTO users (email,password_hash,role) VALUES (?,?,"superadmin") ON DUPLICATE KEY UPDATE password_hash=VALUES(password_hash), role="superadmin"');
$stmt->execute([$email,$hash]);

echo 'Administrátor bol vytvorený. Odstráň tento súbor.';
