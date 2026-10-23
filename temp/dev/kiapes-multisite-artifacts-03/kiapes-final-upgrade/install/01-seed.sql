SET NAMES utf8mb4;
INSERT INTO themes (id,name,tokens) VALUES (1,'Kiapes Martin','{"--font-family":"Times New Roman, Times, Baskerville, Georgia, serif","--color-text":"rgb(64 64 64)","--color-bg":"rgb(186 186 186 / 0.2)","--color-surface":"rgb(255 255 255)","--color-accent":"rgb(64 64 64)","--color-border":"rgb(186 186 186)","--background-image":"/assets/images/imp_k_bw_500.png","--background-image-active":"/assets/images/imp_k_clr_500.png"}');
INSERT INTO sites (id,host,slug,name,theme_id,is_active) VALUES (1,'kiapes.sk','kiapes','Kiapeš',1,1),(2,'martin.kiapes.sk','martin','Martin Kiapeš',1,1),(3,'juraj.kiapes.sk','juraj','Juraj Kiapeš',1,1),(4,'marta.kiapes.sk','marta','Mgr. Marta Kiapešová, dipl. s.',1,1),(5,'eva.kiapes.sk','eva','Eva Kiapešová',1,1),(6,'jaroslav.kiapes.sk','jaroslav','JUDr. Jaroslav Kiapeš',1,1),(7,'hasko.kiapes.sk','hasko','Haško',1,1);
UPDATE sites SET home_page_id=1 WHERE id=1;UPDATE sites SET home_page_id=2 WHERE id=2;UPDATE sites SET home_page_id=3 WHERE id=3;UPDATE sites SET home_page_id=4 WHERE id=4;UPDATE sites SET home_page_id=5 WHERE id=5;UPDATE sites SET home_page_id=6 WHERE id=6;UPDATE sites SET home_page_id=7 WHERE id=7;
INSERT INTO pages (id,site_id,slug,title,template,meta_description,status) VALUES (1,1,'home','Kiapeš','home','Kiapeš','published'),(2,2,'home','Martin Kiapeš','vizitka','Martin Kiapeš','published'),(3,3,'home','Juraj Kiapeš','vizitka','Juraj Kiapeš','published'),(4,4,'home','Mgr. Marta Kiapešová, dipl. s.','vizitka','Zdravotnícke poradenstvo a konzultácie','published'),(5,5,'home','Eva Kiapešová','vizitka','Eva Kiapešová','published'),(6,6,'home','JUDr. Jaroslav Kiapeš','vizitka','Advokátska kancelária','published'),(7,7,'home','Haško','home','Haško','published'),(8,7,'ivan','Ivan Haško','vizitka','Stavebné činnosti a sprostredkovanie','published');
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
INSERT INTO menu_items (site_id,label,url,sort_order) VALUES (1,'Juraj','https://juraj.kiapes.sk',1),(1,'Marta','https://marta.kiapes.sk',2),(1,'Eva','https://eva.kiapes.sk',3),(1,'Martin','https://martin.kiapes.sk',4),(1,'Jaroslav','https://jaroslav.kiapes.sk',5),(1,'Ivan Haško','https://hasko.kiapes.sk/ivan',6),(2,'Domov','/',1),(2,'Kiapeš','https://kiapes.sk',2),(3,'Domov','/',1),(3,'Kiapeš','https://kiapes.sk',2),(4,'Domov','/',1),(4,'Kiapeš','https://kiapes.sk',2),(5,'Domov','/',1),(5,'Kiapeš','https://kiapes.sk',2),(6,'Domov','/',1),(6,'Kiapeš','https://kiapes.sk',2),(7,'Domov','/',1),(7,'Ivan','/ivan',2),(7,'Kiapeš','https://kiapes.sk',3);
INSERT INTO redirects (site_id,from_path,to_path,status_code) VALUES (1,'/index.html','/',301),(2,'/index.html','/',301),(3,'/index.html','/',301),(4,'/index.html','/',301),(5,'/index.html','/',301),(6,'/index.html','/',301),(7,'/index.html','/',301),(7,'/ivan/index.html','/ivan',301);
