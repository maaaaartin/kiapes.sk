<?php

declare(strict_types=1);

namespace Kiapes;

use PDO;

final class SiteController
{
    public function __construct(private array $config) {}

    public function handle(string $host, string $slug): void
    {
        $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/', '/');

        if (str_starts_with($path, 'assets/')) {
            $this->serveAsset($path);
            return;
        }

        $pdo = Db::connection();
        $site = $this->site($pdo, $slug);

        if (!$site) {
            http_response_code(404);
            echo 'Web nebol nájdený.';
            return;
        }

        $page = $this->page($pdo, (int) $site['id'], $path);

        if (!$page) {
            http_response_code(404);
            $page = $this->page($pdo, (int) $site['id'], '');
        }

        if (!$page) {
            http_response_code(404);
            echo 'Stránka neexistuje.';
            return;
        }

        $blocks = $this->blocks($pdo, (int) $page['id']);
        $menu = $this->menu($pdo, (int) $site['id']);
        $this->render($site, $page, $blocks, $menu);
    }

    private function serveAsset(string $path): void
    {
        $root = dirname(__DIR__, 2) . '/assets';
        $file = realpath($root . '/' . $path);

        if ($file === false || !str_starts_with($file, realpath($root) . DIRECTORY_SEPARATOR) || !is_file($file)) {
            http_response_code(404);
            header('Content-Type: text/plain; charset=utf-8');
            echo 'Súbor nebol nájdený.';
            return;
        }

        $mime = match (strtolower(pathinfo($file, PATHINFO_EXTENSION))) {
            'css' => 'text/css; charset=utf-8',
            'js' => 'application/javascript; charset=utf-8',
            'svg' => 'image/svg+xml',
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'webp' => 'image/webp',
            'woff2' => 'font/woff2',
            default => 'application/octet-stream',
        };

        header('Content-Type: ' . $mime);
        header('Content-Length: ' . (string) filesize($file));
        header('Cache-Control: public, max-age=604800');
        readfile($file);
    }

    private function site(PDO $pdo, string $slug): ?array
    {
        $stmt = $pdo->prepare('SELECT * FROM sites WHERE slug = ? AND is_active = 1 LIMIT 1');
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    private function page(PDO $pdo, int $siteId, string $path): ?array
    {
        $slug = $path === '' ? 'home' : $path;
        $stmt = $pdo->prepare('SELECT * FROM pages WHERE site_id = ? AND status = "published" AND (slug = ? OR slug = ?) ORDER BY CASE WHEN slug = ? THEN 0 ELSE 1 END LIMIT 1');
        $stmt->execute([$siteId, $slug, $path, $slug]);
        return $stmt->fetch() ?: null;
    }

    private function blocks(PDO $pdo, int $pageId): array
    {
        $stmt = $pdo->prepare('SELECT * FROM blocks WHERE page_id = ? ORDER BY sort_order');
        $stmt->execute([$pageId]);
        return array_map(fn(array $row): array => [
            'type' => $row['type'],
            'data' => json_decode($row['data'], true) ?: [],
        ], $stmt->fetchAll());
    }

    private function menu(PDO $pdo, int $siteId): array
    {
        $stmt = $pdo->prepare('SELECT * FROM menu_items WHERE site_id = ? ORDER BY sort_order');
        $stmt->execute([$siteId]);
        return $stmt->fetchAll();
    }

    private function render(array $site, array $page, array $blocks, array $menu): void
    {
        $e = fn(?string $value): string => htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $title = $e($page['title']);
        $description = $e($page['meta_description'] ?: $site['name']);
        $lang = $e($site['lang']);

        header('Content-Type: text/html; charset=utf-8');
        header('X-Content-Type-Options: nosniff');
        header('Referrer-Policy: strict-origin-when-cross-origin');

        require dirname(__DIR__) . '/templates/layout.php';
    }
}
