<?php
declare(strict_types=1);
namespace Kiapes;
final class AdminController{public function __construct(private array $config){}
public function handle():void{Auth::start();$a=$_GET['action']??'dashboard';if($a==='login'){$this->login();return;}if($a==='logout'){Auth::logout();header('Location: /admin?action=login');return;}if(!Auth::user()){header('Location: /admin?action=login');return;}$this->dashboard();}
private function login():void{$error=null;if($_SERVER['REQUEST_METHOD']==='POST'){Csrf::validate();if(Auth::login(trim((string)($_POST['email']??'')),(string)($_POST['password']??''))){header('Location: /admin');return;}$error='Nesprávny e-mail alebo heslo.';}$e=fn(?string $v):string=>htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');$csrf=Csrf::token();require dirname(__DIR__).'/templates/admin/login.php';}
private function dashboard():void{$pdo=Db::connection();$sites=$pdo->query('SELECT s.*,COUNT(p.id) AS page_count FROM sites s LEFT JOIN pages p ON p.site_id=s.id AND p.status="published" GROUP BY s.id ORDER BY s.name')->fetchAll();$e=fn(?string $v):string=>htmlspecialchars((string)$v,ENT_QUOTES,'UTF-8');require dirname(__DIR__).'/templates/admin/dashboard.php';}}
