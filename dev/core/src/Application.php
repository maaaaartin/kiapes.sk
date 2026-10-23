<?php
declare(strict_types=1);
namespace Kiapes;
final class Application{public function __construct(private array $config){}public static function boot(array $c):self{return new self($c);}
public function run():void{$h=strtolower($_SERVER['HTTP_HOST']??'');$h=preg_replace('/^www\./','',$h);$h=rtrim($h,'.');if(!isset($this->config['sites'][$h])){http_response_code(404);echo 'Web nebol nájdený.';return;}$s=$this->config['sites'][$h];if(str_starts_with($_SERVER['REQUEST_URI']??'/','/admin')){(new AdminController($this->config))->handle();return;}(new SiteController($this->config))->handle($h,$s);}}
