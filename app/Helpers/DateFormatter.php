<?php

/**
 * Convert date format from Y-m-d to d-m-Y
 *
 * @param mixed $date
 * @return date
 */
if (!function_exists('dateYmdToDmy')) {
    function dateYmdToDmy($date)
    {
        return $date->format('d-m-y');
    }
}
  
/**
 * Convert date format from d-m-Y to Y-m-d
 *
 * @param mixed $date
 * @return date
 */
if (!function_exists('dateDmyToYmd')) {
    function dateDmyToYmd($date)
    {
        return $date->format('Y-m-d');
    }
}