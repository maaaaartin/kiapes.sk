<?php /** @var array $blocks @var callable $e */ ?>
<article class="business-card">
<?php foreach($blocks as $b):$d=$b['data']; ?>
<?php if($b['type']==='heading'): ?><h1 class="card-name"><?= $e($d['text']??'') ?></h1>
<?php elseif($b['type']==='richtext'): ?><section><h2><?= $e($d['title']??'') ?></h2><p><?= nl2br($e($d['text']??'')) ?></p></section>
<?php elseif($b['type']==='links'): ?><ul class="contact-list"><?php foreach($d['items']??[] as $i): ?><li><span class="label"><?= $e($i['label']??'') ?></span><a href="<?= $e($i['href']??'#') ?>"><?= $e($i['text']??'') ?></a></li><?php endforeach; ?></ul>
<?php elseif($b['type']==='contact'): ?><ul class="contact-list"><?php foreach($d['items']??[] as $i): ?><li><span class="label"><?= $e($i['label']??'') ?></span><span><?= $e($i['value']??'') ?></span></li><?php endforeach; ?></ul>
<?php endif; endforeach; ?>
</article>
