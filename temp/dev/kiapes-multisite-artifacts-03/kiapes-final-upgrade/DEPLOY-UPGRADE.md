# Kompletný upgrade balík – fázy 1–5

## Obsah
- Fáza 1: multi-site jadro, routovanie, verejné weby
- Fáza 2: Admin MVP, CRUD, TOTP, CSRF, audit
- Fáza 3: vizuálny editor blokov, drag & drop, náhľad
- Fáza 4: import pôvodných vizitiek, revízie, 301
- Fáza 5: finálna príprava, bezpečnosť, dokumentácia

## Nasadenie
1. Zálohuj databázu d78035_kiapes, core/ a assets/.
2. Rozbaľ ZIP do /kiapes.sk/ a prepíš súbory.
3. Pre čistú inštaláciu importuj install/00-schema.sql a install/01-seed.sql.
4. Pre upgrade existujúcej DB použi iba chýbajúce migrácie; 00-schema.sql obsahuje DROP TABLE.
5. Pri čistej inštalácii spusti raz https://kiapes.sk/core/install-admin.php a hneď ho odstráň.
6. Over https://kiapes.sk, https://martin.kiapes.sk, https://hasko.kiapes.sk/ivan a https://kiapes.sk/admin.
7. Zmeň heslo administrátora, rotuj heslo DB, povoľ TOTP a nastav zálohy.
