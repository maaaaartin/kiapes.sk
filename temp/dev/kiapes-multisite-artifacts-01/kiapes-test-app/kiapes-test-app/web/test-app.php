<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors','1');

require dirname(__DIR__, 2) . '/core/src/Db.php';

use Kiapes\Db;

echo '<meta charset="utf-8"><title>Test aplikácie</title>';
echo '<h1>Test dát a SQL</h1><pre>';

try {
    $pdo = Db::connection();
    echo "Databáza: OK\n";

    $host = strtolower($_SERVER['HTTP_HOST'] ?? '');
    $host = preg_replace('/^www\./', '', $host);
    $host = rtrim($host, '.');

    $stmt = $pdo->prepare('SELECT * FROM sites WHERE host = ? OR host = ? LIMIT 1');
    $stmt->execute([$host, 'www.' . $host]);
    $site = $stmt->fetch();

    if (!$site) {
        echo "Site pre host \"$host\" nebola nájdená.\n";
        echo "Skontroluj, či je v tabuľke sites záznam s host = $host\n";
        exit;
    }

    echo "Site: {$site['name']} (ID {$site['id']})\n";
    echo "Slug: {$site['slug']}\n";

    $stmt = $pdo->prepare('SELECT * FROM pages WHERE site_id = ? AND slug = "home" AND status = "published" LIMIT 1');
    $stmt->execute([$site['id']]);
    $page = $stmt->fetch();

    if (!$page) {
        echo "Homepage stránka nebola nájdená.\n";
        exit;
    }

    echo "Homepage: {$page['title']} (ID {$page['id']})\n";

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM blocks WHERE page_id = ?');
    $stmt->execute([$page['id']]);
    echo "Počet blokov: " . $stmt->fetchColumn() . "\n";

    $stmt = $pdo->prepare('SELECT COUNT(*) FROM menu_items WHERE site_id = ?');
    $stmt->execute([$site['id']]);
    echo "Počet položiek menu: " . $stmt->fetchColumn() . "\n";

    echo "\nAk vidíš počty blokov a menu, dáta aj SQL sú funkčné.\n";
} catch (Throwable $e) {
    echo 'CHYBA: ' . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}

echo '</pre>';
