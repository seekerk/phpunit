<?php
/**
 * Created by PhpStorm.
 * User: kulakov
 * Date: 12.05.18
 * Time: 13:00
 */
require_once 'ProfileStorage.inc';

@session_start();
if (array_key_exists('login', $_POST) &&
    array_key_exists('password', $_POST)) {
    $user = ProfileStorage::getInstance()->checkLogin($_POST['login'], $_POST['password']);
    if ($user != null) {
        $_SESSION['user'] = $user->getName();
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
    } else {
        echo "<div style='color: red'>Unknown login: {$_POST['login']}, {$_POST['password']}</div>";
    }
}

if (!array_key_exists('user', $_SESSION)) {
    echo "<form method='post' id='loginForm'>
    <label>Login: <input type='text' name='login' value='".(array_key_exists('login', $_POST) ? $_POST['login'] : "")."'></label>
    <label>Password: <input type='password' name='password' value='".(array_key_exists('password', $_POST) ? $_POST['password']: "")."'></label>
    <button type='submit' name='submit'>Login</button>
</form>";
}
    