<?php

include $app->vendorsDir . '/f1/controller/controller.php';

/**
 * app/services/controller.php
 * 
 * F1 Controller service implementation - 24 Jun 2022
 *
 * @author C. Moller <xavier.tnc@gmail.com>
 * 
 * @version 1.4.0 - 09 Jul 2022
 * 
 */

use F1\Controller;

$app->themeDir = $app->themesDir . DIRECTORY_SEPARATOR . $app->theme; 

$app->controller = new Controller( [
  'controllersBaseDir' => $app->contentDir,
  'controllerFilePath' => $http->request->path ?: $app->homePage,
  'name' => $http->request->path ? end( $http->request->segments ) : $app->homePage,
  'notFound' => $app->themesDir . '/default/404.html'
] );