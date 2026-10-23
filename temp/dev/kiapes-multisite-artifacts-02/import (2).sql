SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS audit_log,user_sites,users,media,menu_items,blocks,pages,themes,sites,redirects;

CREATE TABLE sites (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,host VARCHAR(190) NOT NULL UNIQUE,slug VARCHAR(100) NOT NULL UNIQUE,name VARCHAR(190) NOT NULL,lang CHAR(2) NOT NULL DEFAULT 'sk',theme_id INT UNSIGNED NULL,home_page_id INT UNSIGNED NULL,is_active TINYINT(1) NOT NULL DEFAULT 1) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE themes (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100) NOT NULL,tokens JSON NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE pages (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,site_id INT UNSIGNED NOT NULL,parent_id INT UNSIGNED NULL,slug VARCHAR(150) NOT NULL,title VARCHAR(255) NOT NULL,template ENUM('home','vizitka','text','contact') NOT NULL DEFAULT 'text',meta_description VARCHAR(300) NULL,status ENUM('draft','published') NOT NULL DEFAULT 'draft',updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,UNIQUE KEY uq_page(site_id,parent_id,slug),KEY idx_pages_site_status(site_id,status),FOREIGN KEY(site_id) REFERENCES sites(id) ON DELETE CASCADE,FOREIGN KEY(parent_id) REFERENCES pages(id) ON DELETE SET NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE blocks (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,page_id INT UNSIGNED NOT NULL,type ENUM('heading','richtext','image','links','contact','gallery') NOT NULL,sort_order SMALLINT NOT NULL DEFAULT 0,data JSON NOT NULL,KEY idx_blocks_page_sort(page_id,sort_order),FOREIGN KEY(page_id) REFERENCES pages(id) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE menu_items (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,site_id INT UNSIGNED NOT NULL,parent_id INT UNSIGNED NULL,label VARCHAR(100) NOT NULL,page_id INT UNSIGNED NULL,url VARCHAR(500) NULL,sort_order SMALLINT NOT NULL DEFAULT 0,KEY idx_menu_site_sort(site_id,sort_order),FOREIGN KEY(site_id) REFERENCES sites(id) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE media (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,site_id INT UNSIGNED NULL,path VARCHAR(300) NOT NULL,alt_text VARCHAR(300) NOT NULL,is_decorative TINYINT(1) NOT NULL DEFAULT 0,mime VARCHAR(100) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE users (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,email VARCHAR(190) NOT NULL UNIQUE,password_hash VARCHAR(255) NOT NULL,totp_secret VARCHAR(255) NULL,role ENUM('superadmin','editor') NOT NULL DEFAULT 'editor',failed_login_count INT UNSIGNED NOT NULL DEFAULT 0,locked_until DATETIME NULL,last_login_at DATETIME NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE user_sites (user_id INT UNSIGNED NOT NULL,site_id INT UNSIGNED NOT NULL,PRIMARY KEY(user_id,site_id),FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,FOREIGN KEY(site_id) REFERENCES sites(id) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE audit_log (id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,user_id INT UNSIGNED NULL,action VARCHAR(60) NOT NULL,entity VARCHAR(60) NOT NULL,entity_id INT UNSIGNED NULL,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE redirects (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,site_id INT UNSIGNED NOT NULL,from_path VARCHAR(500) NOT NULL,to_path VARCHAR(500) NOT NULL,status_code SMALLINT UNSIGNED NOT NULL DEFAULT 301,UNIQUE KEY uq_redirect(site_id,from_path),FOREIGN KEY(site_id) REFERENCES sites(id) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO themes (id,name,tokens) VALUES (1,'Kiapes Light','{"--color-bg":"#fdfdfb","--color-text":"#111111","--color-accent":"#004f7a","--color-border":"#d4d4d4"}');

INSERT INTO sites (id,host,slug,name,theme_id,is_active) VALUES
(1,'kiapes.sk','kiapes','Kiapeš',1,1),
(2,'martin.kiapes.sk','martin','Martin Kiapeš',1,1),
(3,'juraj.kiapes.sk','juraj','Juraj Kiapeš',1,1),
(4,'marta.kiapes.sk','marta','Mgr. Marta Kiapešová, dipl. s.',1,1),
(5,'eva.kiapes.sk','eva','Eva Kiapešová',1,1),
(6,'jaroslav.kiapes.sk','jaroslav','JUDr. Jaroslav Kiapeš',1,1),
(7,'hasko.kiapes.sk','hasko','Haško',1,1);

UPDATE sites SET home_page_id=1 WHERE id=1;
UPDATE sites SET home_page_id=2 WHERE id=2;
UPDATE sites SET home_page_id=3 WHERE id=3;
UPDATE sites SET home_page_id=4 WHERE id=4;
UPDATE sites SET home_page_id=5 WHERE id=5;
UPDATE sites SET home_page_id=6 WHERE id=6;
UPDATE sites SET home_page_id=7 WHERE id=7;

INSERT INTO pages (id,site_id,slug,title,template,meta_description,status) VALUES
(1,1,'home','Kiapeš','home','Kiapeš','published'),
(2,2,'home','Martin Kiapeš','vizitka','Martin Kiapeš','published'),
(3,3,'home','Juraj Kiapeš','vizitka','Juraj Kiapeš','published'),
(4,4,'home','Mgr. Marta Kiapešová, dipl. s.','vizitka','Zdravotnícke poradenstvo a konzultácie','published'),
(5,5,'home','Eva Kiapešová','vizitka','Eva Kiapešová','published'),
(6,6,'home','JUDr. Jaroslav Kiapeš','vizitka','Advokátska kancelária','published'),
(7,7,'home','Haško','home','Haško','published'),
(8,7,'ivan','Ivan Haško','vizitka','Stavebné činnosti a sprostredkovanie','published');

INSERT INTO blocks (page_id,type,sort_order,data) VALUES
(1,'heading',1,'{"text":"Kiapeš"}'),
(1,'links',2,'{"items":[{"text":"Juraj","href":"https://juraj.kiapes.sk"},{"text":"Marta","href":"https://marta.kiapes.sk"},{"text":"Eva","href":"https://eva.kiapes.sk"},{"text":"Martin","href":"https://martin.kiapes.sk"},{"text":"Jaroslav","href":"https://jaroslav.kiapes.sk"}]}'),
(1,'heading',3,'{"text":"Haško"}'),
(1,'links',4,'{"items":[{"text":"Ivan","href":"https://hasko.kiapes.sk/ivan"}]}'),
(2,'heading',1,'{"text":"Martin Kiapeš"}'),
(2,'contact',2,'{"items":[{"label":"Telefón","value":"+421 47 43 96 717"},{"label":"Mobil","value":"+421 907 808 031"},{"label":"E-mail","value":"martin@kiapes.sk"},{"label":"Web","value":"martin.kiapes.sk"}]}'),
(2,'richtext',3,'{"title":"Činnosť","text":"Ego sum omnium\\n(beneficiencia, consciencia, sapientia, potentia)"}'),
(2,'richtext',4,'{"title":"Adresa","text":"Sadová 5/87, 985 54 Lovinobaňa"}'),
(3,'heading',1,'{"text":"Juraj Kiapeš"}'),
(3,'contact',2,'{"items":[{"label":"Telefón","value":"+421 47 43 96 717"},{"label":"Mobil","value":"+421 908 953 375"},{"label":"E-mail","value":"juraj@kiapes.sk"},{"label":"Web","value":"juraj.kiapes.sk"}]}'),
(3,'richtext',3,'{"title":"Činnosť","text":"Viem čo robím\\n(vždy a všetko)"}'),
(3,'richtext',4,'{"title":"Adresa","text":"Sadová 5/87, 985 54 Lovinobaňa"}'),
(4,'heading',1,'{"text":"Mgr. Marta Kiapešová, dipl. s."}'),
(4,'contact',2,'{"items":[{"label":"Telefón","value":"+421 47 43 96 717"},{"label":"Mobil","value":"+421 907 350 366"},{"label":"E-mail","value":"marta@kiapes.sk"},{"label":"Web","value":"marta.kiapes.sk"}]}'),
(4,'richtext',3,'{"title":"Činnosť","text":"Zdravotnícke poradenstvo a konzultácie\\n(personálny manažment, ošetrovateľstvo, hygiena)"}'),
(4,'richtext',4,'{"title":"Adresa","text":"Sadová 5/87, 985 54 Lovinobaňa"}'),
(5,'heading',1,'{"text":"Eva Kiapešová"}'),
(5,'contact',2,'{"items":[{"label":"Telefón","value":"+421 47 43 96 717"},{"label":"Mobil","value":"+421 908 271 691"},{"label":"E-mail","value":"eva@kiapes.sk"},{"label":"Web","value":"eva.kiapes.sk"}]}'),
(5,'richtext',3,'{"title":"Činnosť","text":"Ego sum omnium\\n(beneficiencia, consciencia, sapientia, potentia)"}'),
(5,'richtext',4,'{"title":"Adresa","text":"Sadová 5/87, 985 54 Lovinobaňa"}'),
(6,'heading',1,'{"text":"JUDr. Jaroslav Kiapeš"}'),
(6,'contact',2,'{"items":[{"label":"Telefón","value":"+421 44 55 22 639"},{"label":"Mobil","value":"+421 905 501 186"},{"label":"E-mail","value":"jaroslav@kiapes.sk"},{"label":"Web","value":"jaroslav.kiapes.sk"}]}'),
(6,'richtext',3,'{"title":"Advokátska kancelária","text":"Právo trestné, občianske, obchodné, pracovné, správne.\\nŠtúrova 4330/31, 031 01 Liptovský Mikuláš"}'),
(6,'richtext',4,'{"title":"Poskytovanie ubytovania","text":"Rodinný dom v blízkosti termálneho kúpaliska Bešeňová.\\nLiptovský Michal 93, 034 83 Liptovský Michal"}'),
(7,'heading',1,'{"text":"Haško"}'),
(7,'links',2,'{"items":[{"text":"Ivan","href":"/ivan"}]}'),
(8,'heading',1,'{"text":"Ivan Haško"}'),
(8,'contact',2,'{"items":[{"label":"Telefón","value":"+421 47 43 96 717"},{"label":"Mobil","value":"+421 917 893 085"},{"label":"E-mail","value":"hasko@kiapes.sk"},{"label":"Web","value":"hasko.kiapes.sk/ivan"}]}'),
(8,'richtext',3,'{"title":"Stavebné činnosti","text":"Vykonávanie stavieb a ich zmien.\\nSadová 5/87, 985 54 Lovinobaňa"}'),
(8,'richtext',4,'{"title":"Sprostredkovanie","text":"Sprostredkovanie obchodu a služieb.\\nSadová 5/87, 985 54 Lovinobaňa"}');

INSERT INTO menu_items (site_id,label,url,sort_order) VALUES
(1,'Juraj','https://juraj.kiapes.sk',1),
(1,'Marta','https://marta.kiapes.sk',2),
(1,'Eva','https://eva.kiapes.sk',3),
(1,'Martin','https://martin.kiapes.sk',4),
(1,'Jaroslav','https://jaroslav.kiapes.sk',5),
(1,'Ivan Haško','https://hasko.kiapes.sk/ivan',6),
(2,'Domov','/',1),
(2,'Kiapeš','https://kiapes.sk',2),
(3,'Domov','/',1),
(3,'Kiapeš','https://kiapes.sk',2),
(4,'Domov','/',1),
(4,'Kiapeš','https://kiapes.sk',2),
(5,'Domov','/',1),
(5,'Kiapeš','https://kiapes.sk',2),
(6,'Domov','/',1),
(6,'Kiapeš','https://kiapes.sk',2),
(7,'Domov','/',1),
(7,'Ivan','/ivan',2),
(7,'Kiapeš','https://kiapes.sk',3);

SET FOREIGN_KEY_CHECKS=1;
