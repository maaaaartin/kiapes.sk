<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
ini_set('display_startup_errors','1');
?>
<!doctype html>
<html lang="sk">
<meta charset="utf-8">
<title>Diagnostika kiapes.sk</title>
<style>body{font-family:system-ui,sans-serif;max-width:900px;margin:2rem auto;line-height:1.5}pre{background:#f4f4f4;padding:1rem;overflow:auto}</style>
<h1>Diagnostika prostredia</h1>
<pre>
PHP verzia: <?php echo PHP_VERSION; ?>

Požadovaná minimálna verzia pre aplikáciu: 8.0
<?php if (version_compare(PHP_VERSION, '8.0.0', '<')): ?>
⚠️ TOTO JE PRÍČINA: PHP je staršie ako 8.0. V hostcreators prepnite PHP na 8.1, 8.2 alebo 8.3.
<?php else: ?>
✅ PHP verzia je vhodná.
<?php endif; ?>

Rozšírenia:
- pdo_mysql: <?php echo extension_loaded('pdo_mysql') ? 'OK' : 'CHÝBA'; ?>
- mbstring: <?php echo extension_loaded('mbstring') ? 'OK' : 'CHÝBA'; ?>
- sodium: <?php echo extension_loaded('sodium') ? 'OK' : 'CHÝBA'; ?>
- Argon2id: <?php echo defined('PASSWORD_ARGON2ID') ? 'OK' : 'nie je dostupné'; ?>

Cesta k tomuto súboru:
<?php echo __DIR__; ?>

Test jednoduchého PHP výstupu: OK
</pre>

<h2>Test pripojenia k databáze</h2>
<pre>
<?php
try {
    $pdo = new PDO(
        'mysql:host=sql21.hostcreators.sk;port=3326;dbname=d78035_kiapes;charset=utf8mb4',
        'u78035_admin',
        'mAAA0880&00&1505',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo "Databáza: OK\n";
    echo "MySQL server: " . $pdo->query('SELECT VERSION()')->fetchColumn() . "\n";
} catch (Throwable $e) {
    echo "Databáza: CHYBA\n";
    echo $e->getMessage() . "\n";
}
?>
</pre>

<h2>Test include aplikácie</h2>
<pre>
<?php
$core = dirname(__DIR__) . '/core/src/bootstrap.php';
echo 'Očakávaná cesta k core: ' . $core . "\n";
echo 'core existuje: ' . (is_file($core) ? 'ÁNO' : 'NIE') . "\n";
echo 'config existuje: ' . (is_file(dirname(__DIR__) . '/core/config/config.php') ? 'ÁNO' : 'NIE') . "\n";
?>
</pre>
