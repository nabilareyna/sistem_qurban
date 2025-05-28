<?php

namespace App\Services;

class Auth
{
    private static $key = "fXzw^2uptsTkE;(aB&@/VbgUzp!G]fL_`};8~FN%W>2CD`VE~:Gm3nHdb2#64)yRq(EZ~NgW}&y%4;Abs.:*zxYaS25R.b;(Hjw[AG@9evUL~%";

    public static function bcrypt($password)
    {
        return password_hash($password . self::$key, PASSWORD_BCRYPT);
    }

    public static function verifyPassword($password, $dbPassword)
    {
        return password_verify($password . self::$key, $dbPassword);
    }

    private static function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($user)
    {
        self::startSession();
        $_SESSION['user'] = $user; // user = stdClass dari PDO::FETCH_OBJ
    }

    public static function check()
    {
        self::startSession();
        return isset($_SESSION['user']);
    }

    public static function user()
    {
        self::startSession();
        return $_SESSION['user'] ?? null;
    }

    public static function roleIs(...$roles)
    {
        self::startSession();

        $user = $_SESSION['user'] ?? null;

        if (!is_object($user) || !isset($user->role)) {
            return false;
        }

        return in_array($user->role, $roles);
    }

    public static function id()
    {
        self::startSession();

        $user = $_SESSION['user'] ?? null;
        return is_object($user) ? $user->id ?? null : null;
    }

    public static function logout()
    {
        self::startSession();
        unset($_SESSION['user']);
        session_destroy();
    }
}
