<?php

function setVar($key, $value)
{
    $_SESSION['old'][$key] = $value;
}

function getVar($key)
{

    return $_SESSION['old'][$key];
}

function resetVar()
{
    $_SESSION['old'] = null;
}

function wasSelected($name, $value)
{
    if (!isset($_SESSION['old'])) return '';
    $var = getVar($name);
    if (isset($var) && $var == $value) {
        return ' selected ';
    }
    return '';
}