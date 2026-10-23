<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors','1');

echo '<meta charset="utf-8"><title>Diagnostika assets</title>';
echo '<h1>Obsah priečinka assets</h1><pre>';

$roots = [
    dirname(__DIR__) . '/assets',
    __DIR__ . '/assets',
];

foreach ($roots as $root) {
    echo "Priečinok: $root\n";
    echo "Existuje: " . (is_dir($root) ? 'ÁNO' : 'NIE') . "\n";

    if (is_dir($root)) {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if ($file->isFile()) {
                echo substr($file->getPathname(), strlen($root) + 1) . "\n";
            }
        }
    }

    echo "\n";
}

echo '</pre>';
