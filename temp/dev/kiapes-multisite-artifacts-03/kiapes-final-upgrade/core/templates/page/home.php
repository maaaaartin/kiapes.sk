<?php /** @var array $blocks @var callable $e */ ?>
<div class="home-groups">
<?php foreach($blocks as $b): ?>
<?php if($b['type']==='heading'): ?><h1 class="family-name"><?= $e($b['data']['text']??'') ?></h1>
<?php elseif($b['type']==='links'): ?><ul class="family-links"><?php foreach($b['data']['items']??[] as $i): ?><li><a href="<?= $e($i['href']??'#') ?>"><?= $e($i['text']??'') ?></a></li><?php endforeach; ?></ul>
<?php endif; endforeach; ?>
</div>
