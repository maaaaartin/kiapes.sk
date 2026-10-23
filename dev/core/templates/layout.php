<?php /** @var callable $e @var array $menu @var array $page @var array $blocks */ ?>
<!DOCTYPE html>
<html lang="<?= $e($lang) ?>">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title><?= $title ?></title><meta name="description" content="<?= $description ?>"><link rel="stylesheet" type="text/css" href="/assets/css/base.css"><link rel="stylesheet" type="text/css" href="/assets/css/components.css"><link rel="stylesheet" type="text/css" href="/assets/css/theme.css"></head>
<body><a class="skip-link" href="#main">Preskočiť na obsah</a>
<header class="site-header"><nav class="site-nav" aria-label="Hlavná navigácia"><ul><?php foreach($menu as $i): ?><li><a href="<?= $e($i['url'] ?: '/') ?>"><?= $e($i['label']) ?></a></li><?php endforeach; ?></ul></nav></header>
<main id="main" class="site-main"><?php $t=$page['template']==='home'?'home':'vizitka';require dirname(__DIR__).'/templates/page/'.$t.'.php'; ?></main>
<footer class="site-footer"><p>Copyright 2019 Kiapeš</p><a href="https://kiapes.sk">kiapes.sk</a></footer>
</body></html>
