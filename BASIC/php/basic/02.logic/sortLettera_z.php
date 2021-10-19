<?php
function longest($a, $b)
{

    // str_split — Convert a string to an array
    // array_unique — Removes duplicate values from an array
    $chars = array_unique(str_split($a . $b));

    // sort() - sort arrays in ascending order
    sort($chars);
    

    // implode — Join array elements with a string
    // ['foo', 'bar', 'baz'] = implode("", $arr) = foo bar baz 

    $result = implode('', $chars);
    // print_r($result);
}

// longest('aretheyhere', 'yestheyarehere');




function longest_b($a, $b)
{   
    
    var_dump(count_chars($a . $b, 3));
}

longest_b('aretheyhere', 'yestheyarehere');


function longest_c($a, $b)
{
    $c = str_split($a . $b);
    sort($c);
    $e = preg_replace('/(\w)\1+/', "$1", implode("", $c));
    return $e;
}

?>