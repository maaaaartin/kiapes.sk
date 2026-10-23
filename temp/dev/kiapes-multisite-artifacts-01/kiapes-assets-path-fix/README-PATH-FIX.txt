OPRAVA 404 PRI CSS:

Router teraz hlada CSS na dvoch miestach:
1. /kiapes.sk/assets/
2. /kiapes.sk/web/assets/

Nahrad core/src/SiteController.php z tohto ZIPu cez existujuci subor.

Potom over:
https://kiapes.sk/assets/css/base.css
https://martin.kiapes.sk/assets/css/base.css

Ak sa stale zobrazí 404, vypis presne povie,
ktore priecinky router skontroloval a ci existuju.
