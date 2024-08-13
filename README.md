# Repro Leaflet


## Install

```bash
composer install
symfony server:start
```

## Full Reproducer

```bash
symfony new --webapp repro-leaflet
cd repro-leaflet

composer require symfony/ux-map
composer require symfony/ux-leaflet-map
composer remove symfony/ux-turbo

symfony console make:controller MapController
# ... edit MapController.php
# ... edit templates/map/index.html.twig
# ... add a tiny bit of CSS

symfony console c:c
symfony console i:i

symfony server:start	
```
