<?php

namespace App;

class Request
{
    /**
     * return $_GET or $_POST value
     * values give in _POST request has higher priority
     * @param string key
     * @param string type
     * Types:
     * - INT
     * - STRING
     * - ARRAY
     * @return mixed value or false if key doesnt exists
     * */
    public function get(string $key, string $type = null)
    {
        $value = isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : false);
        if ($value === false) {
            return false;
        }
        if ($type === null) {
            return $value;
        }
        switch (strtolower($type)) {
            case 'string':
                return (string) $value;
            break;
            case 'int':
                return is_numeric($value) ? (int) $value : false;
            break;
            case 'array':
                if (is_object($value) || is_array($value)) {
                    return (array) $value;
                }
                $value = json_decode($value);
                if (json_last_error() == JSON_ERROR_NONE) {
                    return (array) $value;
                } else {
                    return array();
                }
            break;
            case 'object':
                if (is_object($value) || is_array($value)) {
                    return (object) $value;
                }
                $value = json_decode($value);
                if (json_last_error() == JSON_ERROR_NONE) {
                    return (object) $value;
                } else {
                    return (object) array();
                }
            break;
        }
        return $value;
    }

    /**
     * checks if is post request
     * @return bool true if is post request or false
     * */
    public function isPost()
    {
        return (bool) ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    /**
     * get post value
     * @param string _POST key
     * @param string type
     * Types:
     * - INT
     * - STRING
     * - ARRAY
     * @example $request->getPost('key', 'STRING');
     */
    public function getPost(string $key, string $type = null)
    {
        $value = isset($_POST[$key]) ? $_POST[$key] : false;

        if ($value === false) {
            return false;
        }
        if ($type === null) {
            return $value;
        }
        $result = $value;
        switch (strtolower($type)) {
            case 'string':
               return (string) $value;
            break;
            case 'int':
                if (is_numeric($value)) {
                    return (int) $value;
                } else {
                    return false;
                }
            break;
            case 'array':
                if (is_object($value) || is_array($value)) {
                    return (array) $value;
                } else {
                    return array();
                }
            break;
            case 'object':
                if (is_object($value) || is_array($value)) {
                    return (object) $value;
                } else {
                    return (object) array();
                }
            break;
        }
    }

    /**
     * Detect an AJAX request
     * @return bool true if is ajax request or false
     * */
    public function isAjax()
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') ? true : false;
    }
}