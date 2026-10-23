OPRAVA CSS CEZ ZDIELANÝ ROUTER:

Táto oprava spôsobí, že /assets/css/base.css bude na každej subdoméne
servírovaný z jediného priečinka /kiapes.sk/assets/.

1. Nahraď core/src/SiteController.php z tohto ZIPu cez existujúci súbor.
2. Uisti sa, že existuje /kiapes.sk/assets/css/base.css,
   /kiapes.sk/assets/css/components.css a /kiapes.sk/assets/css/theme.css.
3. Over priamo:
   https://martin.kiapes.sk/assets/css/base.css

Malo by sa zobraziť CSS, nie HTML.

Výhoda: CSS je len na jednom mieste a funguje pre všetky subdomény.
