<?php
function authCheck(string $login, string $password): bool
{
    $users = require __DIR__ . 'DB.php';

    foreach ($users as $user) {
        if ($login === $user['login'] && $password === $user['password']) {
            return true;
        }
    }
    return false;
}

function CheckCookie()
{
    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
    if (authCheck($login, $password)) {
        return $login;
    }

    return null;
}
