<?php
/**
 * Created by PhpStorm.
 * User: kulakov
 * Date: 12.05.18
 * Time: 12:49
 */
require_once 'ProfileStorage.inc';

@session_start();

if (!array_key_exists('user', $_SESSION)) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: login.php");
}else{
   echo ProfileStorage::getInstance()->getProfile($_SESSION['user'])->printProfile();
}
