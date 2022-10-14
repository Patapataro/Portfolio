<?php

require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';

//cms document root
define('DOCUMENT_ROOT', '/cms_mvc'//str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__)))
      );

// Http_host with root to cms
define('ASSET_ROOT', 'https://' . $_SERVER['HTTP_HOST']. '/work' . DOCUMENT_ROOT
//  str_replace(
//    $_SERVER['DOCUMENT_ROOT'],
//    '',
//    str_replace('\\', '/', dirname(__DIR__))
//    )
);

//test to see your doucument path

//echo $_SERVER['DOCUMENT_ROOT']."<br>";
//echo $_SERVER['HTTP_HOST']."<br>";
//echo DOCUMENT_ROOT."<br>";
//echo ASSET_ROOT."<br>";


