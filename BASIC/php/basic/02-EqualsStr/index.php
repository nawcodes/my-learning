<?php


// Check to see if a string has the same amount of 'x's and 'o's. The method must return a boolean and be case insensitive. The string can contain any char.
function XO($s)
{
    $lower = strtolower($s);
    return substr_count($lower, 'x') === substr_count($lower, 'o');

    // example output is 
    // if x = 1 and o = 1;
    // return true
    // else 
    // if x = 1 and o = 3 / 2 > higher || otherwise so var x more higher or more min  ;
    // return false  
}








?>