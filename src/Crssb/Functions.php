<?php
namespace Weleoka\Crssb;
/**
 * Bootstrapping functions, useful for Crssb to work together with. 
 *
 */



/**
 * Utility for debugging.
 *
 * @param mixed $array values to print out
 *
 * @return void
 */
function dump($array) 
{
    echo "<pre>" . htmlentities(print_r($array, 1)) . "</pre>";
}
