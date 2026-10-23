# Kiapeš multi-site balík

## Nasadenie
1. Rozbaľ ZIP do `/kiapes.sk/`.
2. Importuj `install/import.sql` do databázy `d78035_kiapes` v phpMyAdmin.
3. Spusti raz `https://kiapes.sk/core/install-admin.php`.
4. Okamžite odstráň `core/install-admin.php`.
5. Prihlás sa na `https://kiapes.sk/admin`.
6. Zmeň heslo administrátora a heslo DB používateľa v hostcreators.

## Štruktúra
- `web/` – hlavná doména kiapes.sk
- `sub/` – jednotlivé subdomény
- `core/` – aplikácia mimo verejných koreňov
- `assets/` – CSS
- `install/import.sql` – kompletná schéma a dáta

## Weby
- kiapes.sk
- martin.kiapes.sk
- juraj.kiapes.sk
- marta.kiapes.sk
- eva.kiapes.sk
- jaroslav.kiapes.sk
- hasko.kiapes.sk
- hasko.kiapes.sk/ivan
