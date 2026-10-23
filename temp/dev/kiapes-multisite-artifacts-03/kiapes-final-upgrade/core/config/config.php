<?php
declare(strict_types=1);
return [
 'app'=>['env'=>'production','debug'=>false,'base_domain'=>'kiapes.sk','timezone'=>'Europe/Bratislava','asset_url'=>'/assets','upload_dir'=>__DIR__.'/../storage/uploads','cache_dir'=>__DIR__.'/../storage/cache','log_dir'=>__DIR__.'/../storage/logs'],
 'database'=>['host'=>'sql21.hostcreators.sk','port'=>3326,'database'=>'d78035_kiapes','username'=>'u78035_admin','password'=>'mAAA0880&00&1505','charset'=>'utf8mb4','collation'=>'utf8mb4_unicode_ci'],
 'security'=>['session_name'=>'kiapes_session','session_lifetime'=>7200,'login_max_attempts'=>5,'login_lockout_seconds'=>900],
 'admin'=>['email'=>'admin@kiapes.sk','password'=>'ZmeniTotoHeslo2026!'],
 'sites'=>['kiapes.sk'=>'kiapes','www.kiapes.sk'=>'kiapes','martin.kiapes.sk'=>'martin','juraj.kiapes.sk'=>'juraj','marta.kiapes.sk'=>'marta','eva.kiapes.sk'=>'eva','jaroslav.kiapes.sk'=>'jaroslav','hasko.kiapes.sk'=>'hasko'],
];
