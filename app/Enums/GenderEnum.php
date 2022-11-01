<?php
  
namespace App\Enums;

class GenderEnum {
    const putra = 'putra';
    const putri = 'putri';

    public static $gender = [
        self::putra,
        self::putri
    ];
}