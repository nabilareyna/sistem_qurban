<?php

namespace App\Cores;

class Flash
{
    const SESSION_KEY = 'app_flash';
    const OLD_INPUT_KEY = 'old_input';

    protected static function startSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Set flash message
     *
     * @param string $key
     * @param string|array $message
     * @param string $type (success, error, warning, info)
     */
    public static function set($key, $message, $type = 'info')
    {
        self::startSession();
        
        if (!isset($_SESSION[self::SESSION_KEY])) {
            $_SESSION[self::SESSION_KEY] = [];
        }
        
        // Handle multiple messages
        if (is_array($message)) {
            foreach ($message as $msg) {
                $_SESSION[self::SESSION_KEY][$key][] = [
                    'message' => $msg,
                    'type' => $type
                ];
            }
        } else {
            $_SESSION[self::SESSION_KEY][$key][] = [
                'message' => $message,
                'type' => $type
            ];
        }
    }

    /**
     * Set success message
     */
    public static function success($key, $message)
    {
        self::set($key, $message, 'success');
    }

    /**
     * Set error message
     */
    public static function error($key, $message)
    {
        self::set($key, $message, 'error');
    }

    /**
     * Set warning message
     */
    public static function warning($key, $message)
    {
        self::set($key, $message, 'warning');
    }

    /**
     * Get flash messages
     *
     * @param string $key
     * @return array|null
     */
    public static function get($key)
    {
        self::startSession();
        
        if (isset($_SESSION[self::SESSION_KEY][$key])) {
            $messages = $_SESSION[self::SESSION_KEY][$key];
            unset($_SESSION[self::SESSION_KEY][$key]);
            return $messages;
        }
        
        return null;
    }

    /**
     * Check if flash message exists
     *
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        self::startSession();
        return isset($_SESSION[self::SESSION_KEY][$key]);
    }

    /**
     * Simpan old input
     *
     * @param array $data
     */
    public static function setOld(array $data)
    {
        self::startSession();
        $_SESSION[self::OLD_INPUT_KEY] = $data;
    }

    /**
     * Get old input
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function old($key = null, $default = null)
    {
        self::startSession();
        
        if (!isset($_SESSION[self::OLD_INPUT_KEY])) {
            return $default;
        }
        
        if ($key === null) {
            $old = $_SESSION[self::OLD_INPUT_KEY];
            unset($_SESSION[self::OLD_INPUT_KEY]);
            return $old;
        }
        
        if (isset($_SESSION[self::OLD_INPUT_KEY][$key])) {
            $value = $_SESSION[self::OLD_INPUT_KEY][$key];
            unset($_SESSION[self::OLD_INPUT_KEY][$key]);
            return $value;
        }
        
        return $default;
    }

    /**
     * Helper untuk menampilkan flash message di view
     *
     * @param string $key
     * @return string
     */
    public static function display($key)
    {
        $messages = self::get($key);
        if (!$messages) return '';
        
        $html = '';
        foreach ($messages as $msg) {
            $html .= '<div class="alert alert-' . $msg['type'] . '">';
            $html .= htmlspecialchars($msg['message']);
            $html .= '</div>';
        }
        
        return $html;
    }
}