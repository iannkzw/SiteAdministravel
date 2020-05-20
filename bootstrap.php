<?php

session_start();

require 'config.php';
require 'src/error_handler.php';
require 'src/resolve-routes.php';
require 'src/render.php';
require 'src/connect.php';
require 'src/flash.php';


if (resolve('/admin/?(.*)')) {
    require __DIR__ . '/admin/routes.php';
} elseif (resolve('/(.*)')) {
    require __DIR__ . '/site/routes.php';
}

