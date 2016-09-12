<?php


/**
 * Replaces the first occurrence of a string inside a bigger string
 *
 * @param $search
 * @param $replace
 * @param $subject
 * @return mixed
 */
function str_replace_first($search, $replace, $subject)
{
    $position = strpos($subject, $search);
    if ($position !== false) {
        return substr_replace($subject, $replace, $position, strlen($search));
    }
    return $subject;
}


function dd($value)
{
    var_dump($value);
    die();
}