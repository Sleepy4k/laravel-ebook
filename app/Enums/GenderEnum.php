<?php
  
namespace App\Enums;

class GenderEnum {
    const putra = 'putra';
    const putri = 'putri';

    /**
     * List data for gender
     */
    public static $gender = [
        self::putra,
        self::putri
    ];
}