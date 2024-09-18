<?php

use App\Controller\HomeController;
use App\Controller\ShopController;

self::addInstance('home', new HomeController);
self::addInstance('shop', new ShopController);