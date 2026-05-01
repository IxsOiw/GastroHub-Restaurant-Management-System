<?php

function title($value)
{
    echo $value;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();

}

function isPostRequest()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
